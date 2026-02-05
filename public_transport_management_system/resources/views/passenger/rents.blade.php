@extends('layouts.navigation')

@section('content')
    {{-- Show Available Vehicles --}}
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-7">
                <h2 class="title">Avaliable Vehicles</h2>
            </div>
            <div class="col-5">
                <div class="d-flex justify-content-end align-items-center gap-2">
                    <div class="mt-3">
                        <form method="GET" action="{{ route('passenger.rents') }}" class="">
                            <select name="type" class="form-select" onchange="this.form.submit()">
                                <option value="">All Vehicle Types</option>
                                <option value="car" {{ request('type') == 'car' ? 'selected' : '' }}>Car</option>
                                <option value="suv" {{ request('type') == 'suv' ? 'selected' : '' }}>SUV</option>
                                <option value="van" {{ request('type') == 'van' ? 'selected' : '' }}>Van</option>
                                <option value="motorcycle" {{ request('type') == 'motorcycle' ? 'selected' : '' }}>
                                    Motorcycle</option>
                                <option value="lorry" {{ request('type') == 'lorry' ? 'selected' : '' }}>Lorry
                                </option>
                                <option value="pickup" {{ request('type') == 'pickup' ? 'selected' : '' }}>Pickup
                                </option>
                            </select>
                        </form>
                    </div>
                    <button class="btn btn-outline-secondary" onclick="window.location.reload()">
                        <i class="bi bi-arrow-clockwise"></i> Refresh
                    </button>
                </div>
            </div>
        </div>
        <div class="row m-2 justify-content-center">
            @foreach ($vehicles as $vehicle)
                <div
                    class="card col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 m-2 p-3 text-center vehicle-{{ strtolower($vehicle->color) }}">
                    <div class="row">
                        <img src="/images/vehicle-default.jpg" class="img-thumbnail" alt="vehicle-image">
                        <div class="card ">
                            <div class="m-0">
                                <h5>{{ $vehicle->make_model }}</h5>
                                <small class="fw-bold">( {{ $vehicle->type }} ) Owner: {{$vehicle->user->name}} </small>
                                <hr>
                            </div>
                            <p class="m-0">Plate Number: {{ $vehicle->license_plate }}</p>
                            <p class="m-0">Number of seats: {{ $vehicle->seats }}</p>
                            <p class="m-0">Vehicle color: {{ $vehicle->color }}</p>
                        </div>
                        <a href="{{ route('passenger.rent.create', ['vehicle' => $vehicle->id]) }}" class="btn btn-primary m-3"
                            style="width:85%">Rent this vehicle</a>
                    </div>
                </div>
            @endforeach
            {{ $vehicles->links() }}
        </div>
    </div>
@endsection
