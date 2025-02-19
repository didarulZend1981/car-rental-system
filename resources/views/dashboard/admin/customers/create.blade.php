@extends('layouts.admin.layout')
@section('title','Dashboard')


@push('css')



@endpush
@section('sl-mainpanel')
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Forms</a>
        <span class="breadcrumb-item active">Form Layouts</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
               </div><!-- sl-page-title -->



        <div class="row row-sm mg-t-20">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                        <a href="{{ route('admin.customers.index') }}" type="button" class="btn btn-success">back</a>
                    </div>
                    <form action="{{ route('admin.customers.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 p-1">
                                        <label class="form-label">Customer Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 p-1">
                                        <label class="form-label">Customer Email *</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 p-1">
                                        <label class="form-label">Customer Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 p-1">
                                        <label class="form-label">Customer Address</label>
                                        <input type="text" class="form-control" name="address" value="{{ old('phone') }}">
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 p-1">
                                        <label class="form-label">Customer Password *</label>
                                        <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('phone') }}">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button  type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>




      </div><!-- sl-pagebody -->


@endsection

@push('js')


@endpush
