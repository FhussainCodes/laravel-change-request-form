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
<tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors border-b border-gray-100 dark:border-gray-700">
    
    <td class="p-4 font-mono font-bold text-indigo-600 dark:text-indigo-400">
        #{{ $row->request_no }}
    </td>
    
    <td class="p-4 text-gray-700 dark:text-gray-300">
        {{ $row->requested_by }}
    </td>
    
    <td class="p-4 text-gray-600 dark:text-gray-400">
        {{ $row->project_module }}
    </td>
    
    <td class="p-4">
        @if(strtolower($row->priority) === 'high')
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400">High</span>
        @elseif(strtolower($row->priority) === 'medium')
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-400">Medium</span>
        @else
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">Low</span>
        @endif
    </td>
    
    <td class="p-4">
        @if(!empty($row->assigned_to))
            <span class="inline-flex items-center text-sm font-semibold text-emerald-600 dark:text-emerald-400">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                </svg>
                Assigned to {{ $row->assigned_to }}
            </span>
        @else
            <span class="inline-flex items-center text-sm font-semibold text-amber-600 dark:text-amber-400 animate-pulse">
                ⏳ Action Required
            </span>
        @endif
    </td>
    
    <td class="p-4 text-center whitespace-nowrap align-middle" style="min-width: 130px; width: 130px;">
    <a href="{{ route('change-requests.edit', $row->request_no) }}" 
       class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold uppercase tracking-wider rounded-xl shadow-md transition-all duration-150 transform hover:-translate-y-0.5"
       style="color: #ffffff !important; background-image: linear-gradient(to right, #4f46e5, #2563eb) !important; display: inline-flex !important; opacity: 1 !important; visibility: visible !important;">
        <svg class="w-3.5 h-3.5 mr-1.5 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="color: #ffffff !important;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
        </svg>
        Manage
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