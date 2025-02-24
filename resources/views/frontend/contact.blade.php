@extends('layouts.appFornt')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">📞 Contact Us</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-body">
                    <!-- Contact Form -->
                    <form method="POST" action="#">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">👤 Your Name:</label>
                            <input type="text" name="name" class="form-control" required placeholder="Enter your name">
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">📧 Your Email:</label>
                            <input type="email" name="email" class="form-control" required placeholder="Enter your email">
                        </div>

                        <!-- Message -->
                        <div class="mb-3">
                            <label for="message" class="form-label">📝 Your Message:</label>
                            <textarea name="message" class="form-control" rows="5" required placeholder="Write your message here..."></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">🚀 Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
