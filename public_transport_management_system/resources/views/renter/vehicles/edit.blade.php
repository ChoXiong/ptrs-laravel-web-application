@extends('layouts.navigation')

@section('content')
<div class="mt-4 ms-4">
    <a href="{{ route('renter.vehicles.index') }}" class="btn btn-secondary">
        Back
    </a>
</div>
<div class="d-flex align-items-center justify-content-center ms-2 me-2">
    <div class="container border border-1 border-dark rounded-2 m-2 p-4" style="width:50%">
        <h3 class="title mb-3">Edit Vehicle</h2>

            <form method="POST"
                action="{{ route('renter.vehicles.update', $vehicle->id) }}">
                @csrf
                @method('PUT')

                <!-- Make & Model -->
                <div class="mb-3">
                    <label class="form-label">Vehicle Make & Model</label>
                    <input type="text"
                        name="make_model"
                        class="form-control @error('make_model') is-invalid @enderror"
                        value="{{ old('make_model', $vehicle->make_model) }}">
                    @error('make_model') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Year -->
                <div class="mb-3">
                    <label class="form-label">Year</label>
                    <input type="number"
                        name="year"
                        class="form-control @error('year') is-invalid @enderror"
                        value="{{ old('year', $vehicle->year) }}">
                    @error('year') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- License Plate -->
                <div class="mb-3">
                    <label class="form-label">License Plate</label>
                    <input type="text"
                        name="license_plate"
                        class="form-control @error('license_plate') is-invalid @enderror"
                        value="{{ old('license_plate', $vehicle->license_plate) }}">
                    @error('license_plate') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Type -->
                <div class="mb-3">
                    <label class="form-label">Vehicle Type</label>
                    <select name="type"
                        class="form-select @error('type') is-invalid @enderror">
                        @foreach(['car','suv','van','motorcycle','lorry','pickup','others'] as $type)
                        <option value="{{ $type }}"
                            {{ old('type', $vehicle->type) === $type ? 'selected' : '' }}>
                            {{ ucfirst($type) }}
                        </option>
                        @endforeach
                    </select>
                    @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Seats -->
                <div class="mb-3">
                    <label class="form-label">Seats</label>
                    <input type="number"
                        name="seats"
                        class="form-control @error('seats') is-invalid @enderror"
                        value="{{ old('seats', $vehicle->seats) }}">
                    @error('seats') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Color -->
                <div class="mb-3">
                    <label class="form-label">Color</label>
                    <select name="color"
                        class="form-select @error('color') is-invalid @enderror">
                        @foreach(['Gold','Silver','Red','Blue','Black','White','Grey','Others'] as $color)
                        <option value="{{ $color }}"
                            {{ old('color', $vehicle->color) === $color ? 'selected' : '' }}>
                            {{ ucfirst($color) }}
                        </option>
                        @endforeach
                    </select>
                    @error('color') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Road Tax -->
                <div class="mb-3">
                    <label class="form-label">Road Tax Expiry</label>
                    <input type="date"
                        name="road_tax_expiry"
                        class="form-control @error('road_tax_expiry') is-invalid @enderror"
                        value="{{ old('road_tax_expiry', $vehicle->road_tax_expiry) }}">
                    @error('road_tax_expiry') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('renter.vehicles.index') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Update Vehicle
                    </button>
                </div>
            </form>
    </div>
</div>

@endsection