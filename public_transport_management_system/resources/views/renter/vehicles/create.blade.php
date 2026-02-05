@extends('layouts.navigation')

@section('content')

<div class="text-start ms-4 mt-4">
    <a href="{{ route('renter.vehicles.index') }}" class="btn btn-secondary">Back To Vehicle</a>
</div>
<div class="d-flex align-items-center justify-content-center ms-2 me-2">
    <div class="container border border-1 border-dark rounded-2 m-2 p-4" style="width:50%">
        <h3 class="title mb-3">Rent Vehicle</h3>

        <div class="mb-3">
            <h4>First Step: Basic Vehicle Information</h4>
            <p class="text-muted">Please fill in your vehicle details:</p>
            <div class="progress mb-4" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar" id="form_progress" style="width: 0%"></div>
            </div>
        </div>

        <form action="{{ route('renter.vehicles.store')}}" id="vehicleForm" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- STEP 1 -->
            <div class="form-step" id="step-1">
                <!-- Vehicle Type -->
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-truck me-1"></i>Vehicle Type</label>
                    <select class="form-select" name="type">
                        <option selected disabled>Choose vehicle type</option>
                        <option value="car">Car</option>
                        <option value="suv">SUV</option>
                        <option value="van">Van</option>
                        <option value="motorcycle">Motorcycle</option>
                        <option value="pickup">Pickup Truck</option> 
                        <option value="others">Others</option>
                    </select>
                </div>

                <!-- Vehicle Make & Model -->
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-car-front-fill me-1"></i>Vehicle Make & Model</label>
                    <input type="text" class="form-control" name="make_model" placeholder="e.g. Perodua Myvi 1.5 AV">
                </div>

                <!-- Year of Manufacture -->
                <div class="mb-3">
                    <label class="form-label">Year of Manufacture</label>
                    <input type="number" class="form-control" name="year" min="1980" max="2025" placeholder="e.g. 2021">
                </div>

                <!-- License Plate -->
                <div class="mb-3">
                    <label class="form-label">License Plate Number</label>
                    <input type="text" class="form-control" name="license_plate" placeholder="e.g. ABC 1234">
                </div>

                <!-- Vehicle Color -->
                <div class="mb-3">
                    <label class="form-label">Vehicle Color</label>
                    <select class="form-select" name="color">
                        <option selected disabled>Choose vehicle colour</option>
                        <option value="gold">Gold</option>
                        <option value="silver">Silver</option>
                        <option value="red">Red</option>
                        <option value="blue">Blue</option>
                        <option value="black">Black</option>
                        <option value="white">White</option>
                        <option value="grey">Grey</option>
                        <option value="others">Others</option>
                    </select>
                </div>

                <!-- Number of Seats -->
                <div class="row align-items-center">
                    <div class="col-4">
                        <label for="seat-range" class="form-label"><i class="bi bi-person me-1"></i>Number Of Seats</label>
                        <input type="range" class="form-range" name="seats" min="2" max="10" id="seat-range">
                    </div>
                    <div class="col-auto m-4">
                        <p class="fs-7 border border-black border-1 ps-2 pe-2" style="color:black" id="rangeValue"></->
                    </div>
                </div>

                <!-- Next Step Button -->
                <div class="text-end mt-4">
                    <button type="button" class="btn btn-primary" id="continueBtn">
                        Continue
                    </button>
                </div>
            </div>

            <!-- STEP 2 -->
            <div class="form-step d-none" id="step-2">

                <!-- Images -->
                <div class="mb-3">
                    <label class="form-label">Vehicle Images (can choose multiples)</label>
                    <input type="file" class="form-control" accept="image/*" multiple name="images[]">
                    <div class="form-text">Upload front, side, back and interior images of the vehicles</div>
                </div>

                <!-- Road Tax -->
                <div class="mb-3">
                    <label class="form-label">Road Tax Expiry Date</label>
                    <input type="date" class="form-control" name="road_tax_expiry">
                </div>

                <!-- Insurance -->
                <div class="mb-3">
                    <label class="form-label">Insurance Invoice</label>
                    <input type="file" class="form-control" accept=".jpg,.png,.pdf" name="insurance">
                    <div class="form-text">We accept pdf, png, or jpg files</div>
                </div>

                <!-- Terms & Condition checkbox -->
                <div class="mb-3">
                    <div class="form-control">
                        <input class="form-check-input" type="checkbox" value="" id="checkTerms">
                        <label class="form-check-label" for="checkTerms">
                            I accept the <u style="color: blue">Terms & conditions</u> before I rent for vehicle
                        </label>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn btn-outline-secondary" id="backBtn">
                        Back
                    </button>

                    <button type="button"
                        class="btn btn-success"
                        data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        Submit Vehicle
                    </button>

                    <div class="modal fade"
                        id="staticBackdrop"
                        data-bs-backdrop="static"
                        data-bs-keyboard="false"
                        tabindex="-1"
                        aria-labelledby="staticBackdropLabel"
                        aria-hidden="true">

                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">
                                        Successfully Registered Vehicle, Woohoo!
                                    </h5>
                                    <button type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    Your vehicle has been submitted and is pending approval.
                                </div>

                                <div class="modal-footer">
                                    <button type="button"
                                        class="btn btn-primary"
                                        id="confirmSuccess"
                                        onclick="document.getElementById('vehicleForm').submit();"
                                        data-bs-dismiss="modal">
                                        Hooray
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    /*Form sequence step */
    document.addEventListener('DOMContentLoaded', () => {
        const step1 = document.getElementById('step-1');
        const step2 = document.getElementById('step-2');
        const progressBar = document.getElementById('form_progress');

        const setProgress = (value) => {
            progressBar.style.width = value + '%';
            progressBar.setAttribute('aria-valuenow', value);
            progressBar.textContent = value + '%';
        };

        setProgress(50);

        document.getElementById('continueBtn').addEventListener('click', () => {
            step1.classList.add('d-none');
            step2.classList.remove('d-none');
            setProgress(100);

            window.scrollTo({
                top: 560,
                behavior: 'smooth'
            });

        });

        document.getElementById('backBtn').addEventListener('click', () => {
            step2.classList.add('d-none');
            step1.classList.remove('d-none');
            setProgress(50);

            window.scrollTo({
                top: 560,
                behavior: 'smooth'
            });
        });
    });

    /*Number of seat vehicle*/
    document.addEventListener('DOMContentLoaded', () => {
        const rangeInput = document.getElementById('seat-range');
        const rangeOutput = document.getElementById('rangeValue');

        rangeOutput.textContent = rangeInput.value;

        rangeInput.addEventListener('input', () => {
            rangeOutput.textContent = rangeInput.value;
        });
    });
</script>

@endsection