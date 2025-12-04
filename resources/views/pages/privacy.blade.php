@extends('layouts.main')

@section('title', 'Privacy Policy - DS CodeRubix')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <h1 class="display-5 fw-bold mb-4">Privacy Policy</h1>
            <p class="text-muted mb-4">Last updated: {{ date('F j, Y') }}</p>

            <div class="content">
                <h3 class="mt-4 mb-3">Information We Collect</h3>
                <p>We collect information that you provide directly to us when you submit a background check or drug screening request. This includes:</p>
                <ul>
                    <li>Company information and contact details</li>
                    <li>Candidate personal information</li>
                    <li>Contact information (email, phone numbers)</li>
                    <li>Any documents or files you upload</li>
                </ul>

                <h3 class="mt-4 mb-3">How We Use Your Information</h3>
                <p>We use the information we collect to:</p>
                <ul>
                    <li>Process your background check and drug screening requests</li>
                    <li>Communicate with you about your requests</li>
                    <li>Provide customer support</li>
                    <li>Comply with legal obligations</li>
                </ul>

                <h3 class="mt-4 mb-3">Data Security</h3>
                <p>We implement appropriate technical and organizational measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p>

                <h3 class="mt-4 mb-3">Data Retention</h3>
                <p>We retain your information for as long as necessary to fulfill the purposes outlined in this privacy policy, unless a longer retention period is required by law.</p>

                <h3 class="mt-4 mb-3">Your Rights</h3>
                <p>You have the right to access, correct, or delete your personal information. To exercise these rights, please contact us using the information provided on our contact page.</p>

                <h3 class="mt-4 mb-3">Contact Us</h3>
                <p>If you have any questions about this Privacy Policy, please contact us at <a href="{{ route('contact') }}">our contact page</a>.</p>
            </div>
        </div>
    </div>
</div>
@endsection

