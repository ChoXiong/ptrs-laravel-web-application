@extends('layouts.navigation')

@section('content')
<div class="container-fluid">
    {{-- Hero Section --}}
    <div class="landing-bg2 d-flex align-items-center justify-content-center text-center">
        <div>
            <h1 class="main-title">Welcome, Renter {{ $name }} !</h1>
            <p class="sub-title">Shares Vehicles | Serves Community | Earns Side Incomes</p>
        </div>
    </div>

    {{-- Service Functions --}}
    <div class="container-xxl mt-3 mb-2">
        <div class="row">
            <div class="col-4">
                <img src="/images/rental-info.png" class="img-fluid rental-img" alt="rental info">
            </div>
            <div class="col align-content-center">
                <h2 class="title fw-medium text-center">
                    Our Services
                </h2>
                <p class="justify-text m-5" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    We provide a centralized platform that enables vehicle owners (renters) to offer their transportation
                    services across Malaysia in a safe, structured, and transparent manner. The system allows renters to
                    list their vehicles with complete details, including vehicle type, passenger capacity, and luggage
                    accommodation.
                    <br><br>
                    Rental prices are standardized and dynamically adjusted based on multiple factors such as time zones,
                    service locations, vehicle categories, and the number of passengers and luggage required. This ensures
                    fair pricing for users while maintaining consistency and reliability across different regions.
                    <br><br>
                    By streamlining the rental and booking process, the platform improves accessibility to public transport
                    services and supports efficient mobility solutions for both service providers and passengers throughout
                    Malaysia.
                </p>
                <div class="d-flex justify-content-end me-5">
                    <a href="{{ route('renter.vehicles.index') }}" class="btn btn-primary">
                        Go to My Vehicles ...
                        <i class="bi bi-truck me-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Places Available --}}
    <div class="container-xxl mt-4 mb-5">
        <hr class="border border-dark border-2">
        <h4 class="title fw-medium mb-2">
            Places Available for Rental:
        </h4>
        <br>
        <div class="row ms-5 me-5">
            <div class="col-3">
                <p class="fw-semibold mb-1">West Malaysia</p>
                <ul class="mb-0">
                    <li>Perlis</li>
                    <li>Perak</li>
                    <li>Penang</li>
                    <li>Kedah</li>
                    <li>Melaka</li>
                </ul>
            </div>

            <div class="col-4">

                <ul class="mb-0">
                    <li>Negeri Sembilan</li>
                    <li>Terengganu</li>
                    <li>Kuala Lumpur</li>
                    <li>Selangor</li>
                    <li>Johor</li>
                    <li>Pahang</li>
                </ul>
            </div>

            <div class="col-4">
                <p class="fw-semibold mb-1">East Malaysia</p>
                <ul class="mb-0">
                    <li>Sabah</li>
                    <li>Sarawak</li>
                </ul>
            </div>
            <div class="d-flex justify-content-end">
                <a href="https://www.google.com/maps/@4.1339832,104.3166242,6z?entry=ttu&g_ep=EgoyMDI1MTIwOS4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="btn btn-primary">
                    Check on the Map ...
                    <i class="bi bi-map me-1"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- What benefit --}}
    <div class="mt-4 ms-3 me-3">
        <hr class="border border-dark border-2">
        <h2 class="title mt-4">What we offer and provide for Renters or Vehicle Owners: </h2>
        <div class="row mt-3 mb-4">
            <div class="col">
                <div class="card" style="width:auto">
                    <img src="/images/insurance.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Insurances</h5>
                        <p class="card-text">Renter and passenger's insurances based on yearly, monthly or weekly.</p>
                        <a href="{{ route('renter.benefit') }}" class="btn btn-primary">Learn More
                            <i class="bi bi-arrow-up-right-square"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width:auto">
                    <img src="/images/maintainvehicle.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Vehicle Maintainance Fees</h5>
                        <p class="card-text">Vehicle maintainance fees based on yearly or manually</p>
                        <a href="{{ route('renter.benefit') }}" class="btn btn-primary">Learn More
                            <i class="bi bi-arrow-up-right-square"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width:auto">
                    <img src="/images/freeparking.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Parking Pass & Petrol Fee</h5>
                        <p class="card-text">Free parking pass and permissions for several places and petrol fees</p>
                        <a href="{{ route('renter.benefit') }}" class="btn btn-primary">Learn More
                            <i class="bi bi-arrow-up-right-square"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width:auto">
                    <img src="/images/medicalcheckup.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Medical Check-Up</h5>
                        <p class="card-text">Free medical check-up for vehicle owner and family</p>
                        <a href="{{ route('renter.benefit') }}" class="btn btn-primary">Learn More
                            <i class="bi bi-arrow-up-right-square"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection