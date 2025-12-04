@extends('layouts.main')

@section('title', 'Background Check Request - DS CodeRubix')


@section('content')
<div class="container section-padding fade-in-up">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bold mb-3">Background Check Request Form</h1>
                <p class="lead text-muted">Please fill out the form below to submit a background check request. All fields marked with * are required.</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('background-check.submit') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf

                <div class="form-section">
                    <div class="form-section-header">
                        <h5 class="mb-0"><i class="bi bi-building me-2"></i>Company Information</h5>
                    </div>
                    <div class="form-section-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="company_name" class="form-label required-field">Company Name</label>
                                <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" value="{{ old('company_name') }}" required>
                                @error('company_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="contact_person_name" class="form-label required-field">Contact Person Name</label>
                                <input type="text" class="form-control @error('contact_person_name') is-invalid @enderror" id="contact_person_name" name="contact_person_name" value="{{ old('contact_person_name') }}" required>
                                @error('contact_person_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="contact_email" class="form-label required-field">Contact Email</label>
                                <input type="email" class="form-control @error('contact_email') is-invalid @enderror" id="contact_email" name="contact_email" value="{{ old('contact_email') }}" required>
                                @error('contact_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="contact_phone" class="form-label required-field">Contact Phone</label>
                                <input type="tel" class="form-control @error('contact_phone') is-invalid @enderror" id="contact_phone" name="contact_phone" value="{{ old('contact_phone') }}" required>
                                @error('contact_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="position_job_title" class="form-label">Position/Job Title</label>
                            <input type="text" class="form-control @error('position_job_title') is-invalid @enderror" id="position_job_title" name="position_job_title" value="{{ old('position_job_title') }}">
                            @error('position_job_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <div class="form-section-header">
                        <h5 class="mb-0"><i class="bi bi-person me-2"></i>Candidate Information</h5>
                    </div>
                    <div class="form-section-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="candidate_full_name" class="form-label required-field">Candidate Full Name</label>
                                <input type="text" class="form-control @error('candidate_full_name') is-invalid @enderror" id="candidate_full_name" name="candidate_full_name" value="{{ old('candidate_full_name') }}" required>
                                @error('candidate_full_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="candidate_email" class="form-label required-field">Candidate Email</label>
                                <input type="email" class="form-control @error('candidate_email') is-invalid @enderror" id="candidate_email" name="candidate_email" value="{{ old('candidate_email') }}" required>
                                @error('candidate_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="candidate_phone" class="form-label required-field">Candidate Phone</label>
                            <input type="tel" class="form-control @error('candidate_phone') is-invalid @enderror" id="candidate_phone" name="candidate_phone" value="{{ old('candidate_phone') }}" required>
                            @error('candidate_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <div class="form-section-header">
                        <h5 class="mb-0"><i class="bi bi-list-check me-2"></i>Background Check Details</h5>
                    </div>
                    <div class="form-section-body">
                        <div class="mb-3">
                            <label class="form-label required-field">Type(s) of Background Check Requested</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="background_check_types[]" value="Criminal History" id="check_criminal" {{ in_array('Criminal History', old('background_check_types', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="check_criminal">Criminal History Check</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="background_check_types[]" value="Employment Verification" id="check_employment" {{ in_array('Employment Verification', old('background_check_types', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="check_employment">Employment Verification</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="background_check_types[]" value="Education Verification" id="check_education" {{ in_array('Education Verification', old('background_check_types', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="check_education">Education Verification</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="background_check_types[]" value="Credit History" id="check_credit" {{ in_array('Credit History', old('background_check_types', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="check_credit">Credit History Check</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="background_check_types[]" value="Reference Check" id="check_reference" {{ in_array('Reference Check', old('background_check_types', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="check_reference">Reference Check</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="background_check_types[]" value="Identity Verification" id="check_identity" {{ in_array('Identity Verification', old('background_check_types', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="check_identity">Identity Verification</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="turnaround_time" class="form-label required-field">Preferred Turnaround Time</label>
                                <select class="form-select @error('turnaround_time') is-invalid @enderror" id="turnaround_time" name="turnaround_time" required>
                                    <option value="">Select turnaround time</option>
                                    <option value="standard" {{ old('turnaround_time') == 'standard' ? 'selected' : '' }}>Standard (3-5 business days)</option>
                                    <option value="rush" {{ old('turnaround_time') == 'rush' ? 'selected' : '' }}>Rush (1-2 business days)</option>
                                </select>
                                @error('turnaround_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="number_of_candidates" class="form-label required-field">Number of Candidates</label>
                                <input type="number" class="form-control @error('number_of_candidates') is-invalid @enderror" id="number_of_candidates" name="number_of_candidates" value="{{ old('number_of_candidates', 1) }}" min="1" required>
                                @error('number_of_candidates')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <div class="form-section-header">
                        <h5 class="mb-0"><i class="bi bi-info-circle me-2"></i>Additional Information</h5>
                    </div>
                    <div class="form-section-body">
                        <div class="mb-3">
                            <label for="file_upload" class="form-label">File Upload (Consent Form, Resume, etc.)</label>
                            <input type="file" class="form-control @error('file_upload') is-invalid @enderror" id="file_upload" name="file_upload" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                            <small class="form-text text-muted">Accepted formats: PDF, DOC, DOCX, JPG, JPEG, PNG (Max: 10MB)</small>
                            @error('file_upload')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="form-label">Notes</label>
                            <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="4">{{ old('notes') }}</textarea>
                            @error('notes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="bi bi-send-fill me-2"></i>Submit Request
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
(function() {
    'use strict';
    var forms = document.querySelectorAll('.needs-validation');
    Array.prototype.slice.call(forms).forEach(function(form) {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
})();
</script>
@endpush
@endsection

