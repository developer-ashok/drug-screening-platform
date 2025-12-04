@extends('layouts.admin')

@section('title', 'Drug Screenings')
@section('page-title', 'Drug Screening Requests')
@section('breadcrumb', 'Drug Screenings')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Drug Screening Requests</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.export.drug-screenings') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-file-csv"></i> Export CSV
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Company</th>
                            <th>Contact Person</th>
                            <th>Candidate</th>
                            <th>Test Type</th>
                            <th>Collection Date</th>
                            <th>Submitted</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($requests as $request)
                            <tr>
                                <td>{{ $request->id }}</td>
                                <td>{{ $request->company_name }}</td>
                                <td>{{ $request->contact_person_name }}</td>
                                <td>{{ $request->candidate_full_name }}</td>
                                <td><span class="badge badge-info">{{ $request->drug_test_type }}</span></td>
                                <td>
                                    @if($request->preferred_collection_date_time)
                                        {{ $request->preferred_collection_date_time->format('M d, Y H:i') }}
                                    @else
                                        <span class="text-muted">Not specified</span>
                                    @endif
                                </td>
                                <td>{{ $request->created_at->format('M d, Y H:i') }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal{{ $request->id }}">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="modal{{ $request->id }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Drug Screening Request #{{ $request->id }}</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5><i class="fas fa-building text-primary"></i> Company Information</h5>
                                                    <table class="table table-sm">
                                                        <tr>
                                                            <th width="40%">Company Name:</th>
                                                            <td>{{ $request->company_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Contact Person:</th>
                                                            <td>{{ $request->contact_person_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Contact Email:</th>
                                                            <td><a href="mailto:{{ $request->contact_email }}">{{ $request->contact_email }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Contact Phone:</th>
                                                            <td>{{ $request->contact_phone }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5><i class="fas fa-user text-primary"></i> Candidate Information</h5>
                                                    <table class="table table-sm">
                                                        <tr>
                                                            <th width="40%">Candidate Name:</th>
                                                            <td>{{ $request->candidate_full_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Candidate Email:</th>
                                                            <td><a href="mailto:{{ $request->candidate_email }}">{{ $request->candidate_email }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Candidate Phone:</th>
                                                            <td>{{ $request->candidate_phone }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <hr>
                                            <h5><i class="fas fa-vial text-primary"></i> Screening Details</h5>
                                            <table class="table table-sm">
                                                <tr>
                                                    <th width="30%">Drug Test Type:</th>
                                                    <td><span class="badge badge-info">{{ $request->drug_test_type }}</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Preferred Collection Date/Time:</th>
                                                    <td>
                                                        @if($request->preferred_collection_date_time)
                                                            {{ $request->preferred_collection_date_time->format('F d, Y H:i') }}
                                                        @else
                                                            Not specified
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Testing Location:</th>
                                                    <td>
                                                        @if($request->preferred_testing_location_city || $request->preferred_testing_location_zip)
                                                            {{ $request->preferred_testing_location_city }}{{ $request->preferred_testing_location_city && $request->preferred_testing_location_zip ? ', ' : '' }}{{ $request->preferred_testing_location_zip }}
                                                        @else
                                                            Not specified
                                                        @endif
                                                    </td>
                                                </tr>
                                                @if($request->special_instructions)
                                                <tr>
                                                    <th>Special Instructions:</th>
                                                    <td>{{ $request->special_instructions }}</td>
                                                </tr>
                                                @endif
                                                @if($request->notes)
                                                <tr>
                                                    <th>Notes:</th>
                                                    <td>{{ $request->notes }}</td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <th>Submitted:</th>
                                                    <td>{{ $request->created_at->format('F d, Y H:i:s') }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5">
                                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">No drug screening requests found.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($requests->hasPages())
            <div class="card-footer clearfix">
                {{ $requests->links('pagination::bootstrap-4') }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
