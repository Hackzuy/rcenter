<?php
namespace App\Http\Controllers;
use App\Models\Review;
use Illuminate\Http\Request;
class ReviewerController extends Controller
{
    public function dashboard()
    {
        $auth_id = auth()->user()->id;
        $reviews = Review::where('reviewer_id', $auth_id)->get();
        return view('reviewer.dashboard', compact('reviews'));
    }
    public function submitReview(Request $request, $review_id)
    {
        $review = Review::findOrFail($review_id);
        $validatedData = $request->validate([
            'comments' => 'required',
            'status' => 'required|in:pending,accepted,rejected,revision_requested',
        ]);
        $review->update($validatedData);
        return redirect()->back()->with('success', 'Review submitted successfully.');
    }
}