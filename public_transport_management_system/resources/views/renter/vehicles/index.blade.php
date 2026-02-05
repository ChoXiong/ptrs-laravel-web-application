@extends('layouts.navigation')

@section('content')
<div class="hero">
    <img src="/images/backbanner.png" alt="banner">
    <div class="hero-content p-lg-4">
        @if($vehicles->count())
        <div class="ps-4 pe-4">
            <h1>Manage Your Vehicles</h1>
            <p>View, edit, or add new vehicles to continue renting to passengers.</p>
        </div>
        @else
        <h1>Start Renting Your Vehicle</h1>
        <p>
            Before adding your vehicle, please ensure it's ready for rent.
            Fill in all required details accurately.
        </p>
        @endif
        <div class="text-end">
            <button class="btn btn-outline-light rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSide" 
            aria-expanded="false" 
            aria-controls="collapseSide">
                Show Me More >>
            </button>
        </div>
    </div>
    <div class="hero-content2 ms-2 p-lg-3">
        <div class="collapse" id="collapseSide">
            <div class="text-end me-4" style="width:350px">
                <p class="fw-medium">Things You Need Before Rental:</p>
            </div>
            <div class="card card-body" style="color: black">
                <ul class="list-group ps-4 pe-4">
                    <li class="list-group-item list-group-item-secondary ps-4 pe-4"><i class="bi bi-1-square me-3"></i>Vehicle Details & Basic Info</li>
                    <li class="list-group-item list-group-item-secondary ps-4 pe-4"><i class="bi bi-2-square me-3"></i>Valid License & Registration</li>
                    <li class="list-group-item list-group-item-secondary ps-4 pe-4"><i class="bi bi-3-square me-3"></i>Clean & Safe Condition</li>
                    <li class="list-group-item list-group-item-secondary ps-4 pe-4"><i class="bi bi-4-square me-3"></i>Features / Extras</li>
                </ul>
                <div class="text-end mt-1">
                    <a href="{{ route('renter.vehicles.create') }}" class="btn btn-primary">Add Vehicle</a>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($vehicles->count())
<div id="vehicle-list" class="container">
    <h3 class="mt-3 mb-3">Your Vehicles</h3>
    @foreach($vehicles as $vehicle)
    <div class="card-vehicle-list card row m-3 p-4 vehicle-{{ strtolower($vehicle->color) }}">
        <div class="col">
            <div class="row">
                <div class="col-2">
                    <div>
                        <img src="/images/vehicle-default.jpg" class="img-thumbnail" alt="vehicle-image">
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto mb-sm-2 me-0 pe-0">
                                    <h4 class="card-title">{{ $vehicle->make_model }}</h4>
                                </div>
                                <div class="col-auto">
                                    <h4 class="card-text">( {{ $vehicle->type }} )</h4>
                                </div>
                            </div>
                            <p class="card-text m-0">License Plate Number: {{ $vehicle->license_plate }}</p>
                            <p class="card-text m-0">Number of seats: {{ $vehicle->seats }}</p>
                            <p class="card-text m-0">Vehicle color: {{ $vehicle->color }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text m-0">Year of Manufacture: {{ $vehicle->year }}</p>
                            <p class="card-text m-0">Road Tax Expiry: {{ $vehicle->road_tax_expiry }}</p>
                            <hr>
                            <div class="text-end mt-3">
                                @if($vehicle->status == 'available')
                                <form action="{{ route('renter.vehicles.makeUnavailable', $vehicle->id) }}" method="POST" class="d-inline">
                                    @csrf
                                     @method('PATCH')
                                    <button class="btn btn-success">On Hold</button>
                                </form>
                                @else
                                <form action="{{ route('renter.vehicles.makeAvailable', $vehicle->id) }}" method="POST" class="d-inline">
                                    @csrf
                                     @method('PATCH')
                                    <button type="submit" class="btn btn-primary">Rent Now</button>
                                </form>
                                @endif
                                <a href="{{ route('renter.vehicles.edit', $vehicle->id) }}" class="btn btn-secondary"><i class="bi bi-pencil-square"></i> Edit</a>
                                <form action="{{ route('renter.vehicles.destroy', $vehicle->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this vehicle?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@else
<div id="no-vehicle">
    <div class="d-flex justify-content-center align-items-center min-vh-20">
        <div class="container m-4 text-center border border-2 border-dark-subtle rounded-5 p-4">
            <h2 class="fw-semibold">Looks like you haven't register your vehicle yet.</h2>
            <p>
                You need to register your vehicle first using the form below before
                you can start renting your vehicle to the passengers.
            </p>

            <div class="text-end">
                <a href="{{ route('renter.vehicles.create') }}" class="btn btn-primary">Add Vehicle</a>
            </div>
        </div>
    </div>
</div>
@endif

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const cards = document.querySelectorAll(".card-vehicle-list");

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                }
            });
        }, {
            threshold: 0.2
        });

        cards.forEach(card => observer.observe(card));
    });
</script>


@endsection