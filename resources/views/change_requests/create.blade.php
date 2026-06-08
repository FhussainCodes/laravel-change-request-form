@extends('layouts.app')
@section('content')

<div class="max-w-6xl mx-auto py-10 px-4">

<div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 p-8">
        <h2 class="text-3xl font-bold text-white">
            Change Request Form
        </h2>

        <p class="text-indigo-100 mt-2">
            Submit and manage project change requests efficiently.
        </p>
    </div>

    <div class="p-8">

        <form action="{{ route('change-requests.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Request No
                    </label>

                    <input
                        type="text"
                        name="request_no"
                        value="{{ $newID }}"
                        readonly
                        class="w-full rounded-xl border-gray-300 bg-gray-100 shadow-sm"
                    >
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Project Module
                    </label>

                    <select
                        name="project_module"
                        id="module"
                        onchange="getUsersByModule(this.value)"
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 transition"
                    >
                        <option value="">Select Module</option>

                        <option value="DEV" {{ $module == 'DEV' ? 'selected' : '' }}>
                            DEV
                        </option>

                        <option value="Network/Infrastructure" {{ $module == 'Network/Infrastructure' ? 'selected' : '' }}>
                            Network / Infrastructure
                        </option>

                        <option value="GIS/Support" {{ $module == 'GIS/Support' ? 'selected' : '' }}>
                            GIS / Support
                        </option>
                    </select>
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Department
                    </label>

                    <input
                        type="text"
                        name="department"
                        required
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 transition"
                    >
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Requested By
                    </label>

                    <input
                        type="text"
                        name="requested_by"
                        required
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 transition"
                    >
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Priority
                    </label>

                    <select
                        name="priority"
                        required
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 transition"
                    >
                        <option value="">Select Priority</option>
                        <option value="low">Low</option>
                        <option value="medium" selected>Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Request Type
                    </label>

                    <input
                        type="text"
                        name="request_type"
                        required
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 transition"
                    >
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Change Type
                    </label>

                    <input
                        type="text"
                        name="change_type"
                        required
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 transition"
                    >
                </div>

                <div>
                    <label class="block font-semibold text-gray-700 mb-2">
                        Decision
                    </label>

                    <input
                        type="text"
                        name="decision"
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 transition"
                    >
                </div>

            </div>

            <div class="mt-6">
                <label class="block font-semibold text-gray-700 mb-2">
                    Problem Statement
                </label>

                <textarea
                    name="problem_statement"
                    rows="4"
                    required
                    class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 transition"
                ></textarea>
            </div>

            <div class="mt-6">
                <label class="block font-semibold text-gray-700 mb-2">
                    Comments
                </label>

                <textarea
                    name="comments"
                    rows="3"
                    class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 transition"
                ></textarea>
            </div>


            
            </div>

           <div class="mt-10">
    <h3 class="text-xl font-bold text-indigo-700">
        Optional Information
    </h3>

    <div class="w-20 h-1 bg-indigo-600 rounded mt-2 mb-6"></div>
</div>

@if(auth()->user()->role === 'admin')

<div class="relative py-4">
    <span class="text-xs font-bold uppercase text-gray-400">
        Admin Workflow Parameters
    </span>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div>
        <label class="block font-semibold text-gray-700 mb-2">
            Assigned To
        </label>

        <select
            name="assigned_to"
            id="assigned_to"
            class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 transition"
        >
            <option value="">Select Assigned Person</option>
        </select>
    </div>

    <div>
        <label class="block font-semibold text-gray-700 mb-2">
            Assigned Date
        </label>

        <input
            type="date"
            name="assigned_date"
            class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 transition"
        >
    </div>

    <div>
        <label class="block font-semibold text-gray-700 mb-2">
            Assigned By
        </label>

        <input
            type="text"
            name="assigned_by"
            value="{{ auth()->user()->name }}"
            readonly
            class="w-full rounded-xl bg-gray-100 border-gray-300 shadow-sm"
        >
    </div>

    <div>
        <label class="block font-semibold text-gray-700 mb-2">
            UAT By
        </label>

        <input
            type="text"
            name="uat_by"
            class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 transition"
        >
    </div>

    <div>
        <label class="block font-semibold text-gray-700 mb-2">
            Deployed By
        </label>

        <input
            type="text"
            name="deployed_by"
            class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 transition"
        >
    </div>

    <div>
        <label class="block font-semibold text-gray-700 mb-2">
            Version
        </label>

        <input
            type="text"
            name="version"
            placeholder="e.g. 1.0"
            class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500 transition"
        >
    </div>

</div>

@else

@isset($changeRequest)

<div class="mt-6 p-4 bg-gray-50 rounded-xl space-y-3 border border-gray-200">
    <h4 class="text-sm font-bold text-gray-700">
        Assignment Details (Filled by Admin)
    </h4>

    <p class="text-sm text-gray-600">
        <strong>Assigned To:</strong>
        {{ $changeRequest->assigned_to ?? 'Pending Allocation' }}
    </p>

    <p class="text-sm text-gray-600">
        <strong>Assigned Date:</strong>
        {{ $changeRequest->assigned_date ?? 'N/A' }}
    </p>

    <p class="text-sm text-gray-600">
        <strong>Assigned By:</strong>
        {{ $changeRequest->assigned_by ?? 'N/A' }}
    </p>

    <p class="text-sm text-gray-600">
        <strong>Version Track:</strong>
        {{ $changeRequest->version ?? 'v0.0.0' }}
    </p>
</div>

@endisset

@endif

@if(auth()->user()->role !== 'admin')
<div class="pt-4">
    <button
        type="submit"
        class="w-full sm:w-auto px-8 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-semibold rounded-xl"
    >
        Submit Change Request
    </button>
</div>
@endif
        </form>
    </div>
</div>

</div>

<script src="{{ asset('js/changeRequests.js') }}"></script>
    @if (session('success')) 
<script> 
    alert("{{ session('success') }}"); 
</script>

@endif
@endsection
