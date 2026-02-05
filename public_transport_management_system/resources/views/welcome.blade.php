@extends('layouts.app')

@section('content')
<div class="landing-bg min-vh-100 d-flex align-items-center justify-content-center py-5">
    <div class="row w-100 justify-content-center">
        <div class="col-md-8">
            <div class="card glass-card shadow-sm">
                <div class="card-body p-md-3">
                    {{-- Main Content --}}
                    <h1 class="fw-bold mb-3 text-center">
                        Welcome to 
                    </h1>
                    <h2 class="fw-bold mb-3 text-center">
                        Public Transport Rental & Sharing System (PTRS)
                    </h2>

                    <p class="font-light text-center mb-0">
                        A modern platform for public transport rental and sharing.
                    </p>

                    {{-- Login or register --}}
                    @if (Route::has('login'))
                    <div class="login-register-card d-flex justify-content-center mt-5 gap-5">
                        @auth
                        @php
                        $role = auth()->user()->role;
                        $homeRoute = $role === 'renter' ? route('renter.home') : route('passenger.home');
                        @endphp

                        <a href="{{ $homeRoute }}" class="btn btn-outline-primary btn-sm">
                            Home
                        </a>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-primary btn-bg">
                            Log in
                        </a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-secondary btn-bg">
                            Register
                        </a>
                        @endif
                        @endauth

                    </div>
                    @endif

                </div>
            </div>



        </div>
    </div>
</div>
@endsection