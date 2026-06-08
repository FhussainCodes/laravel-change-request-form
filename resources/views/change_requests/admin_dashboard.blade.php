@extends('layouts.app')
@section('content')
<div class="py-12 px-4 max-w-6xl mx-auto">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 border border-gray-100 dark:border-gray-700">
        <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Admin Control panel - Incoming Change Requests</h2>
        
        <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 dark:bg-gray-900 text-gray-700 dark:text-gray-300 text-sm uppercase">
                    <tr>
                        <th class="p-4">Req No</th>
                        <th class="p-4">Requested By</th>
                        <th class="p-4">Module</th>
                        <th class="p-4">Priority</th>
                        <th class="p-4">Assigned Status</th>
                        <th class="p-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-200 dark:divide-gray-700 text-gray-600 dark:text-gray-400">
                    @foreach($changeRequests as $row)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-750 transition-colors">
                        <td class="p-4 font-mono font-bold text-indigo-600">#{{ $row->request_no }}</td>
                        <td class="p-4">{{ $row->requested_by }}</td>
                        <td class="p-4">{{ $row->project_module }}</td>
                        <td class="p-4"><span class="px-2 py-1 rounded bg-amber-100 text-amber-800 font-bold uppercase text-xs">{{ $row->priority }}</span></td>
                        <td class="p-4">
                            @if($row->assigned_to)
                                <span class="text-green-600 font-medium">✓ Assigned to {{ $row->assigned_to }}</span>
                            @else
                                <span class="text-red-500 font-medium">⏳ Action Required</span>
                            @endif
                        </td>
                        <td class="p-4">
                            <a href="{{ route('change-requests.edit', $row->id) }}" class="px-4 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-all font-semibold shadow-sm text-xs">
                                Manage / Process
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection