@extends('layouts.app') 
@section('content') 

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header bg-primary text-black">
                    <a href="{{ route('backups.index') }}" class="btn btn-primary">Log system backup</a>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('backups.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="backup_type" class="form-label font-weight-bold">Backup Type</label>
                            <select name="backup_type" id="backup_type" class="form-control @error('backup_type') is-invalid @enderror" required>
                                <option value="">-- Select Backup Type --</option>
                                <option value="GIS">GIS</option>
                                <option value="DEV">DEV</option>
                                <option value="PROD">PROD</option>
                                <option value="QA">QA</option>
                            </select>
                            @error('backup_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="backup_datetime" class="form-label font-weight-bold">Backup Date & Time</label>
                            <input type="datetime-local" name="backup_datetime" id="backup_datetime" class="form-control @error('backup_datetime') is-invalid @enderror" required>
                            @error('backup_datetime')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="image" class="form-label font-weight-bold">Upload Confirmation Image</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" required>
                            <small class="text-muted">Accepted formats: JPEG, PNG, JPG (Max 2MB)</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label font-weight-bold text-muted">Created By (Current User)</label>
                            <input type="text" class="form-control bg-light text-muted" value="{{ auth()->user()->name }}" readonly>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success px-4">Save Backup Log</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
    @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
</div>
@endsection