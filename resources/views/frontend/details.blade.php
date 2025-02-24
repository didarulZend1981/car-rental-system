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

                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-warning">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                    <form method="POST" action="{{ route('rentals.store', $car_details->id) }}">
                        @csrf
                    <h2 class="card-title">{{ $car_details->name }} ({{ $car_details->car_type }})</h2>
                    <p class="card-text"><strong>Brand:</strong> {{ $car_details->brand }}</p>
                    <p class="card-text"><strong>Daily Rent:</strong> ${{ $car_details->daily_rent_price }} per day</p>
                    <p class="card-text"><strong>Availability:</strong> {{ $car_details->availability ? '✅ Available' : '❌ Booked' }}</p>
                    <p class="card-text">{{ $car_details->description ?? 'No description available.' }}</p>


                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date:</label>
                        <input type="date" name="start_date" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date:</label>
                        <input type="date" name="end_date" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Book Now</button>

                    <a href="{{ route('reantalPage.index') }}" class="btn btn-secondary">⬅ Back to Rentals</a>
                </form>
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
