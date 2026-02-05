<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Vehicle;

class Rental extends Model
{
     protected $fillable = [
          'id',
          'user_id',
          'vehicle_id',
          'start_rent',
          'end_rent',
          'total_days',
          'luggage_number',
          'total_price',
          'status'
     ];

     protected $casts = [
          'start_rent' => 'datetime',
          'end_rent' => 'datetime',
          'total_price' => 'decimal:2',
     ];

     public function user()
     {
          return $this->belongsTo(User::class);
     }

     public function vehicle()
     {
          return $this->belongsTo(Vehicle::class);
     }
}
