<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MessageApiController;

Route::apiResource('messages', MessageApiController::class);




