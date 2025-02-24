
@extends('layouts.appFornt')

@section('content')
<div class="container my-5">
    <div class="bg-dark text-light rounded overflow-hidden position-relative">
        <div class="row g-0">
            <!-- Image Section -->
            <div class="col-lg-6">
                {{-- <img src="https://readymadeui.com/image-1.webp" class="img-fluid h-100 w-100 object-fit-cover" alt="img"> --}}
                <img src="{{ asset('/car.jpg') }}" alt="Car Image" class="img-fluid h-100 w-100 object-fit-cover">
            </div>

            <!-- Content Section -->
            <div class="col-lg-6 d-flex flex-column justify-content-center align-items-end text-end p-5  position-relative">
                <div class="position-absolute top-0 end-0 h-100 bg-dark rounded-start-5 w-75" style="z-index: 1;"></div>

                <div class="position-relative" style="z-index: 2;">
                    <h3 class="fw-bold text-warning display-5">Rent Your Dream Car Today!</h3>


                    <a href="{{ route('reantalPage.index') }}" class="btn btn-light btn-lg mt-2">Explore Cars</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">



    <div class="text-center my-5">
        <h1 class="display-4 text-warning font-weight-bold">Features</h1>
        <p class="lead text-muted">Find the perfect car for your next adventure. Explore a wide range of options that suit your needs and budget.</p>
    </div>

    @foreach($cars as $car)
        <div class="col-md-4 mb-3">
            <div class="card">
                <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="{{ $car->name }}" style="height: 200px">

                <div class="card-body">
                    <h5>{{ $car->name }}- ({{ $car->brand }})</h5>
                    <p>Daily Rent: ${{ $car->daily_rent_price }}</p>


                    <a href="{{ route('reantalPage.details', $car->id) }}" class="btn btn-primary">Book Now</a>
                </div>
            </div>
        </div>
    @endforeach
</div>


<!-- Pagination Links -->
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
@endsection


