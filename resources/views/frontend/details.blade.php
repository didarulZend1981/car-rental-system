@extends('layouts.appFornt')

@section('content')
<div class="container mt-5">
    <!-- Car Details Section -->
    <div class="card mb-4">
        <div class="row g-0">
            <!-- Car Image -->
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $car_details->image) ?? 'https://via.placeholder.com/600x400' }}" class="img-fluid rounded" alt="{{ $car_details->name }}">

            </div>

            <!-- Car Information -->
            <div class="col-md-6">
                <div class="card-body">
                    <h2 class="card-title">{{ $car_details->name }} ({{ $car_details->car_type }})</h2>
                    <p class="card-text"><strong>Brand:</strong> {{ $car_details->brand }}</p>
                    <p class="card-text"><strong>Daily Rent:</strong> ${{ $car_details->daily_rent_price }} per day</p>
                    <p class="card-text"><strong>Availability:</strong> {{ $car_details->availability ? '✅ Available' : '❌ Booked' }}</p>
                    <p class="card-text">{{ $car_details->description ?? 'No description available.' }}</p>

                    <!-- Booking Button -->
                    {{-- <a href="{{ route('rentals.book', $car_details->id) }}" class="btn btn-success">🚀 Book This Car</a>
                    <a href="{{ route('rentals.index') }}" class="btn btn-secondary">⬅ Back to Rentals</a> --}}

                    <a href="#" class="btn btn-success">🚀 Book This Car</a>
                    <a href="{{ route('reantalPage.index') }}" class="btn btn-secondary">⬅ Back to Rentals</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Cars Section -->
    <h3 class="mt-5 mb-3">🚗 Related Available Cars</h3>
    <div class="row">
        @forelse($cars as $car)
            <div class="col-md-3">
                <div class="card mb-4">
                    <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="{{ $car->name }}" style="height: 200px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $car->name }}</h5>
                        <p class="card-text">💰 ${{ $car->daily_rent_price }} per day</p>
                        <a href="{{ route('reantalPage.details', $car->id) }}" class="btn btn-primary">🔍 View Details</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning">🚫 No related cars found!</div>
            </div>
        @endforelse

    </div>
</div>






@endsection
