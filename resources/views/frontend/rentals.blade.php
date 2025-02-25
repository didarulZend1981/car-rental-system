@extends('layouts.appFornt')

@section('content')
<div class="container mt-5">

    <div class="text-center my-5">
        <h1 class="display-4 text-warning font-weight-bold">Available Cars for Rent</h1>
          </div>

    <!-- Search & Filter Form -->
    <form id="searchForm" method="GET" action="{{ route('reantalPage.index') }}" class="mb-4">
        <div class="row g-3">
            <!-- Search by Name or Price -->
            <div class="col-md-4">
                <input type="text" name="search" class="form-control" placeholder="Search by  Price" value="{{ request('search') }}">
            </div>

            <!-- Filter by Car Type -->
            <div class="col-md-3">
                {{-- @dd($uniqe_car_type_cars); --}}

                <select name="brand" class="form-select">

                    <option value="">Filter by brand</option>

                    @foreach ($uniqe_brand_cars as $car_ui)
                    <option value="{{ $car_ui }}" {{ request('brand') == $car_ui ? 'selected' : '' }}>
                        {{ $car_ui }}
                    </option>
                    @endforeach

                </select>
            </div>

            <div class="col-md-3">
                <select name="car_type" class="form-select">
                    <option value="">Filter by Car Type</option>
                    @foreach ($uniqe_car_type_cars as $car_ui)
                    <option value="{{ $car_ui }}" {{ request('brand') == $car_ui ? 'selected' : '' }}>
                        {{ $car_ui }}
                    </option>
                    @endforeach


                </select>
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

                         <div class="d-flex justify-content-between mb-2">
                            <p class="card-text"><strong>Name:</strong> {{ $car->name }}</p>
                            <p class="card-text"><strong>Type:</strong> {{ $car->car_type }}</p>
                        </div>
                        <p class="card-text d-flex justify-content-between mb-2">
                            <strong>Rent:</strong> ${{ $car->daily_rent_price }} per day <br>
                            <strong>Availability:</strong> {{ $car->availability ? 'Available' : 'Booked' }}
                        </p>
                        <a href="{{ route('reantalPage.details', $car->id) }}" class="btn btn-success w-100 mb-3">Book Now</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning"> No cars found matching your search criteria!</div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        <nav>
            <!-- Custom Bootstrap Pagination -->
            <ul class="pagination pagination-lg">
                <li class="page-item {{ $cars->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $cars->previousPageUrl() }}" tabindex="-1">Previous</a>
                </li>
                @foreach ($cars->getUrlRange(1, $cars->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $cars->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach
                <li class="page-item {{ !$cars->hasMorePages() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $cars->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>


@endsection


<!-- JavaScript for Auto Search -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('searchForm');
        const inputs = form.querySelectorAll('input, select');

        inputs.forEach(input => {
            input.addEventListener('input', () => {
                form.submit();
            });
        });
    });
    </script>
