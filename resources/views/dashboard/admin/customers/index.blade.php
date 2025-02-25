



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
    <h2 class="m-0">Customer Information</h2>
</nav>

  <div class="sl-pagebody">

    <div class="card pd-20 pd-sm-40">


    <div class="table-title">
        <div class="row">
            <div class="col-sm-10">
                <h2>Manage <b>Customer</b></h2>
            </div>
            <div class="col-sm-2">
                <a href="{{ route('admin.customers.create') }}" class="btn btn-success"><i class="fa fa-plus"></i><span>Add New Customer</span></a>
            </div>
        </div>
    </div>



    <table class="table table-wrapper display responsive" id="datatable1">
                <thead>
                    <tr class="bg-light">
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tableList">
                @foreach ($customers as $key=>$customer)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $customer->name}}</td>
                    <td>{{ $customer->email}}</td>
                    <td>{{ $customer->phone}}</td>
                    <td>{{ $customer->address}}</td>
                    <td>
                        <a href="{{ route('admin.customers.edit',$customer->id) }}" class="edit"><i class="fa fa-pencil"></i></a>
                        <a href="{{ route('admin.customers.show',$customer->id) }}" class="show"><i class="fa fa-eye"></i></a>
                        <a href="#" class="delete" data-bs-toggle="modal" data-bs-target="#deleteCustomersModal{{ $customer->id }}"><i class="fa fa-close"></i></a>
                    </td>
                </tr>





                <!-- Delete Modal HTML -->
                <div class="modal fade" id="deleteCustomersModal{{ $customer->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Customer</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
                            </div>
                            <div class="modal-body">
                                <h3 class=" mt-3 text-warning">Delete !</h3>
                                <p class="mb-3">Once delete, you can't get it back.</p>
                                <input class="" hidden id="deleteID"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="delete-modal-close" class="btn shadow-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('admin.customers.destroy',$customer->id) }}" method="post">
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












    </div>

  </div><!-- sl-pagebody -->


@endsection



@push('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
