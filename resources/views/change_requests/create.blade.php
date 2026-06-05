@extends('layouts.app')
@section('content')

<div>
    <h2>Change Request Form</h2>

       <form action="{{ route('change-requests.store') }}" method="POST">
        @csrf

        <label>Request No</label>
        <input type="text" name="request_no" value="{{ $newID }}" readonly required>
        <hr>

        <label>Project Module</label>
        <select name="project_module" id="module" onchange="getUsersByModule(this.value)">
        <option value="">Select Module</option>
            <option value="DEV" {{ $module == 'DEV' ? 'selected' : '' }} >DEV</option>
            <option value="Network/Infrastructure" {{ $module == 'Network/Infrastructure' ? 'selected' : '' }} >Network / Infrastructure</option>
            <option value="GIS/Support" {{ $module == 'GIS/Support' ? 'selected' : '' }} >GIS / Support</option>
        </select>
        <hr>

        <label>Department</label>
        <input type="text" name="department" required>
        <hr>

        <label>Requested By</label>
        <input type="text" name="requested_by" required>
        <hr>

        <label>Priority</label>
        <select name="priority" required>
            <option value="">Select Priority</option>
            <option value="low">Low</option>
            <option value="medium" selected>Medium</option>
            <option value="high">High</option>
        </select>
        <hr>

        <label>Request Type</label>
        <input type="text" name="request_type" required>
        <hr>

        <label>Change Type</label>
        <input type="text" name="change_type" required>
        <hr>

        <label>Problem Statement</label>
        <textarea name="problem_statement" rows="3" required></textarea>
        <hr>

        <label>Decision</label>
        <input type="text" name="decision">
        <hr>

        <label>Comments</label>
        <textarea name="comments" rows="2"></textarea>
        <hr>

        <h4>Optional Fields</h4>

        <label>Assigned To</label>
        
        <select name="assigned_to" id="assigned_to">
            <option value="">Select Assigned Person</option>
        </select>
        <hr>

        <label>Assigned Date</label>
        <input type="date" name="assigned_date">
        <hr>

        <label>Assigned By</label>
        <input type="text" name="assigned_by">
        <hr>

        <label>UAT By</label>
        <input type="text" name="uat_by">
        <hr>

        <label>Deployed By</label>
        <input type="text" name="deployed_by">
        <hr>

        <label>Version</label>
        <input type="text" name="version" placeholder="e.g. 1.0">
        <hr>

        <button type="submit">
            Submit Change Request
        </button>
    </form>
</div>

<script>
function getUsersByModule(moduleName) {
    const assignedByDropdown = document.getElementById('assigned_to');
    
    assignedByDropdown.innerHTML = '<option value="">Select Assigned Person</option>';
    if (!moduleName) return; 

    fetch(`/get-users-by-module?module=${encodeURIComponent(moduleName)}`)
        .then(response => response.json())
        .then(users => {
            users.forEach(user => {
                const option = document.createElement('option');
                option.value = user.name; 
                option.textContent = user.name;
                assignedByDropdown.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error fetching users:', error);
        });
}
</script>
@if (session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif
@endsection