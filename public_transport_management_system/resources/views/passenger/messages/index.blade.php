@extends('layouts.navigation')

@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-1">
        <h3 class="title">My Messages</h3>
        
        <a href="" class="btn btn-outline-dark">Refresh</a>
    </div>
    <div class="mb-5">
        <h5>You will receive important messages and notifications here if any.</h5>
    </div>

    @if($messages->isEmpty())
    <div class="alert alert-info">No message found.</div>

    @else
    <div class="border border-2 border-dark rounded-3 m-3 p-3">
        @foreach($messages as $message)
        <div>
            <h5>{{$message->subject}}</h5>
            <p>{{$message->content, 100}}</p>
        </div>
        @endforeach
    </div>

    @endif
</div>

@endsection