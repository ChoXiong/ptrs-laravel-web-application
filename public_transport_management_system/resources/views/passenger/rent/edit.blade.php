@extends('layouts.navigation')

@section('content')
<div class="container mt-5">
    <h3>Edit Rental for {{ $vehicle->make_model }}</h3>
    
    <form action="{{ route('passenger.rent.update', $rental->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label>Start Date</label>
            <input type="datetime-local" name="start_rent" class="form-control" value="{{ \Carbon\Carbon::parse($rental->start_rent)->format('Y-m-d\TH:i') }}">
        </div>

        <div class="mb-3">
            <label>End Date</label>
            <input type="datetime-local" name="end_rent" class="form-control" value="{{ \Carbon\Carbon::parse($rental->end_rent)->format('Y-m-d\TH:i') }}">
        </div>

        <div class="mb-3">
            <label>Luggages</label>
            <input type="number" name="luggage_number" class="form-control" value="{{ $rental->luggage_number }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Booking</button>
        <a href="{{ route('passenger.rent.display') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection