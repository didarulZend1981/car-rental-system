@extends('layouts.admin.layout')
@section('title','Dashboard')


@push('css')
<link href="{{ asset('backend') }}/lib/spectrum/spectrum.css" rel="stylesheet">


@endpush
@section('sl-mainpanel')
<nav class="breadcrumb sl-breadcrumb d-flex justify-content-center align-items-center">
    <h2 class="m-0">Rent History</h2>
</nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
               </div><!-- sl-page-title -->



        <div class="row row-sm mg-t-20">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Totall Cost ${{ $rental->total_cost }}</h5>
                        <h6 class="modal-title">Booking day {{ \Carbon\Carbon::parse($rental->start_date)->diffInDays(\Carbon\Carbon::parse($rental->end_date)) }}</h6>
                        <a href="{{ route('admin.rentals.index') }}" type="button" class="btn btn-success">back</a>
                    </div>

                        <div class="modal-body">
                            <div class="container">
                                <div class="row">

                                    <label class="form-label col-4 p-2">Customer Name</label>
                                    <label class="form-label col-8 p-1">{{ $rental->user->name}}</label>



                                    <label class="form-label col-4 p-2">Car Name</label>
                                    <label class="form-label col-8 p-1">{{ $rental->car->name}}</label>

                                    <br/><br/>
                                    <label class="form-label col-4 p-2">Status</label>
                                    <label class="form-label col-8 p-1">{{ ucfirst($rental->status) }}</label>



                                    <div class="col-6 p-1">
                                        <label class="form-label">Sart Date</label>
                                        <label class="form-label p-2">{{ $rental->start_date }}</label>


                                    </div>
                                    <div class="col-6 p-1">
                                        <label class="form-label">End Date</label>
                                        <label class="form-label p-2">{{ $rental->end_date }}</label>

                                    </div>



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
