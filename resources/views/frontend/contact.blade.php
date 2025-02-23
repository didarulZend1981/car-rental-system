@extends('layouts.appFornt')

@section('content')
<h1>Contact Us</h1>
<form method="POST" action="#">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" required>

    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="message">Message:</label>
    <textarea name="message" required></textarea>

    <button type="submit">Send Message</button>
</form>
@endsection
