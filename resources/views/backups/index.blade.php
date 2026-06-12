@extends('layouts.app') @section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <!-- <h2>System Backup Logs</h2> -->
        <a href="{{ route('backups.create') }}" class="btn btn-primary">Log New Backup</a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Backup Type</th>
                        <th>Date & Time</th>
                        <th>Created By</th>
                        <th>Confirmation Image</th>
                    </tr>
                </thead>
                <tbody>
    @forelse($backups as $backup)
        <tr>
            <td style="padding: 12px;">{{ $loop->iteration }}</td>
            <td style="padding: 12px;"><span class="badge bg-info text-dark">{{ $backup->backup_type }}</span></td>
            <td style="padding: 12px;">{{ \Carbon\Carbon::parse($backup->backup_datetime)->format('M d, Y h:i A') }}</td>
            <td style="padding: 12px;">{{ $backup->created_by }}</td>
            <td style="padding: 12px;">
    @if($backup->image)
        <a href="{{ asset('uploads/backups/' . $backup->image) }}" target="_blank">
            <img src="{{ asset('uploads/backups/' . $backup->image) }}" alt="Backup Image" style="width: 60px; height: 60px; object-fit: cover; border: 1px solid #ddd; border-radius: 4px;">
        </a>
    @else
        <span class="text-muted">No Image</span>
    @endif
</td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center text-muted" style="padding: 20px;">No backup logs found.</td>
        </tr>
    @endempty
</tbody>
            </table>
        </div>
    </div>
</div>
@endsection