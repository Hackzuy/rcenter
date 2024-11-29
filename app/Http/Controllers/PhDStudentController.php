<?php

namespace App\Http\Controllers;

use App\Models\ResearchPaper;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PhDStudentController extends Controller
{
    public function dashboard()
    {
        $researchPapers = auth()->user()->researchPapers;
        
        Log::info('Retrieved research papers', $researchPapers->toArray());
        
        return view('phd-student.dashboard', compact('researchPapers'));
    }

    public function submitPaper(Request $request)
    {
        Log::info('Submitting research paper', $request->all());

        try {
            $validatedData = $request->validate([
                'title' => 'required',
                'abstract' => 'required',
                'file' => 'required|mimes:pdf|max:4096',
            ]);

            Log::info('Validated data', $validatedData);

            $researchPaper = new ResearchPaper();
            $researchPaper->title = $validatedData['title'];
            $researchPaper->abstract = $validatedData['abstract'];
            $researchPaper->user_id = auth()->id();
            $researchPaper->status = 'submitted';
            $researchPaper->submission_date = now();

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filePath = $file->store('papers', 'public');
                $researchPaper->file_path = $filePath;
            } else {
                Log::warning('No file uploaded');
            }

            if ($researchPaper->save()) {
                // Create a review record for the submitted paper
                $review = new Review();
                $review->reviewer_id = auth()->id();
                $review->research_paper_id = $researchPaper->id;
                $review->invitation_link = 'N/A'; // Set a default value or generate a unique link if needed
                $review->status = 'pending';
                $review->save();

                Log::info('Review created for research paper', $review->toArray());

                return redirect()->route('phd-student.dashboard')->with('success', 'Paper submitted successfully.');
            } else {
                Log::error('Error saving research paper');
                return redirect()->back()->with('error', 'Failed to submit paper. Please try again.');
            }
        } catch (\Exception $e) {
            Log::error('Error submitting research paper', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to submit paper. Please try again.');
        }
    }
}