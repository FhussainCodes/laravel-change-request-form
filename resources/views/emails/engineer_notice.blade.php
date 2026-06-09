<h2>Hello {{ $changeRequest->assigned_to }},</h2>
<p>You have been officially assigned as the owner of the following change request:</p>
<ul>
    <li><strong>Request ID:</strong> #{{ $changeRequest->request_no }}</li>
    <li><strong>Target Module:</strong> {{ $changeRequest->project_module }}</li>
    <li><strong>Assignment Date:</strong> {{ $changeRequest->assigned_date }}</li>
    <li><strong>Authorized By:</strong> {{ $changeRequest->assigned_by }}</li>
</ul>
<p>Please review the system logs and start processing the deployment.</p>