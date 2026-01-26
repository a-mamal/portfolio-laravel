<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    // Show all projects in admin panel
    public function adminIndex()
    {
        $projects = Project::latest()->get(); // fetch all projects ordered by newest
        return view('admin.projects.index', compact('projects'));
    }

    // Show the create project form
    public function create()
    {
        return view('admin.projects.create');
    }

    // Handle form submission and store project
    public function store(Request $request)
    {
        // Validate form inputs
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'nullable|string|max:255',
            'description' => 'required',
            'project_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'status' => 'required|in:draft,published',
        ]);

        // Save project to database
        Project::create([
            ...$validated,
            'slug' => Str::slug($request->title), // auto-generate slug from title
        ]);

        // Redirect back to project list with success message
        return redirect()->route('admin.projects.index')
                         ->with('success', 'Project created successfully!');
    }

    public function index(){
        $projects = Project::where('status', 'published')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('pages.projects', compact('projects'));
    }

}
