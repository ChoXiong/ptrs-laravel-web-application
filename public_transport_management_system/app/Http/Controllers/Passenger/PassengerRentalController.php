<?php

namespace App\Http\Controllers\Passenger;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Rental;
use Illuminate\Support\Facades\Auth;


class PassengerRentalController extends Controller
{
    public function create(Vehicle $vehicle)
    {
        return view('passenger.rent.create', compact('vehicle'));
        $vehicleModel->vehicle->make_model;
        $vehicleType->vehicle->type;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'start_rent' => 'required|date|after_or_equal:now',
            'end_rent' => 'required|date|after:start_rent',
            'luggage_number' => 'nullable|integer|min:0|max:10',
        ]);

        $vehicle = Vehicle::findOrFail($validated['vehicle_id']);

        $start = Carbon::parse($validated['start_rent']);
        $end = Carbon::parse($validated['end_rent']);

        $overlap = Rental::where('vehicle_id', $vehicle->id)
            ->where(function ($query) use ($start, $end) {
                $query->where(function ($q) use ($start, $end) {
                    // Case 1: Existing rental starts or ends during the new requested time
                    $q->whereBetween('start_rent', [$start, $end])
                        ->orWhereBetween('end_rent', [$start, $end]);
                })
                    ->orWhere(function ($q) use ($start, $end) {
                        // Case 2: New request is completely inside an existing rental time
                        $q->where('start_rent', '<=', $start)
                            ->where('end_rent', '>=', $end);
                    });
            })
            ->exists();

        if ($overlap) {
            return redirect()->back()
                ->with('error', 'Vehicle is not available for this period');
        }

        $totalDays = ceil($start->diffInHours($end) / 24);

        $vehicleBasePrice = $vehicle->base_price ?? 100;
        $seatMultiplier = 1 + max(0, $vehicle->seats - 4) * 0.1;
        $luggageCharge = max(0, ($validated['luggage_number'] ?? 0) - 2) * 10;
        $totalPrice = ($vehicleBasePrice * $seatMultiplier * $totalDays) + $luggageCharge;

        $rental = Rental::create([
            'user_id' => $request->user()->id,
            'vehicle_id' => $vehicle->id,
            'start_rent' => $validated['start_rent'],
            'end_rent' => $validated['end_rent'],
            'total_days' => $totalDays,
            'luggage_number' => $validated['luggage_number'] ?? 0,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        return redirect()->route('payment.show', $rental->id);
    }

    public function display(Request $request)
    {
        $data = Rental::where('user_id', Auth::id())->with('vehicle.user');

        if ($request->has('status') && $request->status != '') {
            $data->where('status', $request->status);
        }

        $sortOrder = $request->get('sort', 'desc');
        $data->orderBy('start_rent', $sortOrder);

        $rentals = $data->get();

        return view('passenger.rent.display', compact('rentals'));
    }

    public function destroy(Rental $rental)
    {
        if ($rental->user_id !== Auth::user()->id) {
            abort(403);
        }
        $rental->delete();
        return redirect()->route('passenger.rent.display')->with('success', 'Your rental has cancelled and deleted!');
    }

    public function edit(Rental $rental)
    {
        if ($rental->user_id !== Auth::id() || $rental->status !== 'pending') {
            abort(403);
        }

        $vehicle = $rental->vehicle;
        return view('passenger.rent.edit', compact('rental', 'vehicle'));
    }

    public function update(Request $request, Rental $rental)
    {
        if ($rental->user_id !== Auth::id() || $rental->status !== 'pending') {
            abort(403);
        }

        $validated = $request->validate([
            'start_rent' => 'required|date|after_or_equal:now',
            'end_rent' => 'required|date|after:start_rent',
            'luggage_number' => 'nullable|integer|min:0|max:10',
        ]);


        $vehicle = $rental->vehicle;
        $start = Carbon::parse($validated['start_rent']);
        $end = Carbon::parse($validated['end_rent']);

        $overlap = Rental::where('vehicle_id', $rental->vehicle_id)
            ->where('id', '!=', $rental->id)
            ->where(function ($query) use ($start, $end) {
                $query->where(function ($q) use ($start, $end) {
                    $q->whereBetween('start_rent', [$start, $end])
                        ->orWhereBetween('end_rent', [$start, $end]);
                })
                    ->orWhere(function ($q) use ($start, $end) {
                        $q->where('start_rent', '<=', $start)
                            ->where('end_rent', '>=', $end);
                    });
            })
            ->exists();

        if ($overlap) {
            return redirect()->back()
                ->with('success', 'Vehicle is not available for this period');
        }

        $totalDays = ceil($start->diffInHours($end) / 24);

        $vehicleBasePrice = $vehicle->base_price ?? 100;
        $seatMultiplier = 1 + max(0, $vehicle->seats - 4) * 0.1;
        $luggageCharge = max(0, ($validated['luggage_number'] ?? 0) - 2) * 10;
        $totalPrice = ($vehicleBasePrice * $seatMultiplier * $totalDays) + $luggageCharge;

        $rental->update([
            'start_rent' => $validated['start_rent'],
            'end_rent' => $validated['end_rent'],
            'total_days' => $totalDays,
            'luggage_number' => $validated['luggage_number'] ?? 0,
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('passenger.rent.display')->with('success', 'Your Rental is updated Successfully!');
    }
}
