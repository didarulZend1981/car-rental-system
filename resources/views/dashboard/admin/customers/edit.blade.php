@extends('layouts.admin.layout')
@section('title','Dashboard')


@push('css')



@endpush
@section('sl-mainpanel')
<nav class="breadcrumb sl-breadcrumb d-flex justify-content-center align-items-center">
    <h2 class="m-0">Customer update</h2>
</nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
               </div><!-- sl-page-title -->



        <div class="row row-sm mg-t-20">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
                        <a href="{{ route('admin.customers.index') }}" type="button" class="btn btn-success">back</a>
                    </div>
                    <form action="{{ route('admin.customers.update',$customer->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 p-1">
                                        <label class="form-label">Customer Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $customer->name }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 p-1">
                                        <label class="form-label">Customer Email *</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $customer->email }}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 p-1">
                                        <label class="form-label">Customer Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 p-1">
                                        <label class="form-label">Customer Address</label>
                                        <input type="text" class="form-control" name="address" value="{{ $customer->address }}">
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>




      </div><!-- sl-pagebody -->


@endsection

@push('js')


@endpush
