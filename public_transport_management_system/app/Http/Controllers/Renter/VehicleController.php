<?php

namespace App\Http\Controllers\Renter;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $vehicles = $user->vehicles;
        return view('renter.vehicles.index', compact('vehicles'));
    }


    public function create()
    {
        return view('renter.vehicles.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'make_model' => 'required|string|max:255',
            'year' => 'required|integer|min:1980|max:' . date('Y'),
            'license_plate' => 'required|string|max:20',
            'type' => 'required|string|max:50',
            'seats' => 'required|integer|min:1|max:50',
            'color' => 'required|string|max:50',
            'road_tax_expiry' => 'required|date|after:today',
        ]);

        $validated['user_id'] = Auth::user()->id;

        Vehicle::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                //$imagePath = $image->store('vehicles', 'public');
            }
        }

        if ($request->hasFile('insurance')) {
           //$insurancePath = $request->file('insurance')->store('insurance', 'public');
        }

        return redirect()->route('renter.vehicles.index')->with('success', 'Vehicle added successfully!');
    }

    public function edit(Vehicle $vehicle)
    {
        return view('renter.vehicles.edit', compact('vehicle'));
    }

    public function destroy(Vehicle $vehicle)
    {
        if ($vehicle->user_id !== Auth::user()->id) {
            abort(403);
        }

        $vehicle->delete();
        return redirect()->route('renter.vehicles.index')->with('success', 'Vehicle deleted successfully!');
    }

    public function makeAvailable(Vehicle $vehicle)
    {
        if ($vehicle->user_id !== Auth::user()->id) {
            abort(403);
        }

        $vehicle->update(['status' => 'available']);

        return back()->with('success', 'The vehicle is now available for passengers!');
    }

    public function makeUnavailable(Vehicle $vehicle)
    {
        if ($vehicle->user_id !== Auth::user()->id) {
            abort(403);
        }

        $vehicle->update(['status' => 'unavailable']);

        return back()->with('success', 'The vehicle is now not available for passengers!');
    }


    public function update(Request $request, Vehicle $vehicle)
    {
        if ($vehicle->user_id !== Auth::user()->id) {
            abort(403);
        }
        $validated = $request->validate([
            'make_model' => 'required|string|max:255',
            'year' => 'required|integer|min:1980|max:' . date('Y'),
            'license_plate' => 'required|string|max:20',
            'type' => 'required|string|max:50',
            'seats' => 'required|integer|min:1|max:50',
            'color' => 'required|string|max:50',
            'road_tax_expiry' => 'required|date',
        ]);

        $vehicle->update($validated);

        return redirect()
            ->route('renter.vehicles.index')
            ->with('success', 'Vehicle updated successfully!');
    }
}
