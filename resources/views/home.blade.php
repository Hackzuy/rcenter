@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 py-10">
        <div class="container mx-auto">
            <div class="flex flex-col items-center justify-center">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">Welcome, {{ Auth::user()->name }}!</h1>
                @if (Auth::user()->role === 'admin')
                    <p class="text-xl text-gray-600">Manage the system's professors.</p>
                @else
                    <p class="text-xl text-gray-600">Manage your research papers, reviews, and progress.</p>
                @endif
            </div>
        </div>
    </div>

    <div class="container mx-auto py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @if (Auth::user()->role === 'admin')
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Admin Capabilities</h2>
                    <a href="{{ route('admin.professors.index') }}"
                        class="flex items-center text-blue-500 hover:text-blue-600">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        Go to Professor management dashboard
                    </a>
                </div>
            @elseif (Auth::user()->role === 'professor')
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Professor Capabilities</h2>
                    <ul class="space-y-4">
                        <li class="flex items-center">
                            <div class="bg-blue-500 text-white rounded-full p-3 mr-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-lg text-gray-700">Manage research papers submitted by PhD students</span>
                        </li>
                        <li class="flex items-center">
                            <div class="bg-blue-500 text-white rounded-full p-3 mr-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-lg text-gray-700">Send review invitations to reviewers</span>
                        </li>
                        <li class="flex items-center">
                            <div class="bg-blue-500 text-white rounded-full p-3 mr-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-lg text-gray-700">Monitor the progress of PhD students</span>
                        </li>
                        <li class="flex items-center">
                            <div class="bg-blue-500 text-white rounded-full p-3 mr-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-lg text-gray-700">Access the professor dashboard for detailed
                                information</span>
                        </li>
                    </ul>
                    <a href="{{ route('professor.dashboard') }}"
                        class="mt-6 inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Go to Professor Dashboard
                    </a>
                </div>
            @elseif (Auth::user()->role === 'student')
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">PhD Student Capabilities</h2>
                    <ul class="space-y-4">
                        <li class="flex items-center">
                            <div class="bg-green-500 text-white rounded-full p-3 mr-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-lg text-gray-700">Submit research papers for review</span>
                        </li>
                        <li class="flex items-center">
                            <div class="bg-green-500 text-white rounded-full p-3 mr-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-lg text-gray-700">Track the status of your submitted papers</span>
                        </li>
                        <li class="flex items-center">
                            <div class="bg-green-500 text-white rounded-full p-3 mr-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-lg text-gray-700">Receive notifications about your paper's progress</span>
                        </li>
                        <li class="flex items-center">
                            <div class="bg-green-500 text-white rounded-full p-3 mr-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-lg text-gray-700">Access the PhD student dashboard for detailed
                                information</span>
                        </li>
                    </ul>
                    <a href="{{ route('phd-student.dashboard') }}"
                        class="mt-6 inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                        Go to PhD Student Dashboard
                    </a>
                </div>
            @endif

            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Reviews</h3>
                @if ($reviews->count() > 0)
                <ul class="space-y-4">
                    @foreach ($reviews as $review)
                        <li class="border border-gray-200 p-4 rounded-lg">
                            <div class="mb-2">
                                <strong class="text-lg font-bold">Paper Title:</strong>
                                <span class="text-gray-700">{{ $review->researchPaper->title }}</span>
                            </div>
                            <div class="mb-2">
                                <strong class="text-lg font-bold">Abstract:</strong>
                                <span class="text-gray-700">{{ $review->researchPaper->abstract }}</span>
                            </div>
                            <div class="mb-4">
                                <strong class="text-lg font-bold">Status:</strong>
                                <span class="text-gray-700">
                                    {{ ucfirst(str_replace('_', ' ', $review->status)) }}
                                </span>
                            </div>
                            @if ($review->researchPaper->user_id !== Auth::id() || $review->invitation_link !== 'N/A')
                                <a href="{{ route('reviewer.submit-review', $review) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                    Submit Review
                                </a>
                            @endif
                        </li>
                    @endforeach
                </ul>
                @else
                    <p class="text-gray-700">No pending reviews found.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
