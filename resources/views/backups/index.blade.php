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
                            <td>{{ $loop->iteration }}</td>
                            <td><span class="badge bg-info text-dark">{{ $backup->backup_type }}</span></td>
                            <td>{{ \Carbon\Carbon::parse($backup->backup_datetime)->format('M d, Y h:i A') }}</td>
                            <td>{{ $backup->created_by }}</td>
                            <td>
                                @if($backup->image)
                                    <a href="{{ asset('storage/backups/' . $backup->image) }}" target="_blank">
                                        <img src="{{ asset('storage/backups/' . $backup->image) }}" alt="Backup Image" style="max-width: 80px; height: auto; border-radius: 4px;">
                                    </a>
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No backup logs found.</td>
                        </tr>
                    @endempty
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection