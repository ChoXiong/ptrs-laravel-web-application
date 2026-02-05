<?php

namespace App\Http\Controllers\Passenger;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function payment(Rental $rental)
    {
        $this->authorizeRental($rental);

        if ($rental->status !== 'pending') {
            return redirect()->route('passenger.payment.success', $rental->id);
        }

        return view('passenger.rent.payment', compact('rental'));
    }

    public function pay(Request $request, Rental $rental)
    {
        $this->authorizeRental($rental);

        if ($rental->status !== 'pending') {
            return back()->with('error', 'Your rental is already processed!');
        }

        $rental->update([
            'status' => 'success'
        ]);

        return redirect()->route('passenger.payment.success', $rental->id)
            ->with('success', 'Your Payment is Successful');
    }

    public function success(Rental $rental)
    {
        if ($rental->status !== 'success') {
            return redirect()->route('payment.show', $rental->id);
        }
        return view('passenger.payment.success', compact('rental'));
    }

    private function authorizeRental(Rental $rental)
    {
        if ($rental->user_id !== Auth::id()) {
            abort(403);
        }
    }
}
