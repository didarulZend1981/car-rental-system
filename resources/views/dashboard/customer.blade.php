@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Customer Dashboard</h1>
        <p>Welcome, {{ Auth::user()->name }}</p>
    </div>
@endsection
