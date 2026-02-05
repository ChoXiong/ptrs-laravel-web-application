@extends('layouts.navigation')

@section('content')

<div class="container-xxl mt-4">
    <h4 class="title mb-3">
        Benefits of Being a Renter
    </h4>
    <p class="fw-semibold">
        We offer several benefits to renters, such as insurance coverage, free parking passes, vehicle maintenance fees, petrol allowances, and medical check-ups.
    </p>
    <div class="text-end fw-bold mb-4 me-4">
        <a href="#" class="text-decoration-none">See Plans &gt;&gt;</a>
    </div>
    <hr>
</div>

<div class="container-xxl mt-4" id="RenterBenefits">

    <div class="m-2 p-2">
        <h3 class="fw-bold mb-4"><u>Insurances</u></h3>
        <div class=" row mt-2 justify-content-between">
            <div class="col">
                <h5 class="fw-bolder">Personal Auto Insurance vs. Insurance for Rental Cars</h5>
            </div>
            <div class="col-auto text-end">
                <button class="btn btn-outline-secondary" id="toggleBtn" onclick="toggleExpand('expand_list', 'toggleBtn')">
                    Show More
                </button>
            </div>
            <p>If you already have car insurance, we can provide extended coverage at 50% financial contribution, including:</p>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 d-none" id="expand_list">
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Collision Coverages</h5>
                            <p>Collision insurance helps cover repair or replacement costs if your car hits another vehicle or object.</p>
                            <p>Our Collision Damage Waiver may waive your liability for the total cost of damages, including windows, wheels, and interior.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Bodily Injury Liability</h5>
                            <p>Protects you from financial loss if you injure someone in an accident.</p>
                            <p>This coverage also includes medical assistance like ambulance transport to the nearest hospital.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Property Damage Liability</h5>
                            <p>Covers damages your car causes to property you don't own.</p>
                            <p>Also known as Personal Belongings Insurance, it protects items inside the rental car.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Comprehensive Coverage</h5>
                            <p>Covers repair or replacement costs from vandalism, theft, or natural disasters.</p>
                            <p>Helpful for breakdowns, flat tires, or unexpected issues during your rental period.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="m-2 p-2">
        <div class="row">
            <div class="col">
                <h3 class="fw-bold mb-4"><u>Vehicle Maintenance Fees</u></h3>
            </div>
            <div class="col-auto text-end">
                <button class="btn btn-outline-secondary" id="toggleBtn2" onclick="toggleExpand('expand_list2', 'toggleBtn2')">
                    Show More
                </button>
            </div>
        </div>
        <h5>How Much Does Car Maintenance Cost in Malaysia?</h5>
        <div class="d-none" id="expand_list2">
            <div class="m-4">
                <p>A basic car maintenance costs in Malaysia range from RM150 to RM800 per service, depending on mileage and vehicle type.</p>
                <p>Examples:</p>
                <ul>
                    <li>10,000 km service for a compact car: ~RM136</li>
                    <li>20,000 km service: ~RM215</li>
                    <li>40,000 km check-up: ~RM374</li>
                    <li>High-mileage vehicles (50,000-80,000 km) may cost ~RM1,500 annually</li>
                </ul>
            </div>

            <br>
            <h5>Benefits of Scheduled Maintenance</h5>
            <div class="m-4">
                <p>Regular maintenance improves fuel efficiency, safety, and resale value. Well-documented service records can increase resale price by 10-15%.</p>
                <p>Proactive maintenance reduces roadside breakdowns by ~40% and identifies minor issues before they escalate.</p>
                <p>A 30,000 km service typically includes oil changes, filter replacements, and system diagnostics (~RM450-RM500).</p>
                <p class="fw-bold" style="color: blue">We provide offers for coverage in vehicle maintenance fees for 90%, including one year of warranty.</p>
            </div>
        </div>
    </div>
    <hr>

    <div class="m-2 p-2">
        <div class=" row mt-2 justify-content-between">
            <div class="col">
                <h3 class="fw-bold mb-4"><u>Parking Pass & Petrol Fee</u></h3>
            </div>
            <div class="col-auto text-end">
                <button class="btn btn-outline-secondary" id="toggleBtn3" onclick="toggleExpand('expand_list3', 'toggleBtn3')">
                    Show More
                </button>
            </div>
            <p>We also provide benefits for parking pass and petrol allowance for the renters:</p>
        </div>
        <div class="row row-cols-1 row-cols-md-2 d-none" id="expand_list3">
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-header">Parking Pass</h5>
                        <p class="card-text m-3 fw-semibold">Free parking passes and permissions for several locations are provided for our renters.</p>
                        <ul>
                            <li> On-Street Parking: Allocated along city streets, often regulated by local authorities.</li>
                            <li> Off-Street Parking: Designated parking lots and multi-level car parks that provide structured parking options. <u>Check Available Places</u></li>

                        </ul>
                        <p class="card-text m-3 mt-4 fw-semibold">What we offers for renter:</p>
                        <ul>
                            <li><b>Coins & Tokens:</b> Traditional payment methods suitable for short-term parking.</li>
                            <li><b>Smart Cards Users:</b> Reloadable cards ideal for regular users.</li>
                            <li><b>Mobile Apps Users:</b> Digital platforms pass that streamline payment processes.</li>
                        </ul>
                        <p class="card-text m-3">These systems benefit every driver—from those renting a car via car rental malaysia for a long drive car adventure,
                            to corporate users in vehicles such as SUVs or MPVs hired through Car rental for corporate.</p>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-header">Petrol Allowance</h5>
                        <p class="card-text m-3 fw-semibold">Petrol allowances are included, making commuting and travel easier and more affordable.</p>
                        <p class="card-text m-3">Petrol Charges: We provide up to RM6,000 per year. Claims above RM6,000 require record-keeping for 1 years.</p>
                        <p class="card-text m-3">Toll Charges: Fully exempted, including payments made directly to the parking operator by the renter. <u>See How</u></p>
                        <p class="card-text m-3 mt-4 fw-semibold">Check The Updated Prices for Petrol from 18 December to 24 December 2025:</p>
                        <ul>
                            <li><b>RON95 : </b>RM2.62 per litre (-2 sen) // RM1.99 (0 sen) under BUDI95</li>
                            <li><b>RON97 : </b>RM3.24 per litre (-3 sen)</li>
                            <li><b>Diesel : </b> RM3.02 per litre (-4 sen) Peninsular Malaysia //RM 2.15 (0 sen) East Malaysia</li>
                        </ul>
                        <div class="mt-1 ms-4">
                            <br>
                            <a href="https://ringgitplus.com/en/blog/sponsored/petrol-price-malaysia-live-updates-ron95-ron97-diesel.html" alt="petrol_price_malaysia_update" target="_blank">
                                The prices set based on the weekly retail prices of petroleum products using (APM).</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="m-2 p-2">
        <h3 class="fw-bold mb-4"><u>Medical Check-Up</u></h3>
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <p>Free medical check-ups are provided for the vehicle owner and their immediate family members.</p>
                        <p>This ensures that our renters stay healthy and safe while managing their vehicles.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
function toggleExpand(listId, btnId) {
    const list = document.getElementById(listId);
    const btn = document.getElementById(btnId);

    if (!list || !btn) return;

    list.classList.toggle('d-none');

    btn.textContent = list.classList.contains('d-none')
        ? 'Show More'
        : 'Show Less';
}
</script>

@endsection