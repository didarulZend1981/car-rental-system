@extends('layouts.appFornt')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4"><i class="fas fa-car text-warning"></i> About Us</h1>

    <div class="card shadow-lg">
        <div class="card-body">
            <h2 class="text-primary"><i class="fas fa-users"></i> Who We Are</h2>
            <p>
                Welcome to <strong>Car Rental Hub</strong>! We provide the best car rental service at affordable prices.
                Whether you're traveling for business or leisure, our wide range of vehicles ensures you find the perfect ride.
            </p>

            <h3 class="text-success mt-4"><i class="fas fa-bullseye"></i> Our Mission</h3>
            <p>
                Our mission is to make car rentals easy, convenient, and affordable. We aim to provide top-quality service
                with a seamless booking experience.
            </p>

            <h3 class="text-warning mt-4"><i class="fas fa-star"></i> Why Choose Us?</h3>
            <ul>
                <li><i class="fas fa-check-circle text-success"></i> Affordable prices with no hidden fees.</li>
                <li><i class="fas fa-car text-primary"></i> Wide range of well-maintained vehicles.</li>
                <li><i class="fas fa-handshake text-info"></i> Easy booking and cancellation process.</li>
                <li><i class="fas fa-phone text-danger"></i> 24/7 customer support.</li>
            </ul>

            <h3 class="text-info mt-4"><i class="fas fa-map-marker-alt"></i> Our Location</h3>
            <p>We are located in the heart of the city, making it easy for you to pick up and drop off your rental car.</p>

            <div class="text-center mt-4">
                <a href="{{ url('/') }}" class="btn btn-primary"><i class="fas fa-home"></i> Back to Home</a>
            </div>
        </div>
    </div>
</div>
@endsection
