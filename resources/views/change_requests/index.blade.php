@extends('layouts.app')

@section('content')

<div class="container">

    <h2>All Change Requests</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table border="1" cellpadding="10" width="100%">

        <thead>
            <tr>
                <th>ID</th>
                <th>Request No</th>
                <th>Project Module</th>
                <th>Department</th>
                <th>Requested By</th>
                <th>Priority</th>
                <th>Problem Statement</th>
                <th>Decision</th>
                <th>Comments</th>
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
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->request_no }}</td>
                    <td>{{ $request->project_module }}</td>
                    <td>{{ $request->department }}</td>
                    <td>{{ $request->requested_by }}</td>
                    <td>{{ $request->priority }}</td>
                    <td>{{ $request->problem_statement }}</td>
                    <td>{{ $request->decision }}</td>
                    <td>{{ $request->comments }}</td>
                    <td>{{ $request->request_type }}</td>
                    <td>{{ $request->change_type }}</td>
                    <td>{{ $request->assigned_to }}</td>
                    <td>{{ $request->assigned_date }}</td>
                    <td>{{ $request->assigned_by }}</td>
                    <td>{{ $request->uat_by }}</td>
                    <td>{{ $request->deployed_by }}</td>
                    <td>{{ $request->version }}</td>
                    <td>{{ $request->created_at }}</td>
                </tr>

            @empty

                <tr>
                    <td colspan="18">No Change Requests Found</td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection