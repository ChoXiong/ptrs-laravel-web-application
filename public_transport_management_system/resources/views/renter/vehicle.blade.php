@extends('layouts.navigation')

@section('content')
<div class="hero">
    <img src="/images/backbanner.png" alt="banner">
    <div class="hero-content p-lg-4">
        <h1>Start Rent Your Vehicle</h1>
        <p>Before we adding your vehicle, please ensure it's ready for rent. Please fill in all required details accurately:</p>
        <div class="text-end">
            <button class="btn btn-outline-light rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSide" aria-expanded="false" aria-controls="collapseSide">
                Show Me More
            </button>
        </div>
    </div>
    <div class="hero-content2 ms-2 p-lg-4">
        <div class="collapse" id="collapseSide">
            <div class="text-end" style="width:350px">
                <p class="fw-medium">Things You Need Before Rental:</p>
            </div>
            <div class="card card-body" style="color: black">
                <ul class="list-group ps-4 pe-4">
                    <li class="list-group-item list-group-item-secondary ps-4 pe-4"><i class="bi bi-1-square me-3"></i>Vehicle Details & Basic Info</li>
                    <li class="list-group-item list-group-item-secondary ps-4 pe-4"><i class="bi bi-2-square me-3"></i>Valid License & Registration</li>
                    <li class="list-group-item list-group-item-secondary ps-4 pe-4"><i class="bi bi-3-square me-3"></i>Clean & Safe Condition</li>
                    <li class="list-group-item list-group-item-secondary ps-4 pe-4"><i class="bi bi-4-square me-3"></i>Features / Extras</li>
                </ul>
            </div>
        </div>
    </div>

</div>

<div id="no-vehicle">
    <div class="d-flex justify-content-center align-items-center min-vh-20">
        <div class="container m-4 text-center border border-2 border-dark-subtle rounded-5 p-4">
            <h2 class="fw-semibold">Looks like you haven't register your vehicle yet.</h2>
            <p>
                You need to register your vehicle first using the form below before
                you can start renting your vehicle to the passengers.
            </p>
        </div>
    </div>
</div>

<div id="vehicle-list" class="container d-none">
</div>

@endsection