<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\JobReleasedSMS;
use App\Notifications\JobReleasedEmail;
use App\Notifications\JobReleasedInApp;
use App\Models\User;
use App\Models\Job;

class JobController extends Controller
{
    public function index() 
    {
        // Retrieve all jobs
        $jobs = Job::all();

        return view('admin.jobs.index', compact('jobs'));
    }

    public function update(Request $request)
    {
        $job = Job::find($request->id);
        // $skills = explode(',', $request->skills);
        $job->required_skills = $request->skills;
        $job->status = "released";
        $job->save();

        // send notification to all relevant employees
        $skills = explode(',', $request->skills);
        $employees = User::role('Employee')
            ->with('details')
            ->get()
            ->filter(function ($employee) use ($skills) {
                // Split the expertise string into an array
                $expertise = explode(',', $employee->details->expertise);

                // Check if any skill matches the expertise
                foreach ($skills as $skill) {
                    if (in_array(trim(strtolower($skill)), array_map('trim', array_map('strtolower', $expertise)))) {
                        return true;
                    }
                }

                return false;
            });

        foreach ($employees as $employee) {
            $employee->notify(new JobReleasedEmail($job));
            // $employee->notify(new JobReleasedSMS($job));
            // $employee->notify(new JobReleasedInApp($job));
        }

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
    }

    public function taken()
    {
        $jobs = Job::where('taken_by', auth()->user()->id)->get();

        return redirect()->route('jobs.taken', compact('jobs'));
    }
}
