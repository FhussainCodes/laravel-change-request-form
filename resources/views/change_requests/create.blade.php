@extends('layouts.app')
@section('content')

<div>
    <h2>Change Request Form</h2>
 
    <form action="{{ route('change-requests.store') }}" method="POST" >
        @csrf

        <label for="">Request No</label>
        <input type="text" name="request_no" value="{{$newID}}" readonly required>
 <hr>
         <label for="">Project_module</label>
        <input type="text" name="project_module"  required>
 <hr>
         <label for="">Department</label>
        <input type="text" name="department"  required>
 <hr>
         <label for="">Requested_by</label>
        <input type="text" name="requested_by"  required>
<hr>
         <label for="">Priority</label>
        <select name="priority" >
            <option value="">Select Priority</option>
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select>
<hr>
         <label for="">Request_type</label>
        <input type="text" name="request_type"  required>
<hr>
         <label for="">Change Type</label>
        <input type="text" name="change_type"  required>
 <hr>        
        <label>Problem Statement</label>
                <textarea name="problem_statement" class="form-control" rows="3" required></textarea>
<hr>
         <label>Decision</label>
                <input type="text" name="decision" class="form-control">
<hr>
        <label>Comments</label>
                <textarea name="comments" class="form-control" rows="2"></textarea>
<hr>
                
                <h4>optional FIelds</h4>

                <label>Assigned To</label>
                <input type="text" name="assigned_to" class="form-control">
<hr>
                 <label>Assigned Date</label>
                <input type="date" name="assigned_date" class="form-control">
<hr>
                 <label>Assigned By</label>
                <input type="text" name="assigned_by" class="form-control">
<hr>
                 <label>UAT By</label>
                <input type="text" name="uat_by" class="form-control">
<hr>
                <label>Deployed By</label>
                <input type="text" name="deployed_by" class="form-control">
<hr>
                   <label>Version</label>
                <input type="text" name="version" class="form-control" placeholder="e.g. 1.0">
<hr>
                <button type="submit" >
                    Submit Change Request
                </button>

    </form>
</div>
