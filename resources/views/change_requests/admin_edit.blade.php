@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 py-12 px-4">

    <div class="max-w-4xl mx-auto">

        <!-- Main Card -->
        <div class="bg-white/90 backdrop-blur-lg rounded-3xl shadow-2xl overflow-hidden border border-white">

            <!-- Header -->
<div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 p-8">

    <div class="flex items-center gap-4">

        <!-- Icon container -->
        <div class="bg-white/90 p-4 rounded-2xl shadow-md">
            <svg class="w-8 h-8 text-indigo-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"/>
            </svg>
        </div>

        <div>
            <!-- Softer title color instead of pure white -->
            <h2 class="text-3xl font-bold text-indigo-50">
                Process Change Request
            </h2>

            <!-- slightly dimmed subtitle -->
            <p class="text-indigo-100 mt-1">
                Request #{{ $changeRequest->request_no }}
            </p>
        </div>

    </div>

</div>

            <!-- Body -->
            <div class="p-8">

                <!-- Request Information -->
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-100 rounded-2xl p-6 mb-8">

                    <h3 class="flex items-center gap-2 text-lg font-bold text-gray-800 mb-5">

                        <svg class="w-5 h-5 text-indigo-600"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M13 16h-1v-4h-1m1-4h.01"/>
                        </svg>

                        Request Information

                    </h3>

                    <div class="grid md:grid-cols-3 gap-5">

                        <div class="bg-white rounded-xl p-4 shadow-sm">
                            <p class="text-xs uppercase text-gray-500 mb-1">
                                Department
                            </p>
                            <p class="font-semibold text-gray-800">
                                {{ $changeRequest->department }}
                            </p>
                        </div>

                        <div class="bg-white rounded-xl p-4 shadow-sm">
                            <p class="text-xs uppercase text-gray-500 mb-1">
                                Requested By
                            </p>
                            <p class="font-semibold text-gray-800">
                                {{ $changeRequest->requested_by }}
                            </p>
                        </div>

                        <div class="bg-white rounded-xl p-4 shadow-sm">
                            <p class="text-xs uppercase text-gray-500 mb-1">
                                Request No
                            </p>
                            <p class="font-semibold text-gray-800">
                                {{ $changeRequest->request_no }}
                            </p>
                        </div>

                    </div>

                    <div class="mt-5 bg-white rounded-xl p-4 shadow-sm">
                        <p class="text-xs uppercase text-gray-500 mb-2">
                            Problem Statement
                        </p>

                        <p class="text-gray-700">
                            {{ $changeRequest->problem_statement }}
                        </p>
                    </div>

                </div>

                <form action="{{ route('change-requests.update', $changeRequest->request_no) }}"
                      method="POST"
                      class="space-y-8">

                    @csrf
                    @method('PUT')

                    <!-- Assignment Section -->
                    <div class="bg-gray-50 rounded-2xl p-6 border">

                        <h3 class="flex items-center gap-2 text-lg font-bold text-gray-800 mb-5">

                            <svg class="w-5 h-5 text-purple-600"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M17 20h5V4H2v16h5m10 0v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4m10 0H7"/>
                            </svg>

                            Assignment Details

                        </h3>

                        <div>

                            <label class="block font-semibold text-gray-700 mb-2">
                                Assigned To
                            </label>

                            <select name="assigned_to"
                                    required
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 transition">

                                <option value="">
                                    -- Select Relevant Module Person --
                                </option>

                                @foreach($moduleUsers as $user)
                                    <option value="{{ $user->name }}"
                                        {{ $changeRequest->assigned_to == $user->name ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="mt-5">

                            <label class="block font-semibold text-gray-700 mb-2">
                                Assigned Date
                            </label>

                            <input type="date"
                                   name="assigned_date"
                                   value="{{ $changeRequest->assigned_date }}"
                                   required
                                   class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 transition">

                        </div>

                    </div>

                    <!-- Deployment Section -->
                    <div class="bg-gray-50 rounded-2xl p-6 border">

                        <h3 class="flex items-center gap-2 text-lg font-bold text-gray-800 mb-5">

                            <svg class="w-5 h-5 text-green-600"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5 13l4 4L19 7"/>
                            </svg>

                            Deployment Information

                        </h3>

                        <div class="grid md:grid-cols-3 gap-5">

                            <div>
                                <label class="block font-semibold text-gray-700 mb-2">
                                    UAT By
                                </label>

                                <input type="text"
                                       name="uat_by"
                                       value="{{ $changeRequest->uat_by }}"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-4 focus:ring-green-200 focus:border-green-500 transition">
                            </div>

                            <div>
                                <label class="block font-semibold text-gray-700 mb-2">
                                    Deployed By
                                </label>

                                <input type="text"
                                       name="deployed_by"
                                       value="{{ $changeRequest->deployed_by }}"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-4 focus:ring-green-200 focus:border-green-500 transition">
                            </div>

                            <div>
                                <label class="block font-semibold text-gray-700 mb-2">
                                    Version
                                </label>

                                <input type="text"
                                       name="version"
                                       value="{{ $changeRequest->version }}"
                                       placeholder="e.g. v1.0"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-4 focus:ring-green-200 focus:border-green-500 transition">
                            </div>

                        </div>

                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6 border-t">

                        <button type="submit"
    class="w-full sm:w-auto px-8 py-4 rounded-2xl bg-white border-2 border-indigo-600 
           text-indigo-700 font-bold tracking-wide shadow-md hover:shadow-xl hover:bg-indigo-50
           transition-all duration-300 flex items-center justify-center gap-3">

    <svg class="w-5 h-5 text-indigo-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M5 13l4 4L19 7"/>
    </svg>

    <span>Save & Finalize Workflow</span>

</button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>
@endsection