<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        
        if ($user->role === 'reviewer') {
            $reviews = $user->reviews()->where('status', 'pending')->with('researchPaper')->get();
        } else {
            $reviews = $user->reviews()->with('researchPaper')->get();
        }
        
        return view('home', compact('reviews'));
    }
}