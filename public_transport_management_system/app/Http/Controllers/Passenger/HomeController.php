<?php

namespace App\Http\Controllers\Passenger;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Renter\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vehicle;
use App\Models\Rental;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('passenger.home', [
            'name' => $user->name,
        ]);
    }

    public function toRent(Request $request)
    {
        $vehicles = Vehicle::where('status', 'available')->with('user');
    
        if ($request->filled('type')) {
            $vehicles->where('type', $request->type);
        }

        $vehicles = $vehicles->paginate(8)->withQueryString();

        return view('passenger.rents', compact('vehicles'));
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
}
