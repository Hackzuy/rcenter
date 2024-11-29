<?php
namespace App\Http\Controllers;
use App\Models\ResearchPaper;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Str;
class ProfessorController extends Controller
{
    public function dashboard()
    {
        $researchPapers = ResearchPaper::with('reviews')->where('status', 'submitted')->get();
        $reviewers = User::get();
        return view('professor.dashboard', compact('researchPapers', 'reviewers'));
    }
    public function sendInvitation(Request $request, $research_paper_id)
    {
        $reviewer = User::findOrFail($request->reviewer_id);
        // Generate a unique invitation link
        $invitationLink = url('/invitations/' . Str::random(32));
        // Create a new review record with the invitation link
        $review = new Review();
        $review->research_paper_id = $research_paper_id;
        $review->reviewer_id = $reviewer->id;
        $review->invitation_link = $invitationLink;
        $review->status = 'pending';
        $review->save();
        return redirect()->back()->with('success', 'Invitation link generated and shared successfully.');
    }
}