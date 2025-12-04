@extends('layouts.main')

@section('title', 'Terms of Service - DS CodeRubix')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <h1 class="display-5 fw-bold mb-4">Terms of Service</h1>
            <p class="text-muted mb-4">Last updated: {{ date('F j, Y') }}</p>

            <div class="content">
                <h3 class="mt-4 mb-3">Acceptance of Terms</h3>
                <p>By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement.</p>

                <h3 class="mt-4 mb-3">Use License</h3>
                <p>Permission is granted to temporarily use this website for the purpose of submitting background check and drug screening requests. This is the grant of a license, not a transfer of title, and under this license you may not:</p>
                <ul>
                    <li>Modify or copy the materials</li>
                    <li>Use the materials for any commercial purpose or for any public display</li>
                    <li>Attempt to decompile or reverse engineer any software contained on the website</li>
                    <li>Remove any copyright or other proprietary notations from the materials</li>
                </ul>

                <h3 class="mt-4 mb-3">Service Availability</h3>
                <p>We strive to provide reliable service, but we do not guarantee that the website will be available at all times. We reserve the right to modify or discontinue the service at any time without notice.</p>

                <h3 class="mt-4 mb-3">User Responsibilities</h3>
                <p>You are responsible for:</p>
                <ul>
                    <li>Providing accurate and complete information when submitting requests</li>
                    <li>Maintaining the confidentiality of your account credentials</li>
                    <li>Complying with all applicable laws and regulations</li>
                </ul>

                <h3 class="mt-4 mb-3">Limitation of Liability</h3>
                <p>In no event shall we be liable for any damages arising out of the use or inability to use the materials on this website.</p>

                <h3 class="mt-4 mb-3">Governing Law</h3>
                <p>These terms and conditions are governed by and construed in accordance with applicable laws.</p>

                <h3 class="mt-4 mb-3">Contact Us</h3>
                <p>If you have any questions about these Terms of Service, please contact us at <a href="{{ route('contact') }}">our contact page</a>.</p>
            </div>
        </div>
    </div>
</div>
@endsection

