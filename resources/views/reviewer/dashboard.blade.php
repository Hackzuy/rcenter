@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">Reviewer Dashboard</h1>
    <h2 class="text-2xl font-bold mb-4">Reviews</h2>
    @if($reviews->count() > 0)
        <div class="bg-white shadow-md rounded-lg divide-y divide-gray-200">
            @foreach($reviews as $review)
                <div class="p-6">
                    <div class="mb-4">
                        <strong class="font-bold">Paper Title:</strong> {{ $review->researchPaper->title }}
                    </div>
                    <div class="mb-4">
                        <strong class="font-bold">Abstract:</strong> {{ $review->researchPaper->abstract }}
                    </div>
                    <form action="{{ route('reviewer.submit-review', $review) }}" method="POST" class="inline-block">
                        @csrf
                        <div class="mb-4">
                            <label for="comments" class="block text-gray-700 font-bold mb-2">Comments:</label>
                            <textarea name="comments" id="comments" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="4">{{ old('comments', $review->comments) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 font-bold mb-2">Status:</label>
                            <select name="status" id="status" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none">
                                <option value="pending" {{ old('status', $review->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="accepted" {{ old('status', $review->status) === 'accepted' ? 'selected' : '' }}>Accepted</option>
                                <option value="rejected" {{ old('status', $review->status) === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                <option value="revision_requested" {{ old('status', $review->status) === 'revision_requested' ? 'selected' : '' }}>Revision Requested</option>
                            </select>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Submit Review
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">No reviews found.</p>
    @endif
</div>
@endsection