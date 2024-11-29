@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Professor Dashboard</h1>
    <h2 class="text-2xl font-semibold mb-4">Research Papers</h2>
    @if($researchPapers->count() > 0)
        <div class="grid grid-cols-1 gap-6">
            @foreach($researchPapers as $paper)
                <div class="bg-white shadow-md rounded-lg p-6">
                    <p class="text-gray-600"><strong>ID:</strong> {{ $paper->id }}</p>
                    <p class="text-xl font-semibold mb-2"><strong>Title:</strong> {{ $paper->title }}</p>
                    <p class="text-gray-700 mb-4"><strong>Abstract:</strong> {{ $paper->abstract }}</p>
                    <p class="text-gray-600 mb-2"><strong>Author:</strong> {{ $paper->user->name }}</p>
                    <p class="text-gray-600 mb-4"><strong>Status:</strong> {{ $paper->status }}</p>
                    
                    <!-- Add a download link for the paper's PDF file -->
                    @if($paper->file_path)
                        <p class="text-gray-600 mb-4">
                            <strong>Uploaded Paper:</strong>
                            <a href="{{ asset('storage/' . $paper->file_path) }}" target="_blank" class="text-blue-500 hover:text-blue-700">Download PDF</a>
                        </p>
                    @endif
                    
                    <h3 class="text-lg font-semibold mb-2">Reviews:</h3>
                    @if($paper->reviews->count() > 0)
                        @foreach($paper->reviews as $review)
                            <div class="border border-gray-300 rounded-md p-4 mb-4">
                                <p class="text-gray-600 mb-2"><strong>Reviewer:</strong> {{ $review->reviewer->name }}</p>
                                <p class="text-gray-600 mb-2"><strong>Status:</strong> {{ $review->status }}</p>
                                <p class="text-gray-700"><strong>Comments:</strong> {{ $review->comments }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="text-gray-600 mb-4">No reviews available.</p>
                    @endif
                    
                    <form action="{{ route('professor.send-invitation', $paper) }}" method="POST" class="mb-4">
                        @csrf
                        <input type="hidden" name="research_paper_id" value="{{ $paper->id }}">
                        <label for="reviewer_id" class="block text-sm font-medium text-gray-700">Select Reviewer:</label>
                        <select name="reviewer_id" id="reviewer_id" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @foreach($reviewers as $reviewer)
                                <option value="{{ $reviewer->id }}">{{ $reviewer->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Send Review Invitation
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600">No research papers found.</p>
    @endif
</div>
@endsection