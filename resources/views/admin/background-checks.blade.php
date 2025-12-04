@extends('layouts.admin')

@section('title', 'Background Checks')
@section('page-title', 'Background Check Requests')
@section('breadcrumb', 'Background Checks')

@section('content')
@php
    $rushCount = $requests->getCollection()->where('turnaround_time', 'rush')->count();
    $standardCount = $requests->getCollection()->where('turnaround_time', 'standard')->count();
@endphp

<div class="row">
    <div class="col-12">
        <!-- Top summary bar -->
        <div class="row mb-3">
            <div class="col-md-4 col-sm-6 mb-2">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $requests->total() }}</h3>
                        <p>Total Background Check Requests</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-2">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $standardCount }}</h3>
                        <p>Standard Turnaround (this page)</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-2">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $rushCount }}</h3>
                        <p>Rush Turnaround (this page)</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header border-0">
                <h3 class="card-title">
                    <i class="fas fa-table mr-2"></i>
                    All Background Check Requests
                </h3>
                <div class="card-tools d-flex align-items-center">
                    <form method="GET" class="mr-2 d-none d-md-block">
                        <div class="input-group input-group-sm" style="width: 220px;">
                            <input type="text" name="search" class="form-control float-right" placeholder="Search company or candidate" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <a href="{{ route('admin.export.background-checks') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-file-csv mr-1"></i> Export CSV
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped text-nowrap align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Company</th>
                            <th>Contact Person</th>
                            <th>Candidate</th>
                            <th>Check Types</th>
                            <th>Turnaround</th>
                            <th>Submitted</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($requests as $request)
                            <tr class="{{ $request->turnaround_time === 'rush' ? 'table-warning' : '' }}">
                                <td>{{ $request->id }}</td>
                                <td>
                                    <strong>{{ $request->company_name }}</strong><br>
                                    <span class="text-muted text-xs">{{ $request->position_job_title ?? 'N/A' }}</span>
                                </td>
                                <td>
                                    {{ $request->contact_person_name }}<br>
                                    <span class="text-muted text-xs">{{ $request->contact_email }}</span>
                                </td>
                                <td>
                                    {{ $request->candidate_full_name }}<br>
                                    <span class="text-muted text-xs">{{ $request->candidate_email }}</span>
                                </td>
                                <td>
                                    @if(is_array($request->background_check_types) && count($request->background_check_types) > 0)
                                        @foreach($request->background_check_types as $type)
                                            <span class="badge badge-info mb-1">{{ $type }}</span>
                                        @endforeach
                                    @else
                                        <span class="badge badge-secondary">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-{{ $request->turnaround_time == 'rush' ? 'warning' : 'primary' }}">
                                        {{ ucfirst($request->turnaround_time) }}
                                    </span>
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
                                            <h4 class="modal-title">Background Check Request #{{ $request->id }}</h4>
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
                                                        <tr>
                                                            <th>Position/Job Title:</th>
                                                            <td>{{ $request->position_job_title ?? 'N/A' }}</td>
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
                                            <h5><i class="fas fa-list-check text-primary"></i> Request Details</h5>
                                            <table class="table table-sm">
                                                <tr>
                                                    <th width="30%">Check Types:</th>
                                                    <td>
                                                        @if(is_array($request->background_check_types) && count($request->background_check_types) > 0)
                                                            @foreach($request->background_check_types as $type)
                                                                <span class="badge badge-info">{{ $type }}</span>
                                                            @endforeach
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Turnaround Time:</th>
                                                    <td><span class="badge badge-{{ $request->turnaround_time == 'rush' ? 'warning' : 'primary' }}">{{ ucfirst($request->turnaround_time) }}</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Number of Candidates:</th>
                                                    <td>{{ $request->number_of_candidates }}</td>
                                                </tr>
                                                @if($request->file_upload_path)
                                                <tr>
                                                    <th>File Upload:</th>
                                                    <td><a href="{{ asset('storage/' . $request->file_upload_path) }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-file"></i> View File</a></td>
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
                                    <p class="text-muted">No background check requests found.</p>
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
