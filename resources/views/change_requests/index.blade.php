@extends('layouts.app')

@section('content')
<div class="container-fluid my-4">

    <h2>{{ auth()->user()->role === 'admin' ? 'All Change Requests' : 'My Submitted Change Requests' }}</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped border-secondary align-middle">
            
            <thead class="table-dark border-dark">
                <tr>
                    <th>ID</th>
                    <th>Request No</th>
                    <th>Project Module</th>
                    <th>Department</th>
                    <th>Requested By</th>
                    <th>Priority</th>
                    <th>Problem Statement</th>
                    <th>Request Type</th>
                    <th>Change Type</th>
                    <th>Assigned To</th>
                    <th>Assigned Date</th>
                    <th>Assigned By</th>
                    <th>UAT By</th>
                    <th>Deployed By</th>
                    <th>Version</th>
                    <th>Created At</th>
                </tr>
            </thead>

            <tbody>
                @forelse($changeRequests as $request)
                    <tr>
                        <td class="fw-bold table-light">{{ $request->id }}</td>
                        <td>{{ $request->request_no }}</td>
                        <td>{{ $request->project_module }}</td>
                        <td>{{ $request->department }}</td>
                        <td>{{ $request->requested_by }}</td>
                        
                        @if(strtolower($request->priority) == 'high')
                            <td class="table-danger text-danger fw-bold text-center">{{ $request->priority }}</td>
                        @elseif(strtolower($request->priority) == 'medium')
                            <td class="table-warning text-warning-emphasis fw-bold text-center">{{ $request->priority }}</td>
                        @else
                            <td class="table-success text-success fw-bold text-center">{{ $request->priority }}</td>
                        @endif

                        <td>{{ $request->problem_statement }}</td>
                        <td>{{ $request->request_type }}</td>
                        <td>{{ $request->change_type }}</td>
                        
                        <td>{{ $request->assigned_to ?: '—' }}</td>
                        <td>{{ $request->assigned_to ? $request->assigned_date : '—' }}</td>
                        <td>{{ $request->assigned_to ? $request->assigned_by : '—' }}</td>
                        
                        <td>{{ $request->uat_by }}</td>
                        <td>{{ $request->deployed_by }}</td>
                        <td>{{ $request->version }}</td>
                        <td>{{ $request->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="16" class="text-center py-4 bg-light text-muted fw-bold">
                            No Change Requests Found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection