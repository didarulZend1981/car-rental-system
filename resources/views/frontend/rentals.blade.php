@extends('layouts.appFornt')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">🚗 Available Cars for Rent</h1>

    <!-- Search & Filter Form -->
    <form method="GET" action="{{ route('reantalPage.index') }}" class="mb-4">
        <div class="row g-3">
            <!-- Search by Name or Price -->
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search by  Price" value="{{ request('search') }}">
            </div>

            <!-- Filter by Car Type -->
            <div class="col-md-3">
                <select name="brand" class="form-select">
                    <option value="">Filter by brand</option>
                    <option value="Ford" {{ request('brand') == 'Ford' ? 'selected' : '' }}>Ford</option>
                    <option value="Hyundai" {{ request('brand') == 'Hyundai' ? 'selected' : '' }}>Hyundai</option>
                    <option value="Isuzu" {{ request('brand') == 'Isuzu' ? 'selected' : '' }}>Isuzu</option>
                    <option value="Kia" {{ request('brand') == 'Kia' ? 'selected' : '' }}>Kia</option>
                    <option value="Nissan" {{ request('brand') == 'Nissan' ? 'selected' : '' }}>Nissan</option>
                    <option value="Toyota" {{ request('brand') == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                </select>
            </div>

            <div class="col-md-3">
                <select name="car_type" class="form-select">
                    <option value="">Filter by Car Type</option>
                    <option value="Sedan" {{ request('car_type') == 'Sedan' ? 'selected' : '' }}>Sedan</option>
                    <option value="SUV" {{ request('car_type') == 'SUV' ? 'selected' : '' }}>SUV</option>
                    <option value="Hatchback" {{ request('car_type') == 'Hatchback' ? 'selected' : '' }}>Hatchback</option>
                    <option value="Pickup" {{ request('car_type') == 'Pickup' ? 'selected' : '' }}>Pickup</option>
                </select>
            </div>


            <!-- Submit Button -->
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">🔍 Search</button>
            </div>

            <!-- Reset Button -->
            <div class="col-md-2">
                <a href="#" class="btn btn-warning w-100">🔄 Reset</a>
            </div>
        </div>
    </form>

    <!-- Car List -->
    <div class="row">
        @forelse($cars as $car)
            <div class="col-md-4">
                <div class="card mb-4">

                    <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="{{ $car->name }}" style="height: 200px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $car->name }} ({{ $car->car_type }})</h5>
                        <p class="card-text">
                            💰 <strong>Price:</strong> ${{ $car->daily_rent_price }} per day <br>
                            📅 <strong>Availability:</strong> {{ $car->availability ? 'Available' : 'Booked' }}
                        </p>
                        <a href="#" class="btn btn-success w-100">🚀 Book Now</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning">🚫 No cars found matching your search criteria!</div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $cars->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
