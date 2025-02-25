@extends('layouts.admin.layout')
@section('title','Dashboard')


@push('css')
<link href="{{ asset('backend') }}/lib/spectrum/spectrum.css" rel="stylesheet">


@endpush
@section('sl-mainpanel')
<nav class="breadcrumb sl-breadcrumb d-flex justify-content-center align-items-center">
    <h2 class="m-0">Car Show</h2>
</nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
               </div><!-- sl-page-title -->



        <div class="row row-sm mg-t-20">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                                   <a href="{{ route('admin.cars.index') }}" type="button" class="btn btn-success">back</a>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="row">

                                <label class="form-label col-4 p-2">Name</label>
                                <label class="form-label col-8 p-1">{{$car->name}}</label>

                                <label class="form-label col-4 p-2">brand</label>
                                <label class="form-label col-8 p-1">{{$car->brand}}</label>


                                <label class="form-label col-4 p-2">model</label>
                                <label class="form-label col-8 p-1">{{$car->model}}</label>

                                <label class="form-label col-4 p-2">year</label>
                                <label class="form-label col-8 p-1">{{$car->year}}</label>

                                <label class="form-label col-4 p-2">car_type</label>
                                <label class="form-label col-8 p-1">{{$car->car_type}}</label>

                                <label class="form-label col-4 p-2">daily_rent_price</label>
                                <label class="form-label col-8 p-1">{{$car->daily_rent_price}}</label>

                                <label class="form-label col-4 p-2">availability</label>
                                <label class="form-label col-8 p-1">{{ $car->availability ? 'Available' : 'Booked' }}</label>




                                <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="{{ $car->name }}" style="height: 200px">










                            </div>
                        </div>
                    </div>
                        <div class="modal-footer">

                        </div>

                </div>
            </div>




      </div><!-- sl-pagebody -->


@endsection

@push('js')
<script src="{{ asset('backend') }}/lib/jquery-ui/jquery-ui.js"></script>
<script>
    $(function(){

            'use strict';



            // Datepicker
            $('.fc-datepicker').datepicker({
              showOtherMonths: true,
              selectOtherMonths: true
            });





          });
        </script>

@endpush
