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
    <a class="breadcrumb-item" href="index.html">Starlight</a>
    <a class="breadcrumb-item" href="index.html">Tables</a>
    <span class="breadcrumb-item active">Data Table</span>
  </nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Data Table</h5>
      <p>DataTables is a plug-in for the jQuery Javascript library.</p>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Basic Responsive DataTable</h6>
      <p class="mg-b-20 mg-sm-b-30">Searching, ordering and paging goodness will be immediately added to the table, as shown in this example.</p>



      <h5 class="modal-title" id="exampleModalLabel">Totall Cars-{{$cars}}</h5>
      <h5 class="modal-title" id="exampleModalLabel">Avilable Cars -{{$cars-$rent_count}}</h5>
      <h5 class="modal-title" id="exampleModalLabel">Rent-{{$rent_count}}</h5>





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
