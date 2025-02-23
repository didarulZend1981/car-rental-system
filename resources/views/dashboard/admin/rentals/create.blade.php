@extends('layouts.admin.layout')
@section('title','Dashboard')


@push('css')
<link href="{{ asset('backend') }}/lib/spectrum/spectrum.css" rel="stylesheet">


@endpush
@section('sl-mainpanel')
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Forms</a>
        <span class="breadcrumb-item active">Form Layouts</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
               </div><!-- sl-page-title -->



        <div class="row row-sm mg-t-20">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Booking</h5>
                        <a href="{{ route('admin.rentals.index') }}" type="button" class="btn btn-success">back</a>
                    </div>
                    <form action="{{ route('admin.rentals.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">

                                        <label class="form-label col-4 p-2">Customer Name</label>
                                        <select name="user_id" class="form-control col-8 p-1" required>
                                            <option value="">Select Customer</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>



                                    <label class="form-label col-4 p-2">Car Name</label>
                                        <select name="car_id" class="form-control col-8 p-1" required>
                                            <option value="">Select Car</option>
                                            @foreach ($cars as $car)
                                                <option value="{{ $car->id }}">{{ $car->name }} ({{ $car->brand }})</option>
                                            @endforeach
                                    </select>

                                    <br/><br/>
                                    <label class="form-label col-4 p-2">Status</label>
                                    <select name="status" class="form-control col-8 p-1" required>
                                            <option value="pendding">pendding</option>
                                            <option value="ongoing">Ongoing</option>
                                            <option value="completed">Completed</option>
                                            <option value="canceled">Canceled</option>
                                    </select>

                                    @error('end_date')
                                    <div class="text-danger  col-12 p-3">{{ $message }}</div>
                                    @enderror

                                    <div class="col-6 p-1">
                                        <label class="form-label">Sart Date</label>
                                        <div class="wd-200">
                                            <div class="input-group">
                                              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                              <input type="text" name="start_date" class="form-control fc-datepicker" placeholder="MM/DD/YYYY">
                                              {{-- type="text" --}}
                                          </div>
                                          </div>

                                    </div>
                                    <div class="col-6 p-1">
                                        <label class="form-label">End Date</label>
                                        <div class="wd-200">
                                            <div class="input-group">
                                              <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                              <input type="text"  name="end_date" class="form-control fc-datepicker" placeholder="MM/DD/YYYY">

                                            </div>
                                          </div>

                                    </div>



                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button  type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
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
