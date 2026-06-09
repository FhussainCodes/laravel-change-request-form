<h2>Hello {{ $changeRequest->requested_by }},</h2>
<p>Your change request has been successfully received by the IT department.</p>
<ul>
    <li><strong>Request Number:</strong> #{{ $changeRequest->request_no }}</li>
    <li><strong>Module:</strong> {{ $changeRequest->project_module }}</li>
    <li><strong>Priority:</strong> {{ $changeRequest->priority }}</li>
</ul>
<p>An administrator will review your ticket and assign an engineer shortly.</p>