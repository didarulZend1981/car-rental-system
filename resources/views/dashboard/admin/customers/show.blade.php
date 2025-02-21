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
        <div class="card pd-20 pd-sm-40">
               <!-- sl-page-title -->




                <div class="row">
                    <div class="col-sm-10">
                        <h2>Customer <b>Information</b></h2>
                    </div>
                    <div class="col-sm-2">
                        <a href="{{ route('admin.customers.index') }}" type="button" class="btn btn-success">back</a>
                    </div>
                </div>



        <div class="row row-sm mg-t-20">

            <div class="container">
                <div class="row">
                    <label class="form-label col-4 p-2">Customer Name</label>
                    <label class="form-label col-8 p-1">{{$customer->name}}</label>
                    <label class="form-label col-4 p-2">email</label>
                    <label class="form-label col-8 p-1">{{$customer->email}}</label>

                    <br/><br/>
                    <label class="form-label col-4 p-2">phone</label>
                    <label class="form-label col-8 p-1">{{$customer->phone}}</label>
                    <label class="form-label col-4 p-2">address</label>
                    <label class="form-label col-8 p-1">{{$customer->address}}</label>


                    <hr/>


                </div>



                    <table class="table table-wrapper" id="tableData">
                        <thead>
                            <tr class="bg-light">
                                <th>SL</th>
                                <th>car Name</th>
                                <th>car model</th>
                                <th>car brand</th>
                                <th>car_type</th>
                                <th>rent/day</th>
                                <th>day</th>
                                <th>total_cost</th>
                                <th>status</th>
                                <th>start_date</th>
                                <th>end_date</th>

                            </tr>
                        </thead>
                        <tbody id="tableList">
                        @foreach ($rentals as $key=>$rental)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $rental->car->name}}</td>
                            <td>{{ $rental->car->model}}</td>
                            <td>{{ $rental->car->brand}}</td>
                            <td>{{ $rental->car->car_type}}</td>
                            <td>{{ $rental->car->daily_rent_price}}</td>
                            <td>{{ \Carbon\Carbon::parse($rental->start_date)->diffInDays(\Carbon\Carbon::parse($rental->end_date)) }}</td>
                            <td>{{ $rental->total_cost}}</td>
                            <td>{{ $rental->status}}</td>
                            <td>{{ $rental->start_date}}</td>
                            <td>{{ $rental->end_date}}</td>




                        </tr>







                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>



      </div><!-- sl-pagebody -->
    </div>

@endsection

@push('js')
<script src="{{ asset('backend') }}/lib/jquery-ui/jquery-ui.js"></script>
<script>

    $(function(){
     'use strict';

     $('#tableData').DataTable({
       responsive: true,
       language: {
         searchPlaceholder: 'Search...',
         sSearch: '',
         lengthMenu: '_MENU_ items/page',
       }
     });



     // Select2
     $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

     });

    </script>

@endpush
