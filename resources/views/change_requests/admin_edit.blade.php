@extends('layouts.app')
@section('content')
<div class="py-12 px-4 max-w-3xl mx-auto">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-100 dark:border-gray-700">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Process Request #{{ $changeRequest->request_no }}</h2>
        
        <div class="bg-gray-50 dark:bg-gray-900 p-4 rounded-xl mb-6 space-y-2 text-sm text-gray-600 dark:text-gray-400">
            <p><strong>Department:</strong> {{ $changeRequest->department }}</p>
            <p><strong>Requested By:</strong> {{ $changeRequest->requested_by }}</p>
            <p><strong>Problem Statement:</strong> {{ $changeRequest->problem_statement }}</p>
        </div>

        <form action="{{ route('change-requests.update', $changeRequest->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Assigned To</label>
                <input type="text" name="assigned_to" value="{{ $changeRequest->assigned_to }}" required class="w-full px-4 py-2.5 bg-white dark:bg-gray-900 border border-gray-300 text-gray-900 rounded-xl">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Assigned Date</label>
                <input type="date" name="assigned_date" value="{{ $changeRequest->assigned_date }}" required class="w-full px-4 py-2.5 bg-white dark:bg-gray-900 border border-gray-300 text-gray-900 rounded-xl">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">UAT By</label>
                    <input type="text" name="uat_by" value="{{ $changeRequest->uat_by }}" class="w-full px-4 py-2.5 bg-white dark:bg-gray-900 border border-gray-300 text-gray-900 rounded-xl">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Deployed By</label>
                    <input type="text" name="deployed_by" value="{{ $changeRequest->deployed_by }}" class="w-full px-4 py-2.5 bg-white dark:bg-gray-900 border border-gray-300 text-gray-900 rounded-xl">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Version</label>
                    <input type="text" name="version" value="{{ $changeRequest->version }}" placeholder="e.g. v1.0" class="w-full px-4 py-2.5 bg-white dark:bg-gray-900 border border-gray-300 text-gray-900 rounded-xl">
                </div>
            </div>

            <button type="submit" class="px-8 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-xl">
                Save and Finalize Workflow
            </button>
        </form>
    </div>
</div>
@endsection