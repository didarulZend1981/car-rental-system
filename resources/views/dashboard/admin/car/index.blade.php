



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
    <h2 class="m-0">Cars Information</h2>
</nav>

  <div class="sl-pagebody">

    <div class="card pd-20 pd-sm-40">

    <div class="table-title">
        <div class="row">
            <div class="col-sm-10">
                <h2>Manage <b>Cars</b></h2>
            </div>
            <div class="col-sm-2">
                <button data-bs-toggle="modal" data-bs-target="#addCarModal" class="btn btn-success mb-2"><i class="fa fa-plus"></i> Add New Car</button>
            </div>
        </div>
    </div>




        <table class="table table-wrapper display responsive" id="datatable1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Car Name</th>
                <th>image</th>
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
                    <td>@if($car->image)
                        <img src="{{ asset('storage/' . $car->image) }}" alt="Car Image" width="40">
                    @else
                        No Image
                    @endif</td>

                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->year }}</td>
                    <td>{{ $car->car_type }}</td>
                    <td>${{ $car->daily_rent_price }}</td>
                    <td>{{ $car->availability ? 'Yes' : 'No' }}</td>
                    <td>
                        <button onclick="editCar({{ $car->id }})"><i class="fa fa-pencil"></i></button>
                        <a href="{{ route('admin.cars.show',$car->id) }}" class="edit"><i class="material-icons" data-toggle="tooltip" title="show"></i><i class="fa fa-eye"></i></a>
                        <button onclick="deleteCar({{ $car->id }})"><i class="fa fa-close"></i></button>
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12 p-1">
                    <input type="text" name="name"  class="form-control" placeholder="Car Name" required>
                    </div>
                    <div class="col-12 p-1">
                    <input type="text" name="brand"  class="form-control" placeholder="Brand" required>
                    </div>

                    <div class="col-12 p-1">
                    <input type="text" name="model" class="form-control" placeholder="Model" required>
                    </div>

                    <div class="col-12 p-1">
                    <input type="number" name="year" class="form-control"  placeholder="Year" required>
                    </div>

                    <div class="col-12 p-1">
                    <input type="text" name="car_type" class="form-control" placeholder="Car Type" required>
                    </div>
                    <div class="col-12 p-1">
                    <input type="number" name="daily_rent_price" class="form-control"  placeholder="Daily Rent Price" required>
                    </div>
                    <div class="col-12 p-1">
                    <select name="availability" class="form-control">
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                    </select>
                    </div>
                    {{-- <input type="file" name="image"> --}}

                        <input type="file" id="editCarImage" name="image" accept="image/*">
                        <img id="editCarImagePreview"   width="150" style="margin-bottom: 10px;">
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editCarModal" tabindex="-1" aria-labelledby="editCarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCarModalLabel">Edit Car</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
            </div>
            <div class="modal-body">
                <div class="container">

                    <form id="editCarForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Laravel PUT Method -->
                    <input type="hidden" id="editCarId" name="id">
                    <div class="row">
                    <label class="form-label col-4 p-1">Car Name</label>
                    <input type="text" id="editCarName" class="form-control col-8 p-1" name="name" placeholder="Car Name" required>
                    </br></br>


                    <label class="form-label col-4 p-1">Brand Name</label>
                    <input type="text" id="editCarBrand" class="form-control col-8 p-1"  name="brand" placeholder="Brand" required>


                    <label class="form-label col-4 p-1">Model Name</label>
                    <input type="text" id="editCarModel" class="form-control col-8 p-2"  name="model" placeholder="Model" required>


                    <label class="form-label col-4 p-1">Year</label>
                    <input type="number" id="editCarYear" class="form-control col-8 p-2"  name="year" placeholder="Year" required>


                    <label class="form-label col-4 p-1">Car Type</label>
                    <input type="text" id="editCarType" class="form-control col-8 p-2" name="car_type" placeholder="Car Type" required>


                    <label class="form-label col-4 p-1">Daily Rent Price</label>
                    <input type="number" id="editCarPrice" class="form-control col-8 p-2" name="daily_rent_price" placeholder="Daily Rent Price" required>


                    <label class="form-label col-4 p-1">Status</label>
                    <select id="editCarAvailability" class="form-control col-8 p-2" name="availability">
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                    </select>


                    <!-- Image Preview Field -->
                    <div>
                        {{-- <label for="editCarImage">Current Image:</label><br> --}}
                        {{-- <img id="editCarImagePreview"  alt="Car Image" width="150" style="margin-bottom: 10px;"> --}}
                    </div>

                    <!-- Image Upload Input -->
                    <div>
                        <label for="editCarImage">Change Image (Optional):</label>
                        <input type="file" id="editCarImage" name="image" accept="image/*">
                        <img id="editCarImagePreview"  alt="Car Image" width="150" style="margin-bottom: 10px;">

                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>

                </form>
                    </div>
                </div>
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

        $('#editCarId').val(data.id);
        $('#editCarName').val(data.name);
        $('#editCarBrand').val(data.brand);
        $('#editCarModel').val(data.model);
        $('#editCarYear').val(data.year);
        $('#editCarType').val(data.car_type);
        $('#editCarPrice').val(data.daily_rent_price);
        $('#editCarAvailability').val(data.availability);

        if (data.image) {
            $('#editCarImagePreview').attr('src', '/storage/' + data.image);
        } else {
            $('#editCarImagePreview').attr('src', 'https://via.placeholder.com/100');
        }

        // Modal Show
        $('#editCarModal').modal('show');
    });
}




$('#editCarImage').on('change', function (e) {
    const reader = new FileReader();
    reader.onload = function (e) {
        $('#editCarImagePreview').attr('src', e.target.result);
    };
    reader.readAsDataURL(this.files[0]);
});


$('#editCarForm').submit(function (event) {
    event.preventDefault();

    let id = $('#editCarId').val();
    let formData = new FormData(this);

    $.ajax({
        url: '/cars/' + id + '/update',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
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
