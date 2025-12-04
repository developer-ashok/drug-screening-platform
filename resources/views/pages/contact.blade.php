@extends('layouts.main')

@section('title', 'Contact Us - DS CodeRubix')

@section('content')
<div class="container py-5">
    <div class="row mb-5">
        <div class="col-lg-12 text-center">
            <h1 class="section-title mb-3">Contact Us</h1>
            <p class="lead text-muted">Please contact us with any questions or for more information.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="contact-form-box">
                <h3 class="mb-4">Send us a Message</h3>
                <form>
                    <div class="mb-3">
                        <label for="contact_name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="contact_name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="contact_email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact_phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="contact_phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="contact_message" class="form-label">Message</label>
                        <textarea class="form-control" id="contact_message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">SEND MESSAGE</button>
                </form>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="contact-info-box">
                <img src="https://cdn.pixabay.com/photo/2015/01/09/11/08/startup-594090_1280.jpg" alt="Contact Us" class="img-fluid rounded mb-4">
                <h3 class="mb-4">Contact Information</h3>
                <div class="contact-info-item mb-4">
                    <strong class="d-block mb-2"><i class="bi bi-geo-alt-fill text-primary me-2"></i>ADDRESS:</strong>
                    <p class="text-muted mb-0">123 Business Street, Suite 100<br>City, State 12345<br>United States</p>
                </div>
                <div class="contact-info-item mb-4">
                    <strong class="d-block mb-2"><i class="bi bi-envelope-fill text-primary me-2"></i>EMAIL:</strong>
                    <p class="text-muted mb-0">info@dscoderubix.com</p>
                </div>
                <div class="contact-info-item mb-4">
                    <strong class="d-block mb-2"><i class="bi bi-telephone-fill text-primary me-2"></i>PHONE:</strong>
                    <p class="text-muted mb-0">(555) 123-4567</p>
                </div>
                <div class="contact-info-item">
                    <strong class="d-block mb-2"><i class="bi bi-clock-fill text-primary me-2"></i>BUSINESS HOURS:</strong>
                    <p class="text-muted mb-0">Monday - Friday: 8:00 AM - 6:00 PM<br>Saturday: 9:00 AM - 1:00 PM<br>Sunday: Closed</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

