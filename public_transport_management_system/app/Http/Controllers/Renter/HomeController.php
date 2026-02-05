<?php

namespace App\Http\Controllers\Renter;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('renter.home', [
            'name' => $user->name,
        ]);
    }

    public function vehicle()
    {
        return view('renter.vehicles.index');
    }

    public function benefit()
    {
        return view('renter.benefit');
    }

    public function showRentedVehicles(Rental $rentals)
    {
        $rentals = Rental::whereHas('vehicle', function ($query) {
            $query->where('user_id', auth()->id());})->with(['vehicle', 'user'])->get();
            
        return view('renter.rentedVehicles', compact('rentals'));
    }
}
