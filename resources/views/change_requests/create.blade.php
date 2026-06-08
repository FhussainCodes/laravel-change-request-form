@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
</style>

<div class="max-w-6xl mx-auto py-12 px-4 sm:px-6 lg:px-8 animate-fade-in-up">

    <div class="bg-white rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.12)] border border-gray-100 overflow-hidden transform transition-all duration-300 hover:shadow-[0_30px_60px_rgba(99,102,241,0.15)]">

        <div class="relative bg-gradient-to-b from-slate-50 to-white p-8 md:p-10 border-b border-gray-100 overflow-hidden">
            <div class="absolute -right-10 -top-10 w-40 h-40 bg-indigo-500/5 rounded-full blur-2xl pointer-events-none"></div>
            <div class="absolute right-1/4 -bottom-10 w-32 h-32 bg-pink-500/5 rounded-full blur-xl pointer-events-none"></div>
            
            <div class="flex items-center space-x-5 relative z-10">
                <div class="p-4 bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 rounded-2xl shadow-[0_8px_20px_rgba(99,102,241,0.3)] transform hover:scale-110 transition duration-300">
                    <i class="fa-solid fa-code-pull-request text-3xl text-white"></i>
                </div>
                <div>
                    <h2 class="text-3xl md:text-4xl font-black tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-slate-800 via-indigo-900 to-purple-900">
                        Change Request Form
                    </h2>
                    <p class="text-slate-600 mt-2 text-sm md:text-base font-semibold flex items-center gap-2">
                        <i class="fa-solid fa-circle-check text-emerald-500"></i> Submit and manage project change requests seamlessly.
                    </p>
                </div>
            </div>
        </div>

        <div class="p-8 md:p-10">
            <form action="{{ route('change-requests.store') }}" method="POST">
                @csrf

                <div class="flex items-center space-x-2 mb-6 pb-2 border-b border-gray-100">
                    <i class="fa-solid fa-sliders text-indigo-600 text-lg"></i>
                    <h3 class="text-lg font-bold text-slate-800">General Properties</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div class="group">
                        <label class="flex items-center gap-2 font-bold text-slate-700 mb-2 transition group-focus-within:text-indigo-600">
                            <i class="fa-solid fa-hashtag text-indigo-500 text-sm"></i> Request No
                        </label>
                        <div class="relative">
                            <input
                                type="text"
                                name="request_no"
                                value="{{ $newID }}"
                                readonly
                                class="w-full rounded-xl border-gray-200 bg-gray-50 font-mono font-bold text-slate-600 shadow-inner p-3 cursor-not-allowed"
                            >
                        </div>
                    </div>

                    <div class="group">
                        <label class="flex items-center gap-2 font-bold text-slate-700 mb-2 transition group-focus-within:text-indigo-600">
                            <i class="fa-solid fa-cubes text-purple-500 text-sm"></i> Project Module
                        </label>
                        <select
                            name="project_module"
                            id="module"
                            onchange="getUsersByModule(this.value)"
                            class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 p-3 bg-white text-slate-800 font-medium"
                        >
                            <option value="">Select Module</option>
                            <option value="DEV" {{ $module == 'DEV' ? 'selected' : '' }}>DEV</option>
                            <option value="Network/Infrastructure" {{ $module == 'Network/Infrastructure' ? 'selected' : '' }}>Network / Infrastructure</option>
                            <option value="GIS/Support" {{ $module == 'GIS/Support' ? 'selected' : '' }}>GIS / Support</option>
                        </select>
                    </div>

                    <div class="group">
                        <label class="flex items-center gap-2 font-bold text-slate-700 mb-2 transition group-focus-within:text-indigo-600">
                            <i class="fa-solid fa-building text-pink-500 text-sm"></i> Department
                        </label>
                        <input
                            type="text"
                            name="department"
                            required
                            class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 p-3 text-slate-800"
                        >
                    </div>

                    <div class="group">
                        <label class="flex items-center gap-2 font-bold text-slate-700 mb-2 transition group-focus-within:text-indigo-600">
                            <i class="fa-solid fa-user text-emerald-500 text-sm"></i> Requested By
                        </label>
                        <input
                            type="text"
                            name="requested_by"
                            required
                            class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 p-3 text-slate-800"
                        >
                    </div>

                    <div class="group">
                        <label class="flex items-center gap-2 font-bold text-slate-700 mb-2 transition group-focus-within:text-indigo-600">
                            <i class="fa-solid fa-triangle-exclamation text-amber-500 text-sm"></i> Priority
                        </label>
                        <select
                            name="priority"
                            required
                            class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 p-3 bg-white text-slate-800 font-bold"
                        >
                            <option value="">Select Priority</option>
                            <option value="low" class="text-green-600">🟢 Low</option>
                            <option value="medium" selected class="text-amber-600">🟡 Medium</option>
                            <option value="high" class="text-red-600">🔴 High</option>
                        </select>
                    </div>

                    <div class="group">
                        <label class="flex items-center gap-2 font-bold text-slate-700 mb-2 transition group-focus-within:text-indigo-600">
                            <i class="fa-solid fa-code-branch text-cyan-500 text-sm"></i> Request Type
                        </label>
                        <input
                            type="text"
                            name="request_type"
                            required
                            class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 p-3 text-slate-800"
                        >
                    </div>

                    <div class="group">
                        <label class="flex items-center gap-2 font-bold text-slate-700 mb-2 transition group-focus-within:text-indigo-600">
                            <i class="fa-solid fa-shuffle text-violet-500 text-sm"></i> Change Type
                        </label>
                        <input
                            type="text"
                            name="change_type"
                            required
                            class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 p-3 text-slate-800"
                        >
                    </div>

                    <div class="group">
                        <label class="flex items-center gap-2 font-bold text-slate-700 mb-2 transition group-focus-within:text-indigo-600">
                            <i class="fa-solid fa-gavel text-teal-500 text-sm"></i> Decision
                        </label>
                        <input
                            type="text"
                            name="decision"
                            class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 p-3 text-slate-800"
                        >
                    </div>
                </div>

                <div class="mt-6 group">
                    <label class="flex items-center gap-2 font-bold text-slate-700 mb-2 transition group-focus-within:text-indigo-600">
                        <i class="fa-solid fa-circle-question text-rose-500 text-sm"></i> Problem Statement
                    </label>
                    <textarea
                        name="problem_statement"
                        rows="4"
                        required
                        class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 p-3 text-slate-800"
                        placeholder="Describe the issue or functional adjustment required..."
                    ></textarea>
                </div>

                <div class="mt-6 group">
                    <label class="flex items-center gap-2 font-bold text-slate-700 mb-2 transition group-focus-within:text-indigo-600">
                        <i class="fa-solid fa-comments text-sky-500 text-sm"></i> Comments
                    </label>
                    <textarea
                        name="comments"
                        rows="3"
                        class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition-all duration-200 p-3 text-slate-800"
                        placeholder="Any extra context or developer notes..."
                    ></textarea>
                </div>

                <div class="relative my-10">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="w-full border-t-2 border-dashed border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <span class="bg-white px-5 py-1.5 text-sm font-extrabold text-indigo-600 tracking-widest uppercase flex items-center gap-2 rounded-full shadow-md border border-gray-100">
                            <i class="fa-solid fa-shield-halved text-indigo-500"></i> Control Matrix
                        </span>
                    </div>
                </div>

                @if(auth()->user()->role === 'admin')
                    <div class="p-6 md:p-8 bg-gradient-to-br from-slate-50 to-indigo-50/40 rounded-2xl border border-indigo-100 shadow-inner relative overflow-hidden">
                        <div class="absolute -right-5 -bottom-5 text-indigo-500/5 pointer-events-none">
                            <i class="fa-solid fa-user-shield text-9xl"></i>
                        </div>

                        <div class="flex items-center gap-2 mb-6">
                            <span class="px-3 py-1 text-xs font-black tracking-wider uppercase text-white bg-indigo-600 rounded-md shadow-sm">
                                ADMIN WORKFLOW PARAMETERS
                            </span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative z-10">
                            <div>
                                <label class="flex items-center gap-2 font-bold text-slate-700 mb-2">
                                    <i class="fa-solid fa-user-check text-indigo-500"></i> Assigned To
                                </label>
                                <select
                                    name="assigned_to"
                                    id="assigned_to"
                                    class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition p-3 bg-white text-slate-800 font-medium"
                                >
                                    <option value="">Select Assigned Person</option>
                                </select>
                            </div>

                            <div>
                                <label class="flex items-center gap-2 font-bold text-slate-700 mb-2">
                                    <i class="fa-solid fa-calendar-days text-indigo-500"></i> Assigned Date
                                </label>
                                <input
                                    type="date"
                                    name="assigned_date"
                                    class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition p-3 text-slate-800"
                                >
                            </div>

                            <div>
                                <label class="flex items-center gap-2 font-bold text-slate-700 mb-2">
                                    <i class="fa-solid fa-signature text-indigo-500"></i> Assigned By
                                </label>
                                <input
                                    type="text"
                                    name="assigned_by"
                                    value="{{ auth()->user()->name }}"
                                    readonly
                                    class="w-full rounded-xl bg-gray-100 border-gray-200 shadow-inner p-3 font-bold text-slate-600 cursor-not-allowed"
                                >
                            </div>

                            <div>
                                <label class="flex items-center gap-2 font-bold text-slate-700 mb-2">
                                    <i class="fa-solid fa-user-astronaut text-indigo-500"></i> UAT By
                                </label>
                                <input
                                    type="text"
                                    name="uat_by"
                                    class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition p-3 text-slate-800"
                                >
                            </div>

                            <div>
                                <label class="flex items-center gap-2 font-bold text-slate-700 mb-2">
                                    <i class="fa-solid fa-rocket text-indigo-500"></i> Deployed By
                                </label>
                                <input
                                    type="text"
                                    name="deployed_by"
                                    class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition p-3 text-slate-800"
                                >
                            </div>

                            <div>
                                <label class="flex items-center gap-2 font-bold text-slate-700 mb-2">
                                    <i class="fa-solid fa-code-commit text-indigo-500"></i> Version Tracking
                                </label>
                                <input
                                    type="text"
                                    name="version"
                                    placeholder="e.g. 1.0.3"
                                    class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 transition p-3 font-mono text-slate-800"
                                >
                            </div>
                        </div>
                    </div>
                @else
                    @isset($changeRequest)
                        <div class="p-6 bg-slate-50 rounded-2xl border border-gray-200 shadow-inner space-y-4">
                            <h4 class="text-sm font-extrabold text-slate-700 flex items-center gap-2 tracking-wider uppercase">
                                <i class="fa-solid fa-clipboard-list text-indigo-500"></i> Assignment Details (Filled by Admin)
                            </h4>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm font-bold">
                                <div class="p-3 bg-white rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                                    <span class="text-slate-500"><i class="fa-solid fa-user-tie mr-1 text-indigo-400"></i> Assigned To:</span>
                                    <span class="text-slate-800 font-extrabold bg-slate-100 px-3 py-1 rounded-lg text-xs">{{ $changeRequest->assigned_to ?? 'Pending Allocation' }}</span>
                                </div>
                                <div class="p-3 bg-white rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                                    <span class="text-slate-500"><i class="fa-solid fa-calendar mr-1 text-purple-400"></i> Assigned Date:</span>
                                    <span class="text-slate-700">{{ $changeRequest->assigned_date ?? 'N/A' }}</span>
                                </div>
                                <div class="p-3 bg-white rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                                    <span class="text-slate-500"><i class="fa-solid fa-user-pen mr-1 text-pink-400"></i> Assigned By:</span>
                                    <span class="text-slate-700">{{ $changeRequest->assigned_by ?? 'N/A' }}</span>
                                </div>
                                <div class="p-3 bg-white rounded-xl border border-gray-100 shadow-sm flex items-center justify-between">
                                    <span class="text-slate-500"><i class="fa-solid fa-tag mr-1 text-emerald-400"></i> Version Track:</span>
                                    <span class="text-indigo-600 font-mono bg-indigo-50 px-3 py-1 rounded-lg text-xs">{{ $changeRequest->version ?? 'v0.0.0' }}</span>
                                </div>
                            </div>
                        </div>
                    @endisset
                @endif

                @if(auth()->user()->role !== 'admin')
                    <div class="pt-8 flex justify-end">
                        <button
                            type="submit"
                            class="group relative w-full sm:w-auto px-10 py-4 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 hover:from-indigo-700 hover:via-purple-700 hover:to-pink-700 text-black font-extrabold rounded-2xl shadow-[0_10px_25px_rgba(99,102,241,0.35)] hover:shadow-[0_15px_30px_rgba(99,102,241,0.5)] transform hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 flex items-center justify-center gap-3"
                        >
                            <i class="fa-solid fa-paper-plane group-hover:translate-x-1 transition-transform"></i>
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