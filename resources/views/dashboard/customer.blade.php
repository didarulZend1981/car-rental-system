@extends('layouts.admin.layout')
@section('title','didar')


@push('css')


<link href="{{ asset('backend') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
	<link href="{{ asset('backend') }}/lib/select2/css/select2.min.css" rel="stylesheet">


	<!-- Starlight CSS -->
	<link rel="stylesheet" href="{{ asset('backend') }}/css/starlight.css">





@endpush
@section('sl-mainpanel')

<nav class="breadcrumb sl-breadcrumb d-flex justify-content-center align-items-center">
    <h2 class="m-0">Dashboard</h2>
</nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">


        <div class="row">
            <!-- Total Cars Card -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Cars</h5>
                        <h3 class="display-4">{{$cars}}</h3>
                        <p class="text-muted">Total cars in the system</p>
                    </div>
                </div>
            </div>

            <!-- Available Cars Card -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Available Cars</h5>
                        <h3 class="display-4">{{$cars-$rent_count}}</h3>
                        <p class="text-muted">Cars available for rent</p>
                    </div>
                </div>
            </div>

            <!-- Rented Cars Card -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Rented Cars</h5>
                        <h3 class="display-4">{{$rent_count}}</h3>
                        <p class="text-muted">Cars currently rented</p>
                    </div>
                </div>
            </div>


















    </div><!-- card -->






  </div><!-- sl-pagebody -->


@endsection

@push('js')

<script>
$(function(){
'use strict';

$('#datatable1').DataTable({
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
