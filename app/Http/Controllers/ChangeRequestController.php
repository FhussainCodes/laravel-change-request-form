<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChangeRequest;
use App\Models\User;

class ChangeRequestController extends Controller
{
    public function index()
{
    if (auth()->user()->role === 'admin') {
        $changeRequests = ChangeRequest::orderBy('created_at', 'desc')->get();
        return view('change_requests.admin_dashboard', compact('changeRequests'));
    }
    return redirect()->route('change-requests.create');
}

  public function create()
{
    if (auth()->user()->role === 'admin') {
        return redirect()->route('change-requests.index');
    }

    $lastrecord = ChangeRequest::orderBy('request_no', 'desc')->first();
    $newID = $lastrecord ? $lastrecord->request_no + 1 : 1;
    $module = request('module', ''); 

    return view('change_requests.create', compact('newID', 'module'));
}

public function getUsersByModule(Request $request)
{
    $users = User::where('module', $request->module)->get(['id', 'name']);
    return response()->json($users);
}

    public function store(Request $request)
    {
        $request->validate([
            'department'=>'required',
            'requested_by'=>'required',
            'priority'=>'required',
            'project_module'=>'required',
            'problem_statement' => 'required',
            'request_type' => 'required',
            'change_type' => 'required',
        ]);

        $newRequest = ChangeRequest::create([   
            'project_module' => $request->project_module,
            'department' => $request->department,
            'requested_by' => $request->requested_by,
            'priority' => $request->priority,
            'problem_statement' => $request->problem_statement,
            'decision' => $request->decision,
            'comments' => $request->comments,
            'request_type' => $request->request_type,
            'change_type' => $request->change_type,
            'assigned_to' => $request->assigned_to,
            'assigned_date' => $request->assigned_date,
            'assigned_by' => $request->assigned_by,
            'uat_by' => $request->uat_by,
            'deployed_by' => $request->deployed_by,
            'version' => $request->version,
        ]);

        return redirect()->route('change-requests.create')
                     ->with('success', 'Change Request submitted successfully!');   
    }

    public function show()
    {

    }

    public function edit($id)
{
    if (auth()->user()->role !== 'admin') {
        abort(403, 'Unauthorized action.');
    }

    $changeRequest = ChangeRequest::where('request_no', $id)->firstOrFail();

    $moduleUsers = \App\Models\User::where('module', $changeRequest->project_module)->get();

    return view('change_requests.admin_edit', compact('changeRequest', 'moduleUsers'));
}

    public function update(Request $request, $id)
{
    if (auth()->user()->role !== 'admin') {
        abort(403, 'Unauthorized action.');
    }

    $changeRequest = ChangeRequest::where('request_no', $id)->firstOrFail();
    
    $changeRequest->update([
        'assigned_to'   => $request->assigned_to,
        'assigned_date' => $request->assigned_date,
        'assigned_by'   => auth()->user()->name, 
        'uat_by'        => $request->uat_by,
        'deployed_by'   => $request->deployed_by,
        'version'       => $request->version,
    ]);

    return redirect()->route('change-requests.index')->with('success', 'Optional fields updated successfully!');
}

    public function destroy()
    {

    }
}