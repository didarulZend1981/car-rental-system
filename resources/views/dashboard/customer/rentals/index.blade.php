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

      <table class="table table-wrapper display responsive" id="datatable1">
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
                <th>Cancel</th>


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
            <td>
            <a href="#" class="delete" data-bs-toggle="modal" data-bs-target="#deleteRentalsModal{{ $rental->id }}"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>Delete</a>
            </td>

        </tr>




        <!-- Delete Modal HTML -->
        <div class="modal fade" id="deleteRentalsModal{{ $rental->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete rental</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3 class=" mt-3 text-warning">Delete !</h3>
                        <p class="mb-3">Once delete, you can't get it back.</p>
                        <input class="" hidden id="deleteID"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="delete-modal-close" class="btn shadow-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form action="{{ route('customers.rental.destroy',$rental->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="itemDelete()" type="submit" id="confirmDelete" class="btn shadow-sm btn-danger" >Delete</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>


        @endforeach
        </tbody>
    </table>
    </div><!-- card -->






  </div><!-- sl-pagebody -->


@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
