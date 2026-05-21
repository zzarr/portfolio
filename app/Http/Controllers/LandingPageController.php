<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use App\Models\Experience;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class LandingPageController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $experiences = Experience::with([
            'details:id,experience_id,description'
        ])
            ->orderByRaw('is_current DESC')
            ->orderByDesc('end_date')
            ->orderByDesc('start_date')
            ->get();

        $projects = Project::with('tags:id,name')
            ->orderByDesc('created_at')
            ->get();


        return view('landingPage.page.index', compact('profile', 'experiences', 'projects'));
    }
}
