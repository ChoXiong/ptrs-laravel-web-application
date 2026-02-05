<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Passenger\HomeController as PassengerHome;
use App\Http\Controllers\Passenger\PassengerRentalController;
use App\Http\Controllers\Passenger\PaymentController;
use App\Http\Controllers\Renter\HomeController as RenterHome;
use App\Http\Controllers\Renter\VehicleController;
use App\Http\Controllers\Api\MessageApiController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes from Breeze
Route::middleware(['auth', 'verified'])->group(function () {

    Route::prefix('passenger')->name('passenger.')->group(function () {
        Route::get('/home', [PassengerHome::class, 'index'])->name('home');
        Route::get('/rent', [PassengerHome::class, 'toRent'])->name('rents');
        Route::get('/rent/display', [PassengerRentalController::class, 'display'])->name('rent.display');
        Route::get('/rent/vehicle/{vehicle}', [PassengerRentalController::class, 'create'])->name('rent.create');

        Route::resource('rent', PassengerRentalController::class)->parameters(['rent' => 'rental'])->except(['index', 'show','create']);
    });
    

    Route::get('payment/{rental}', [PaymentController::class, 'payment'])->name('payment.show');
    Route::post('payment/{rental}/pay', [PaymentController::class, 'pay'])->name('payment.pay');
    Route::get('payment/{rental}/success', [PaymentController::class, 'success'])->name('passenger.payment.success');


    // Renter

    Route::prefix('renter')->name('renter.')->group(function () {
        Route::get('/home', [RenterHome::class, 'index'])->name('renter.home');
        Route::get('/benefit', [RenterHome::class, 'benefit'])->name('renter.benefit');
        Route::get('/rentedVehicles', [RenterHome::class, 'showRentedVehicles'])->name('renter.rentedVehicles');

        Route::resource('vehicles', VehicleController::class);
        Route::patch('/vehicles/{vehicle}/make-available', [VehicleController::class, 'makeAvailable'])->name('vehicles.makeAvailable');
        Route::patch('/vehicles/{vehicle}/make-unavailable', [VehicleController::class, 'makeUnavailable'])->name('vehicles.makeUnavailable');
    });

    Route::get('/renter/home', [RenterHome::class, 'index'])->name('renter.home');
    Route::get('/renter/benefit', [RenterHome::class, 'benefit'])->name('renter.benefit');
    Route::get('/renter/rentedVehicles', [RenterHome::class, 'showRentedVehicles'])->name('renter.rentedVehicles');
});


Route::get('/passenger/messages/index', [MessageApiController::class, 'index'])->name('passenger.messages.index');

require __DIR__ . '/auth.php';
