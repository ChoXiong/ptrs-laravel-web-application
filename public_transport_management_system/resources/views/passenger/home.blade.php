@extends('layouts.navigation')

@section('content')
    <div class="container mt-5 mb-5 ms-5">
        <h1 class="title fw-medium">Welcome Passenger, {{ $name }} !</h1>
    </div>
    <div class="container-xxl">
        <div id="carouselExampleAutoplaying" class="carousel carousel-light slide small-carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/images/carservice1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/images/carservice2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/images/carservice3.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-4 align-content-center">
                <div>
                    <img src="/images/rental-info.png" class="img-fluid rental-img" alt="rental info">
                </div>
            </div>
            <div class="col-8 align-content-center">
                <h2 class="title fw-medium text-center">
                    About Our Services
                </h2>
                <p class="justify-text m-5"
                    style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    We provide a centralized platform that enables customers (passengers) to rent their transportation
                    services across Malaysia in a safe, structured, and transparent manner. The system allows customers to
                    check the list of available vehicles with complete details, including vehicle type, passenger capacity,
                    and
                    luggage accommodation.
                    <br><br>
                    The rental prices are standardized and dynamically adjusted based on multiple factors such as time
                    zones,
                    service locations, vehicle categories, and the number of passengers and luggage required. This ensures
                    fair pricing for users while maintaining consistency and reliability across different regions.
                    <br><br>
                    By streamlining the rental and booking process, the platform improves accessibility to public transport
                    services and supports efficient mobility solutions for both service providers and passengers throughout
                    Malaysia.
                </p>
            </div>
        </div>
    </div>

    {{-- vehicle for rent --}}
    <div class="mt-4 ms-3 me-3">
        <hr class="border border-dark border-2">
        <h2 class="title mt-4">Our Supported Vehicles for Rent: </h2>
        <div class="row mt-3 mb-4">
            <div class="col">
                <div class="card text-center" style="width:auto">
                    <img src="/images/car.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Cars</h5>
                        <a href="{{ route('passenger.rents') }}" class="btn btn-primary">Checkout
                            <i class="bi bi-arrow-up-right-square"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center" style="width:auto">
                    <img src="/images/suv.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">SUV</h5>
                        <a href="{{ route('passenger.rents') }}" class="btn btn-primary">Checkout
                            <i class="bi bi-arrow-up-right-square"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center" style="width:auto">
                    <img src="/images/van.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Van</h5>
                        <a href="{{ route('passenger.rents') }}" class="btn btn-primary">Checkout
                            <i class="bi bi-arrow-up-right-square"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center" style="width:auto">
                    <img src="/images/motor.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Motorcyle</h5>
                        <a href="{{ route('passenger.rents') }}" class="btn btn-primary">Checkout
                            <i class="bi bi-arrow-up-right-square"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center" style="width:auto">
                    <img src="/images/lorry.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Lorry</h5>
                        <a href="{{ route('passenger.rents') }}" class="btn btn-primary">Checkout
                            <i class="bi bi-arrow-up-right-square"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center" style="width:auto">
                    <img src="/images/pickup.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Pickup</h5>
                        <a href="{{ route('passenger.rents') }}" class="btn btn-primary">Checkout
                            <i class="bi bi-arrow-up-right-square"></i>
                        </a>
                    </div>
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
                <a href="https://www.google.com/maps/@4.1339832,104.3166242,6z?entry=ttu&g_ep=EgoyMDI1MTIwOS4wIKXMDSoASAFQAw%3D%3D"
                    target="_blank" class="btn btn-primary">
                    Check on the Map ...
                    <i class="bi bi-map me-1"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
