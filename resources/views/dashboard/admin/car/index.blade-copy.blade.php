modal not working code no chaange but upadete step by step following code"
layouts.admin.layout.blade.php:-
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

     <title>@yield('title')</title>

      <link href="{{ asset('backend') }}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/highlightjs/github.css" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/css/starlight.css">
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    @include('layouts.admin.partials.sidebar_left_panel')

    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('layouts.admin.partials.sidebar_head_panel')
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## END: HEAD PANEL ########## -->

    @include('layouts.admin.partials.sidebar_right_panel')

    <!-- ########## START: MAIN PANEL ########## -->

    <div class="sl-mainpanel">
        @yield('sl-mainpanel')
       @include('layouts.admin.partials.content_footer')
    </div><!-- sl-mainpanel -->






  <!-- ########## END: MAIN PANEL ########## -->




<script src="{{ asset('backend') }}/lib/jquery/jquery.js"></script>
<script src="{{ asset('backend') }}/lib/popper.js/popper.js"></script>
<script src="{{ asset('backend') }}/lib/bootstrap/bootstrap.js"></script>
<script src="{{ asset('backend') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="{{ asset('backend') }}/lib/highlightjs/highlight.pack.js"></script>
<script src="{{ asset('backend') }}/lib/datatables/jquery.dataTables.js"></script>
<script src="{{ asset('backend') }}/lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="{{ asset('backend') }}/lib/select2/js/select2.min.js"></script>


<script src="{{ asset('backend') }}/js/starlight.js"></script>

  @stack('js')
  </body>
</html>




dashboard.admin.car.index.blade.php :-

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

    <h2>Manage Cars</h2>

    <button data-bs-toggle="modal" data-bs-target="#addCarModal">Add New Car</button>

    <table id="carsTable" class="table">
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



  <!-- Add Car Modal -->
  <div class="modal fade" id="addCarModal">
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
        <button type="submit">Save</button>
    </form>
</div>




  </div><!-- sl-pagebody -->


@endsection




@push('js')

<script>
        $(document).ready(function () {
            $('#carsTable').DataTable();
        });

        function editCar(id) {
            $.get('/admin/cars/' + id + '/edit', function (data) {
                Swal.fire({
                    title: 'Edit Car',
                    input: 'text',
                    inputValue: data.name,
                    showCancelButton: true,
                    confirmButtonText: 'Update',
                    preConfirm: (value) => {
                        $.post('/admin/cars/' + id + '/update', {name: value, _token: "{{ csrf_token() }}"}, function (res) {
                            Swal.fire('Updated!', res.success, 'success').then(() => location.reload());
                        });
                    }
                });
            });
        }

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
                        url: "/admin/cars/" + id,
                        type: "DELETE",
                        data: {_token: "{{ csrf_token() }}"},
                        success: function (res) {
                            Swal.fire("Deleted!", res.success, "success").then(() => location.reload());
                        }
                    });
                }
            });
        }
</script>

@endpush
 "





 ==================================================================================================================







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
         url: '/cars/' + id, // Update Route
         type: 'PUT',
         data: formData,

         success: function (res) {
             Swal.fire('Updated!', res.success, 'success').then(() => {
                 $('#editCarModal').modal('hide'); // মডাল হাইড করুন
                 location.reload(); // পেজ রিফ্রেশ করুন
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
