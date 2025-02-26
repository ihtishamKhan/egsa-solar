<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = Lead::all();
        
        return response()->json(['data'=>$leads]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        try {
            $new= new Lead();
            $new->created_by = auth()->user()->id;
            $new->assigned_to = $request->assign_to;
            $new->title = $request->title;
            $new->first_name = $request->first_name;
            $new->last_name = $request->last_name;
            $new->contact_number = $request->contact_number;
            $new->additional_number = $request->additional_number;
            $new->status = $request->status;
            $new->save();
    
            return response()->json([
                'message' => 'Lead created successfully',
                'lead' => $new
            ], 201);
        } catch (\Exception $e) {
            // Log the error or handle it as necessary
            return response()->json([
                'error' => 'Failed to create Lead',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
