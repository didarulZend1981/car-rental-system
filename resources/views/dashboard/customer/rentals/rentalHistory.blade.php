



@extends('layouts.admin.layout')
@section('title','didar')


@push('css')


<link href="{{ asset('backend') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
	<link href="{{ asset('backend') }}/lib/select2/css/select2.min.css" rel="stylesheet">


	<!-- Starlight CSS -->
	<link rel="stylesheet" href="{{ asset('backend') }}/css/starlight.css">





@endpush


@section('sl-mainpanel')

<nav class="breadcrumb sl-breadcrumb">
    
  </nav>

  <div class="sl-pagebody">

    <div class="card pd-20 pd-sm-40">


    <div class="table-title">
        <div class="row">
            <div class="col-sm-10">
                <h2>Rental <b>History</b></h2>
            </div>

        </div>
    </div>




        <table class="table table-wrapper display responsive" id="tableData">
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

  </div><!-- sl-pagebody -->


@endsection




@push('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
