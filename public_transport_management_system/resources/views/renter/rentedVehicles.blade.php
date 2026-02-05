@extends('layouts.navigation')

@section('content')
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-12">
            <h2 class="title">Rented Vehicles by Passengers</h2>
        </div>
    </div>

    <div class="card m-2">
        <div class="card-body">
            <table class="table table-striped align-middle text-center">
                <thead class="table-secondary">
                    <tr>
                        <th>Vehicle & Passenger</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Days</th>
                        <th>Luggage</th>
                        <th>Total Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rentals as $rental)
                        <tr style="height:100px">
                            <td>
                                <strong>{{ $rental->vehicle->make_model }}</strong><br>
                                <small class="text-muted">Passenger: {{ $rental->user->name }}</small>
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($rental->start_rent)->format('d M Y') }}<br>
                                <small class="text-muted">{{ \Carbon\Carbon::parse($rental->start_rent)->format('h:i A') }}</small>
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($rental->end_rent)->format('d M Y') }}<br>
                                <small class="text-muted">{{ \Carbon\Carbon::parse($rental->end_rent)->format('h:i A') }}</small>
                            </td>
                            <td>{{ $rental->total_days }}</td>
                            <td>{{ $rental->luggage_number }}</td>
                            <td>RM {{ number_format($rental->total_price, 2) }}</td>
                            <td>
                                <span class="badge {{ $rental->status === 'success' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($rental->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center p-5">
                                <div class="alert alert-info">No passengers have rented your vehicles yet.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection