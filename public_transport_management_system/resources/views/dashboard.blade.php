@extends('layouts.navigation')

<p>Something went wrong, back to home page</p>

@auth
    @if (auth()->user()->role === 'passenger')
        <a href ="/passenger/home">Home Page</a>
    @else
        <a href ="/renter/home">Home Page</a>
    @endif
@endauth