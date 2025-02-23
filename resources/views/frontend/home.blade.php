@extends('layouts.appFornt')

@section('content')
<div class="row">
    @foreach($cars as $car)
        <div class="col-md-4 mb-3">
            <div class="card">
                <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="{{ $car->name }}" style="height: 200px">

                <div class="card-body">
                    <h5>{{ $car->name }}- ({{ $car->brand }})</h5>
                    <p>Daily Rent: ${{ $car->daily_rent_price }}</p>
                    <a href="#" class="btn btn-primary">Book Now</a>

                    {{-- <a href="{{ route('rentals.index') }}" class="btn btn-primary">Book Now</a> --}}
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
