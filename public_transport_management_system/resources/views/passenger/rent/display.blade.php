@extends('layouts.navigation')

@section('content')
    <div class="mt-4 mb-4 ms-5">
        <h3 class="title">My Rentals</h3>
    </div>
    
    <div class="container-fluids ms-4 me-4 mt-3 p-2 bg-light rounded border">
        <form action="{{ route('passenger.rent.display') }}" method="GET" class="row g-3 align-items-end">
            <div class="col-md-5">
                <label class="form-label fw-bold">Filter by Status</label>
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="success" {{ request('status') == 'success' ? 'selected' : '' }}>Success (Paid)
                    </option>
                </select>
            </div>

            <div class="col-md-5">
                <label class="form-label fw-bold">Sort by Date</label>
                <select name="sort" class="form-select">
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Newest to Latest</option>
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Latest to Newest</option>
                </select>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
            </div>
        </form>
    </div>
    <div class="container-fluids p-2 border border-3 border-dark rounded-2 m-2">
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if ($rentals->isEmpty())
            <div class="alert alert-info">
                You haven't rent any vehicles yet.
            </div>
        @else
            <table class="table table-striped mt-3 text-center align-middle">
                <thead class="table-secondary">
                    <th style="width:auto">Vehicle</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th style="width:auto">Total Days</th>
                    <th style="width:auto">Luggages</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th style="width: 240px">Actions</th>
                </thead>
                <tbody>
                    @foreach ($rentals as $rental)
                        <tr style="height:100px">
                            <td>{{ $rental->vehicle->make_model }} ({{$rental->vehicle->license_plate}})<br>
                                <small class="text-muted">Vehicle Owner: {{ $rental->vehicle->user->name ?? '' }}</small>
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($rental->start_rent)->format('d M Y') }}<br>
                                <small
                                    class="text-muted">{{ \Carbon\Carbon::parse($rental->start_rent)->format('h:i A') }}</small>
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($rental->end_rent)->format('d M Y') }}<br>
                                <small
                                    class="text-muted">{{ \Carbon\Carbon::parse($rental->end_rent)->format('h:i A') }}</small>
                            </td>
                            <td>{{ $rental->total_days }}</td>
                            <td>{{ $rental->luggage_number }}</td>
                            <td>RM {{ $rental->total_price }}</td>
                            <td>
                                <div>
                                    @if ($rental->status === 'pending')
                                        <h5><span class="badge bg-secondary">{{ $rental->status }}</span></h5>
                                    @else
                                        <h5><span class="badge bg-success">{{ $rental->status }}</span></h5>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    @if ($rental->status === 'pending')
                                        <a href="{{ route('payment.show', $rental->id) }}"
                                            class="btn btn-success btn-lg mb-3">
                                            <i class="bi bi-cash-coin"></i> </a>
                                        <a href="{{ route('passenger.rent.edit', $rental->id) }}"
                                            class="btn btn-primary btn-lg mb-3"><i class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('passenger.rent.destroy', $rental->id) }}" class="d-inline"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to cancel this rental?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-lg">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    @else
                                        <h5><span class="badge bg-success"><i class="bi bi-lock-fill"></i> Completed</span>
                                        </h5>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

@endsection
