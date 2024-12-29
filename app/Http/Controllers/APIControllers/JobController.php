<?php

namespace App\Http\Controllers\APIControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobProposal;

class JobController extends Controller
{
    public function index()
    {
        try {
            // Get current user from API token - with lazy load of details
            $employee = auth()->user();
            $employee->load('details');
            // Retrieve all jobs
            $jobs = Job::all();

            $matchingJobs = [];
            $takenJobs = [];

            foreach ($jobs as $job) {
                $requiredSkills = strtolower($job->required_skills);
            
                $requiredSkillsArray = explode(',', $requiredSkills);
            
                $employeeExpertise = strtolower($employee->details->expertise);
            
                $employeeExpertiseArray = explode(',', $employeeExpertise);
            
                if (count(array_intersect(array_map('strtolower', $requiredSkillsArray), array_map('strtolower', $employeeExpertiseArray))) > 0) {
                    $matchingJobs[] = $job;
                }

                if ($job->taken_by == $employee->id) {
                    $takenJobs[] = $job;
                }
            }

            return response()->json([
                'newJobs' => $matchingJobs,
                'takenJobs' => $takenJobs
            ]);
        } catch (\Exception $e) {
            // Log the error or handle it as necessary
            return response()->json([
                'error' => 'Failed to fetch jobs',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $job = Job::find($id, ['id', 'title', 'description', 'work_main', 'work_sub', 'client_name', 'client_city', 'client_postal_code', 'client_address', 'client_email', 'client_phone', 'status', 'taken_by', 'created_at']);

            if(auth()->user()->id != $job->taken_by) {
                $job->client_email = '';
                $job->client_phone = '';
            }

            $job->assigned_date = '';

            if (!$job) {
                return response()->json([
                    'error' => 'Job not found'
                ], 404);
            }

    
            return response()->json([
                'job' => $job
            ]);
        } catch (\Exception $e) {
            // Log the error or handle it as necessary
            return response()->json([
                'error' => 'Failed to fetch job',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $job = new Job();
            $job->client_name = $request->client_name;
            $job->client_email = $request->client_email;
            $job->client_phone = $request->client_phone;
            $job->client_address = $request->client_address;
            $job->client_city = $request->client_city;
            $job->client_postal_code = $request->client_postal_code;

            $job->title = $request->title;
            $job->description = $request->description;
            $job->work_main = $request->work_main;
            $job->work_sub = $request->work_sub;
            $job->save();
    
            return response()->json([
                'message' => 'Job created successfully',
                'job' => $job
            ], 201);
        } catch (\Exception $e) {
            // Log the error or handle it as necessary
            return response()->json([
                'error' => 'Failed to create job',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function takeJob($id)
    {
        try {
            $job = Job::find($id);
            $job->taken_by = auth()->user()->id;
            $job->status = 'taken';
            $job->save();
    
            return response()->json([
                'message' => 'Job taken successfully',
                'job' => $job
            ]);
        } catch (\Exception $e) {
            // Log the error or handle it as necessary
            return response()->json([
                'error' => 'Failed to take job',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function storeProposal(Request $request)
    {
        try {
            // validate request
            $request->validate([
                'job_id' => 'required|integer',
                'service_name' => 'required|string',
                'service_description' => 'required|string',
            ]);
            
            $job = Job::findOrFail($request->job_id);
            if ($job->taken_by != auth()->user()->id) {
                return response()->json([
                    'error' => 'You are not authorized to submit proposal for this job'
                ], 403);
            }

            $proposal = new JobProposal();
            $proposal->job_id = $request->job_id;
            $proposal->submitted_by = auth()->user()->id;
            $proposal->service_name = $request->service_name;
            $proposal->service_description = $request->service_description;
            $proposal->quantity = $request->quantity;
            $proposal->tax = $request->tax;
            $proposal->price_per_unit = $request->price_per_unit;
            $proposal->save();

            $job->status = 'proposal_submitted';
            $job->save();
    
            return response()->json([
                'message' => 'Proposal submitted successfully',
                'proposal' => $proposal
            ], 201);
        } catch (\Exception $e) {
            // Log the error or handle it as necessary
            return response()->json([
                'error' => 'Failed to submit proposal',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
