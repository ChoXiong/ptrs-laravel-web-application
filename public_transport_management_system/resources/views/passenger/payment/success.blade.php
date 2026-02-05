@extends('layouts.navigation')

@section('content')
    <div class="container mt-5 mb-5 text-center">
        <h2 class="text-success">Payment Successful</h2>

        <p>Rental ID: <strong>{{ $rental->id }}</strong></p>
        <p>Vehicle ID: {{ $rental->vehicle_id }}</p>
        <p><strong>Vehicle:</strong> {{ $rental->vehicle->make_model }}</p>

        <p><strong>Rental Period:</strong>
            {{ \Carbon\Carbon::parse($rental->start_rent)->format('d M Y') }}
            to
            {{ \Carbon\Carbon::parse($rental->end_rent)->format('d M Y') }}
        </p>
        <p>Total Price: RM {{ number_format($rental->total_price, 2) }}</p>
        <p>Status: <span class="badge bg-success">{{ $rental->status }}</span></p>

        <a href="{{ route('passenger.home') }}" class="btn btn-primary mt-3">Back to Home</a>
    </div>
@endsection
