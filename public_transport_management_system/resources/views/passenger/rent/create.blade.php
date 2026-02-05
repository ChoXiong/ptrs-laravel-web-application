@extends('layouts.navigation')

@section('content')
    <div class="d-flex align-items-center justify-content-center m-4">
        <div class="container border border-1 border-dark rounded-2 m-2 p-4" style="width:70%">
            <h3 class="title"> Renting Vehicle: </h3>
            <h3>{{ $vehicle->make_model }}, {{ $vehicle->type }}</h3>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Whoops!</strong> Your rent date for start and end are wrong, check again:
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Sorry!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('passenger.rent.store') }}">
                @csrf
                <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                <div class="mb-3">
                    <label>Start Rent Date:</label>
                    <input type="datetime-local" id="start_rent" name="start_rent" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>End Rent Date:</label>
                    <input type="datetime-local" name="end_rent" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Number of Luggage:</label>
                    <input type="number" name="luggage_number" class="form-control" min="0" max="10">
                </div>
                <button type="submit" class="btn btn-success">Confirm and Go To Payment</button>
            </form>
        </div>
    </div>
@endsection
