<h2>Attention Admin,</h2>
<p>A new change request requires your attention and assignment mapping.</p>
<ul>
    <li><strong>Submitted By:</strong> {{ $changeRequest->requested_by }}</li>
    <li><strong>Department:</strong> {{ $changeRequest->department }}</li>
    <li><strong>Problem:</strong> {{ $changeRequest->problem_statement }}</li>
</ul>
<a href="{{ route('change-requests.edit', $changeRequest->request_no) }}">Click here to manage this request</a>