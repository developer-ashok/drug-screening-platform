@extends('layouts.main')

@section('title', 'Drug Screening Request - DS CodeRubix')

@section('content')
<div class="container section-padding fade-in-up">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bold mb-3">Drug Screening Request Form</h1>
                <p class="lead text-muted">Please fill out the form below to submit a drug screening request. All fields marked with * are required.</p>
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

            <form method="POST" action="{{ route('drug-screening.submit') }}" class="needs-validation" novalidate>
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
                        <h5 class="mb-0"><i class="bi bi-clipboard-check me-2"></i>Drug Screening Details</h5>
                    </div>
                    <div class="form-section-body">
                        <div class="mb-3">
                            <label for="drug_test_type" class="form-label required-field">Type of Drug Test Requested</label>
                            <select class="form-select @error('drug_test_type') is-invalid @enderror" id="drug_test_type" name="drug_test_type" required>
                                <option value="">Select drug test type</option>
                                <option value="5-Panel Drug Test" {{ old('drug_test_type') == '5-Panel Drug Test' ? 'selected' : '' }}>5-Panel Drug Test</option>
                                <option value="10-Panel Drug Test" {{ old('drug_test_type') == '10-Panel Drug Test' ? 'selected' : '' }}>10-Panel Drug Test</option>
                                <option value="Pre-Employment Screening" {{ old('drug_test_type') == 'Pre-Employment Screening' ? 'selected' : '' }}>Pre-Employment Screening</option>
                                <option value="Random Testing" {{ old('drug_test_type') == 'Random Testing' ? 'selected' : '' }}>Random Testing</option>
                                <option value="Post-Accident Testing" {{ old('drug_test_type') == 'Post-Accident Testing' ? 'selected' : '' }}>Post-Accident Testing</option>
                                <option value="Reasonable Suspicion Testing" {{ old('drug_test_type') == 'Reasonable Suspicion Testing' ? 'selected' : '' }}>Reasonable Suspicion Testing</option>
                            </select>
                            @error('drug_test_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="preferred_collection_date_time" class="form-label">Preferred Collection Date/Time</label>
                            <input type="datetime-local" class="form-control @error('preferred_collection_date_time') is-invalid @enderror" id="preferred_collection_date_time" name="preferred_collection_date_time" value="{{ old('preferred_collection_date_time') }}">
                            @error('preferred_collection_date_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="preferred_testing_location_city" class="form-label">Preferred Testing Location - City</label>
                                <input type="text" class="form-control @error('preferred_testing_location_city') is-invalid @enderror" id="preferred_testing_location_city" name="preferred_testing_location_city" value="{{ old('preferred_testing_location_city') }}">
                                @error('preferred_testing_location_city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="preferred_testing_location_zip" class="form-label">Preferred Testing Location - ZIP Code</label>
                                <input type="text" class="form-control @error('preferred_testing_location_zip') is-invalid @enderror" id="preferred_testing_location_zip" name="preferred_testing_location_zip" value="{{ old('preferred_testing_location_zip') }}">
                                @error('preferred_testing_location_zip')
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
                            <label for="special_instructions" class="form-label">Special Instructions</label>
                            <textarea class="form-control @error('special_instructions') is-invalid @enderror" id="special_instructions" name="special_instructions" rows="3">{{ old('special_instructions') }}</textarea>
                            @error('special_instructions')
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

