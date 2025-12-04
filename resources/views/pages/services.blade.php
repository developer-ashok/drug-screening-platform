@extends('layouts.main')

@section('title', 'Services - DS CodeRubix')

@section('content')
<!-- Services Hero Section -->
<section class="services-hero py-5">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="section-title mb-3">Our Services</h1>
                <p class="lead text-muted mb-4">Submit your background check or drug screening request using our efficient forms below.</p>
                <a href="{{ route('background-check.form') }}" class="btn btn-primary btn-lg">FILL OUT FORM</a>
            </div>
            <div class="col-lg-6 text-center">
                <img src="https://cdn.pixabay.com/photo/2018/05/18/15/30/web-design-3411373_1280.jpg" alt="Our Services" class="img-fluid rounded shadow" style="max-height: 400px; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="services-grid py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">BACKGROUND CHECKS</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="service-box">
                    <div class="service-icon-box">
                        <i class="bi bi-search"></i>
                    </div>
                    <h3 class="service-box-title">Background Checks</h3>
                    <p class="service-box-text">Comprehensive background verification services including criminal history, employment verification, education checks, and more.</p>
                    <a href="{{ route('background-check.form') }}" class="btn btn-primary">LEARN MORE</a>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="service-box">
                    <div class="service-icon-box">
                        <i class="bi bi-clipboard-check"></i>
                    </div>
                    <h3 class="service-box-title">Drug Screenings</h3>
                    <p class="service-box-text">Professional drug testing services with convenient locations and flexible scheduling options for your business needs.</p>
                    <a href="{{ route('drug-screening.form') }}" class="btn btn-primary">LEARN MORE</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Detailed Services Section -->
<section class="detailed-services py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6 mb-4">
                <img src="https://cdn.pixabay.com/photo/2017/08/01/00/38/man-2562325_1280.jpg" alt="Background Check Process" class="img-fluid rounded shadow">
            </div>
            <div class="col-lg-6">
                <h3 class="mb-4">Comprehensive Background Check Services</h3>
                <p class="text-muted mb-3">Our background check services are designed to provide you with complete and accurate information about potential employees. We verify multiple aspects of a candidate's history to ensure you make informed hiring decisions.</p>
                <ul class="service-details-list">
                    <li><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Criminal History Check:</strong> Comprehensive nationwide criminal record search</li>
                    <li><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Employment Verification:</strong> Verify past employment history and job titles</li>
                    <li><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Education Verification:</strong> Confirm degrees, certifications, and educational credentials</li>
                    <li><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Credit History Check:</strong> Financial background assessment for positions requiring financial responsibility</li>
                    <li><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Reference Checks:</strong> Contact professional references to verify qualifications</li>
                    <li><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Identity Verification:</strong> Confirm identity and prevent fraud</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4 order-lg-2">
                <img src="https://cdn.pixabay.com/photo/2016/11/29/09/16/architecture-1868667_1280.jpg" alt="Drug Screening" class="img-fluid rounded shadow">
            </div>
            <div class="col-lg-6 order-lg-1">
                <h3 class="mb-4">Professional Drug Screening Services</h3>
                <p class="text-muted mb-3">We offer a complete range of drug testing services to help maintain a safe and drug-free workplace. Our network of certified collection sites ensures convenient access for your employees.</p>
                <ul class="service-details-list">
                    <li><i class="bi bi-check-circle-fill text-success me-2"></i><strong>5-Panel Drug Test:</strong> Tests for the most common substances (THC, Cocaine, Amphetamines, Opiates, PCP)</li>
                    <li><i class="bi bi-check-circle-fill text-success me-2"></i><strong>10-Panel Drug Test:</strong> Comprehensive testing including additional substances</li>
                    <li><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Pre-Employment Screening:</strong> Screen candidates before hiring</li>
                    <li><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Random Testing:</strong> Unannounced testing programs for current employees</li>
                    <li><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Post-Accident Testing:</strong> Testing following workplace incidents</li>
                    <li><i class="bi bi-check-circle-fill text-success me-2"></i><strong>Reasonable Suspicion Testing:</strong> Testing based on observed behavior</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Turnaround Times Section -->
<section class="turnaround-section py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">Turnaround Times</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="turnaround-box">
                    <div class="turnaround-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <h4 class="turnaround-title">Standard Processing</h4>
                    <p class="turnaround-text">3-5 business days for most background checks. This includes comprehensive verification of employment, education, and criminal history records.</p>
                    <ul class="turnaround-features">
                        <li>Complete verification process</li>
                        <li>Detailed reporting</li>
                        <li>Standard pricing</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="turnaround-box">
                    <div class="turnaround-icon">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>
                    <h4 class="turnaround-title">Rush Processing</h4>
                    <p class="turnaround-text">1-2 business days for expedited requests. Perfect for urgent hiring needs. Additional fees may apply for rush processing.</p>
                    <ul class="turnaround-features">
                        <li>Priority processing</li>
                        <li>Expedited verification</li>
                        <li>Fast results delivery</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

