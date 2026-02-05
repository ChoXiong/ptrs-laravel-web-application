@extends('layouts.navigation')

@section('content')
    <div class="container-sm mt-5" style="width:60%">
        <h3 class="title">Payment Confirmation</h3>
        <p>You can also pay later after you have confirm and edit your rental details</p>
        <div class="card mt-3 mb-3 border border-2 border-dark rounded-5">
            <div class="card-body">
                <h5 class="text-center">Vehicle Details</h5>
                <hr>
                <p><strong>Vehicle:</strong> {{ $rental->vehicle->make_model }} , ( {{$rental->vehicle->type}} )</p>
                <p><strong>Capacity:</strong> {{ $rental->vehicle->seats }}</p>
                <hr>
                <h5 class="mt-3 text-center">Rental Details</h5>
                <hr>
                <p><strong>Rental Period:</strong>
                    From {{ $rental->start_rent }} to {{ $rental->end_rent }}
                </p>
                <p><strong>Total Days:</strong> {{ $rental->total_days }}</p>
                <p><strong>Total Price:</strong>
                    <span class="text-primary fw-bold">
                        RM {{ number_format($rental->total_price, 2) }}
                    </span>
                </p>

                <div class="d-flex align-items-center gap-3">
                    <form method="POST" action="{{ route('payment.pay', $rental->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary mt-3">
                            Confirm & Pay
                        </button>
                    </form>

                    <a href="{{ route('passenger.rent.display') }}" class="btn btn-secondary">Pay Later</a>
                </div>

            </div>
        </div>
    </div>
@endsection
