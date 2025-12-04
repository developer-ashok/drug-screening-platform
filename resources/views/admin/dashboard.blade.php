@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')
<!-- Info boxes -->
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shield-alt"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Background Checks</span>
                <span class="info-box-number">{{ $backgroundChecks->total() }}</span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-vial"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Drug Screenings</span>
                <span class="info-box-number">{{ $drugScreenings->total() }}</span>
            </div>
        </div>
    </div>
    <div class="clearfix hidden-md-up"></div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Requests</span>
                <span class="info-box-number">{{ $backgroundChecks->total() + $drugScreenings->total() }}</span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Active Users</span>
                <span class="info-box-number">1</span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent Background Checks -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Recent Background Checks</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.background-checks') }}" class="btn btn-tool btn-sm">
                        <i class="fas fa-list"></i> View All
                    </a>
                    <a href="{{ route('admin.export.background-checks') }}" class="btn btn-tool btn-sm">
                        <i class="fas fa-download"></i> Export
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Company</th>
                                <th>Candidate</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($backgroundChecks->take(5) as $request)
                                <tr>
                                    <td><a href="#">{{ $request->id }}</a></td>
                                    <td>{{ \Illuminate\Support\Str::limit($request->company_name, 20) }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($request->candidate_full_name, 20) }}</td>
                                    <td>{{ $request->created_at->format('M d, Y') }}</td>
                                    <td><span class="badge badge-success">New</span></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No background check requests yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer clearfix">
                <a href="{{ route('admin.background-checks') }}" class="btn btn-sm btn-info float-right">View All Background Checks</a>
            </div>
        </div>
    </div>

    <!-- Recent Drug Screenings -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Recent Drug Screenings</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.drug-screenings') }}" class="btn btn-tool btn-sm">
                        <i class="fas fa-list"></i> View All
                    </a>
                    <a href="{{ route('admin.export.drug-screenings') }}" class="btn btn-tool btn-sm">
                        <i class="fas fa-download"></i> Export
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Company</th>
                                <th>Candidate</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($drugScreenings->take(5) as $request)
                                <tr>
                                    <td><a href="#">{{ $request->id }}</a></td>
                                    <td>{{ \Illuminate\Support\Str::limit($request->company_name, 20) }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($request->candidate_full_name, 20) }}</td>
                                    <td>{{ $request->created_at->format('M d, Y') }}</td>
                                    <td><span class="badge badge-success">New</span></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No drug screening requests yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer clearfix">
                <a href="{{ route('admin.drug-screenings') }}" class="btn btn-sm btn-info float-right">View All Drug Screenings</a>
            </div>
        </div>
    </div>
</div>
@endsection
