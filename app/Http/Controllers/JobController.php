<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display all jobs on the home page.
     */
    public function index()
    {
        $jobs = Job::all();
        return view('home', compact('jobs'));
    }

    /**
     * Show the form to create a new job.
     */
    public function create()
    {
        return view('add_job');
    }

    /**
     * Store a new job in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|numeric',
            'employment_type' => 'required|in:full-time,part-time,contract,freelance',
            'experience_level' => 'nullable|string|max:100',
        ]);

        Job::create($validated);

        return redirect()->route('jobs.create')->with('success', 'Job added successfully!');
    }

    /**
     * Show the form for editing an existing job.
     */
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('edit_job', compact('job'));
    }

    /**
     * Update an existing job in the database.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|numeric',
            'employment_type' => 'required|in:full-time,part-time,contract,freelance',
            'experience_level' => 'nullable|string|max:100',
        ]);

        $job = Job::findOrFail($id);
        $job->update($validated);

        return redirect()->route('home')->with('success', 'Job updated successfully!');
    }

    /**
     * Delete a job from the database.
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('home')->with('success', 'Job deleted successfully!');
    }

    public function show($id)
{
    $job = Job::findOrFail($id);
    return view('job_show', compact('job'));
}

}
