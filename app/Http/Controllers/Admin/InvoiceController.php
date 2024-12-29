<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\Invoice;
use PDF;

class InvoiceController extends Controller
{
    public function project_invoices($slug)
    {
        $project = Project::where('slug', $slug)->with('invoices')->first();
        return view('admin.projects.invoices.index', compact('project'));
    }

    public function invoice_create($id)
    {
        // project with count of invoices
        $project = Project::withCount('invoices')->findOrFail($id);
        return view('admin.projects.invoices.create', compact('project'));
    }

    public function invoice_store(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
            'inv_number' => 'required',
            'inv_file' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if($request->hasFile('inv_file')){
            $filenameWithExt = $request->file('inv_file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('inv_file')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('inv_file')->storeAs('public/invoices', $fileNameToStore);
        } else {
            $fileNameToStore = ' ';
        }

        $invoice = new Invoice();
        $invoice->project_id = $id;
        $invoice->created_by = auth()->user()->id;
        $invoice->title = $request->title;
        $invoice->amount = $request->amount;
        $invoice->invoice_date = $request->inv_date;
        $invoice->due_date = $request->due_date;
        $invoice->invoice_number = $request->inv_number;
        $invoice->invoice_file = $fileNameToStore;
        $invoice->save();

        return redirect()->route('projects.show', $project->id)->with('success', 'Invoice created successfully');
    }

    public function invoice_show($id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);
        return view('admin.projects.invoices.show', compact('invoice'));
    }

    public function invoice_print($id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);
        //  print using dompdf
        $pdf = PDF::loadView('admin.projects.invoices.print', compact('invoice'));
        return $pdf->stream();

    }
}
