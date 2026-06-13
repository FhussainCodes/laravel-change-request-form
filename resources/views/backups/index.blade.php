@extends('layouts.app')

@section('content')
<div class="container mt-5 mx-auto max-w-7xl px-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex wrap gap-4">
        <h2 class="text-2xl font-bold">System Backup Logs</h2>
        <a href="{{ route('backups.create') }}" class="btn btn-primary bg-blue-600 text-white px-4 py-2 rounded">Log New Backup</a>
    </div>

   <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 mb-6 border border-gray-200 dark:border-gray-700">
    <form action="{{ route('backups.index') }}" method="GET" class="flex flex-col md:flex-row md:items-end gap-4">
        
        <div class="flex-1">
            <label for="from_date" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">From Date</label>
            <input type="date" name="from_date" id="from_date" value="{{ request('from_date') }}" required
                   class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm h-10">
        </div>
        
        <div class="flex-1">
            <label for="to_date" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">To Date</label>
            <input type="date" name="to_date" id="to_date" value="{{ request('to_date') }}" required
                   class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm h-10">
        </div>

        <div class="flex items-center gap-2 mt-4 md:mt-0">
            <button type="submit" class="bg-gray-700 hover:bg-gray-800 dark:bg-indigo-600 dark:hover:bg-indigo-700 text-black font-medium text-sm h-10 px-5 rounded-md shadow transition duration-150 ease-in-out">
                Filter Logs
            </button>
            
            <a href="{{ route('backups.index') }}" class="bg-amber-500 hover:bg-amber-600 text-black font-medium text-sm h-10 px-5 rounded-md shadow transition duration-150 ease-in-out flex items-center justify-center">
                Reset
            </a>
            
            <a href="{{ route('backups.export_pdf', ['from_date' => request('from_date'), 'to_date' => request('to_date')]) }}" 
               class="bg-red-600 hover:bg-red-700 text-white font-medium text-sm h-10 px-5 rounded-md shadow transition duration-150 ease-in-out flex items-center justify-center whitespace-nowrap">
                Download PDF Report
            </a>
        </div>

    </form>
</div>