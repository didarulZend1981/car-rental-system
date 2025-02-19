



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

    <div class="card pd-20 pd-sm-40">
    <h2>Manage Cars</h2>
    <div class="table-wrapper">

    <button data-bs-toggle="modal" data-bs-target="#addCarModal">Add New Car</button>

    <table id="datatable1" class="table display responsive nowrap">
        <thead>
            <tr>
                <th>ID</th>
                <th>Car Name</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Car Type</th>
                <th>Price</th>
                <th>Available</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->year }}</td>
                    <td>{{ $car->car_type }}</td>
                    <td>${{ $car->daily_rent_price }}</td>
                    <td>{{ $car->availability ? 'Yes' : 'No' }}</td>
                    <td>
                        <button onclick="editCar({{ $car->id }})">Edit</button>
                        <button onclick="deleteCar({{ $car->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>



  <!-- Add Car Modal -->
  <div class="modal fade" id="addCarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Car</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="name" placeholder="Car Name" required>
                    <input type="text" name="brand" placeholder="Brand" required>
                    <input type="text" name="model" placeholder="Model" required>
                    <input type="number" name="year" placeholder="Year" required>
                    <input type="text" name="car_type" placeholder="Car Type" required>
                    <input type="number" name="daily_rent_price" placeholder="Daily Rent Price" required>
                    <select name="availability">
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                    </select>
                    <input type="file" name="image">
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editCarModal" tabindex="-1" aria-labelledby="editCarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCarModalLabel">Edit Car</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editCarForm">
                    @csrf
                    @method('PUT') <!-- Laravel PUT Method -->
                    <input type="hidden" id="editCarId" name="id">
                    <input type="text" id="editCarName" name="name" placeholder="Car Name" required>
                    <input type="text" id="editCarBrand" name="brand" placeholder="Brand" required>
                    <input type="text" id="editCarModel" name="model" placeholder="Model" required>
                    <input type="number" id="editCarYear" name="year" placeholder="Year" required>
                    <input type="text" id="editCarType" name="car_type" placeholder="Car Type" required>
                    <input type="number" id="editCarPrice" name="daily_rent_price" placeholder="Daily Rent Price" required>
                    <select id="editCarAvailability" name="availability">
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

    </div>

  </div><!-- sl-pagebody -->


@endsection




@push('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>



        function editCar(id) {
    $.get('/cars/' + id + '/edit', function (data) {
        // Data Input Field এ বসানো
        $('#editCarId').val(data.id);
        $('#editCarName').val(data.name);
        $('#editCarBrand').val(data.brand);
        $('#editCarModel').val(data.model);
        $('#editCarYear').val(data.year);
        $('#editCarType').val(data.car_type);
        $('#editCarPrice').val(data.daily_rent_price);
        $('#editCarAvailability').val(data.availability);

        // Modal Show
        $('#editCarModal').modal('show');
    });
}

// Edit Form Submit
$('#editCarForm').submit(function (event) {
    event.preventDefault(); // Prevent Form Default Submit

    let id = $('#editCarId').val();
    let formData = $(this).serialize(); // Serialize Form Data

    $.ajax({
        url: '/cars/' + id+'/update', // Update Route
        type: 'PUT',
        data: formData,

        success: function (res) {
            Swal.fire('Updated!', res.success, 'success').then(() => {
                $('#editCarModal').modal('hide');
                location.reload();
            });
        },
        error: function (err) {
            Swal.fire('Error!', 'Something went wrong!', 'error');
        }
    });
});

        function deleteCar(id) {

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/cars/" + id,
                        type: "DELETE",
                        data: {_token: "{{ csrf_token() }}"},
                        success: function (res) {
                            Swal.fire("Deleted!", res.success, "success").then(() => location.reload());
                        }
                    });
                }
            });
        }

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
</script>

@endpush
