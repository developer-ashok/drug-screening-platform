@extends('layouts.main')

@section('title', 'Home - DS CodeRubix')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="hero-title mb-4">Reliable Background Screening</h1>
                <p class="hero-subtitle mb-4">Complete background checks and drug screening of employees with our comprehensive and secure platform. Trusted by businesses nationwide for accurate, fast, and compliant screening services.</p>
                <div class="d-flex flex-wrap gap-3 mb-4">
                    <a href="{{ route('services') }}" class="btn btn-primary btn-lg">GET STARTED</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg">CONTACT US</a>
                </div>
                <div class="hero-stats d-flex gap-4">
                    <div>
                        <h3 class="mb-0 text-primary">10K+</h3>
                        <p class="text-muted small mb-0">Checks Completed</p>
                    </div>
                    <div>
                        <h3 class="mb-0 text-primary">500+</h3>
                        <p class="text-muted small mb-0">Companies Trust Us</p>
                    </div>
                    <div>
                        <h3 class="mb-0 text-primary">24/7</h3>
                        <p class="text-muted small mb-0">Support Available</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="https://cdn.pixabay.com/photo/2018/05/18/15/30/web-design-3411373_1280.jpg" alt="Background Screening" class="hero-image img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- Services Overview Section -->
<section class="services-overview py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title mb-3">Our Services</h2>
            <p class="lead text-muted">Comprehensive screening solutions tailored to your business needs</p>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="service-card-modern">
                    <div class="service-image-wrapper">
                        <img src="https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849825_1280.jpg" alt="Background Checks" class="service-image">
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Background Checks</h3>
                        <p class="service-description">Comprehensive background verification including criminal history, employment verification, education checks, credit history, and identity verification.</p>
                        <ul class="service-features">
                            <li><i class="bi bi-check-circle-fill text-success"></i> Criminal History Check</li>
                            <li><i class="bi bi-check-circle-fill text-success"></i> Employment Verification</li>
                            <li><i class="bi bi-check-circle-fill text-success"></i> Education Verification</li>
                            <li><i class="bi bi-check-circle-fill text-success"></i> Credit History Check</li>
                        </ul>
                        <a href="{{ route('background-check.form') }}" class="btn btn-primary mt-3">Request Background Check</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="service-card-modern">
                    <div class="service-image-wrapper">
                        <img src="https://cdn.pixabay.com/photo/2016/11/29/09/16/architecture-1868667_1280.jpg" alt="Drug Screening" class="service-image">
                    </div>
                    <div class="service-content">
                        <h3 class="service-title">Drug Screening</h3>
                        <p class="service-description">Professional drug testing services with convenient locations and flexible scheduling options for pre-employment, random, and post-accident testing.</p>
                        <ul class="service-features">
                            <li><i class="bi bi-check-circle-fill text-success"></i> 5-Panel & 10-Panel Tests</li>
                            <li><i class="bi bi-check-circle-fill text-success"></i> Pre-Employment Screening</li>
                            <li><i class="bi bi-check-circle-fill text-success"></i> Random Testing Programs</li>
                            <li><i class="bi bi-check-circle-fill text-success"></i> Fast Results</li>
                        </ul>
                        <a href="{{ route('drug-screening.form') }}" class="btn btn-primary mt-3">Request Drug Screening</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-section py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title mb-3">Why Choose Us</h2>
            <p class="lead text-muted">We provide reliable, fast, and secure screening services</p>
        </div>
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="feature-box text-center">
                    <div class="feature-icon-large">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>
                    <h4 class="feature-title">Fast Turnaround</h4>
                    <p class="feature-text">Get results quickly with our efficient processing. Standard checks completed in 3-5 business days, rush options available.</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="feature-box text-center">
                    <div class="feature-icon-large">
                        <i class="bi bi-shield-lock-fill"></i>
                    </div>
                    <h4 class="feature-title">Secure & Compliant</h4>
                    <p class="feature-text">Enterprise-grade security with full compliance to FCRA, EEOC, and state regulations. Your data is protected.</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="feature-box text-center">
                    <div class="feature-icon-large">
                        <i class="bi bi-award-fill"></i>
                    </div>
                    <h4 class="feature-title">Accurate Results</h4>
                    <p class="feature-text">99.9% accuracy rate with comprehensive verification processes. Trusted by leading companies nationwide.</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="feature-box text-center">
                    <div class="feature-icon-large">
                        <i class="bi bi-headset"></i>
                    </div>
                    <h4 class="feature-title">24/7 Support</h4>
                    <p class="feature-text">Dedicated customer support team available around the clock to assist with any questions or concerns.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section class="about-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="https://cdn.pixabay.com/photo/2015/01/08/18/29/entrepreneur-593358_1280.jpg" alt="About Us" class="img-fluid rounded shadow">
            </div>
            <div class="col-lg-6">
                <h2 class="section-title mb-4">ABOUT US</h2>
                <p class="text-muted mb-3">We are a leading provider of comprehensive background screening and drug testing services. Our platform enables businesses to efficiently verify candidate credentials, ensuring safe and reliable hiring decisions.</p>
                <p class="text-muted mb-3">With over 10 years of experience in the industry, we have built a reputation for accuracy, speed, and security in handling sensitive employee information. Our team of certified professionals works diligently to provide fast turnaround times while maintaining the highest standards of data security.</p>
                <p class="text-muted mb-4">We understand the importance of thorough screening in today's business environment and are committed to helping you make informed hiring decisions. Our services are designed to be user-friendly, efficient, and compliant with all relevant regulations.</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('services') }}" class="btn btn-primary">Learn More</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-primary">Get in Touch</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title mb-3">What Our Clients Say</h2>
            <p class="lead text-muted">Trusted by businesses across industries</p>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="testimonial-card">
                    <div class="testimonial-stars mb-3">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                    <p class="testimonial-text">"DS CodeRubix has streamlined our hiring process. The background checks are thorough and results come back quickly. Highly recommended!"</p>
                    <div class="testimonial-author">
                        <strong>Sarah Johnson</strong>
                        <p class="text-muted small mb-0">HR Director, Tech Corp</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="testimonial-card">
                    <div class="testimonial-stars mb-3">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                    <p class="testimonial-text">"The drug screening service is professional and efficient. Their team is responsive and the platform is easy to use. Great experience!"</p>
                    <div class="testimonial-author">
                        <strong>Michael Chen</strong>
                        <p class="text-muted small mb-0">Operations Manager, Retail Plus</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="testimonial-card">
                    <div class="testimonial-stars mb-3">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                    <p class="testimonial-text">"Excellent service and support. The comprehensive background checks help us make better hiring decisions. Very satisfied with the results."</p>
                    <div class="testimonial-author">
                        <strong>Emily Rodriguez</strong>
                        <p class="text-muted small mb-0">VP of HR, Finance Group</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section py-5">
    <div class="container">
        <div class="cta-box text-center">
            <h2 class="cta-title mb-3">Ready to Get Started?</h2>
            <p class="cta-text mb-4">Submit your first background check or drug screening request today. Our team is ready to help.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('background-check.form') }}" class="btn btn-primary btn-lg">Request Background Check</a>
                <a href="{{ route('drug-screening.form') }}" class="btn btn-outline-primary btn-lg">Request Drug Screening</a>
            </div>
        </div>
    </div>
</section>
@endsection

