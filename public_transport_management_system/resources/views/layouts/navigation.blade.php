@extends('layouts.app')

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">

        {{-- Brand / Title (LEFT side) --}}
        <div class="d-flex align-items-center">
            <h4 class="me-2 fw-bold mb-1"
                style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                PTRS
            </h4>
            <h5 class="me-4 mb-1"
                style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                Public Transport Rental & Sharing System
            </h5>
        </div>

        {{-- Toggle button for mobile --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            {{-- Left menu items --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                @auth
                @if(auth()->user()->role === 'passenger')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('passenger.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('passenger.rents') }}">Rents Vehicles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('passenger.rent.display')}}">My Rentals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('passenger.messages.index')}}">My Messages</a>
                </li>
                @endif

                @if(auth()->user()->role === 'renter')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('renter.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('renter.vehicles.index') }}">Vehicle</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('renter.benefit') }}">Benefits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('renter.rentedVehicles')}}">Rented Vehicles</a>
                </li>
                @endif
                @endauth

            </ul>

            {{-- Right menu items --}}
            <ul class="navbar-nav ms-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @endguest

                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <span class="dropdown-item text-muted">
                                Role: {{ auth()->user()->role }}
                            </span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item text-danger" type="submit">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>