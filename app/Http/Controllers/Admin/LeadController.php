<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Imports\LeadsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Services\FileService;
use App\Models\User;
use App\Models\Product;

class LeadController extends Controller
{
    protected $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index(Request $request)
    {
        $leads = Lead::query();
        $leads->with(['createdBy', 'assignedTo']);

        
        if($request->has('status') && $request->status != '') {
            $leads->where('status', $request->status);
        }

        $leads = $leads->get();
        
        return view('admin.leads.index', compact('leads'));
    }

    public function create()
    {
        $employees = User::role('Employee')->get();
        return view('admin.leads.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'contact_number' => 'required',
        ]);

        $new= new Lead();
        $new->created_by = auth()->user()->id;
        $new->assigned_to = $request->user_id;
        $new->title = $request->title;
        $new->first_name = $request->first_name;
        $new->last_name = $request->last_name;
        $new->contact_number = $request->contact_number;
        $new->additional_number = $request->additional_number;
        $new->save();

        return redirect()->route('leads.index')->with('success', 'Lead created successfully.');
    }

    public function show($uuid)
    {
        $lead = Lead::where('uuid', $uuid)->with(['createdBy', 'assignedTo'])->first();

        if(!$lead) {
            return redirect()->back()->with('error', 'Lead not found.');
        }

        return view('admin.leads.show', compact('lead'));
    }
    
    public function files($uuid)
    {
        $lead = Lead::where('uuid', $uuid)->with(['files'])->first();

        if(!$lead) {
            return redirect()->back()->with('error', 'Lead not found.');
        }

        $fileService = $this->fileService;

        return view('admin.leads.files', compact('lead', 'fileService'));
    }

    public function addFiles(Request $request, $uuid)
    {
        $request->validate([
            'files' => 'required',
            'files.*' => 'mimes:pdf,doc,docx,jpg,jpeg,png|max:2048'
        ]);

        $lead = Lead::where('uuid', $uuid)->first();

        if(!$lead) {
            return redirect()->back()->with('error', 'Lead not found.');
        }

        foreach($request->file('files') as $file) {
            $this->fileService->uploadFile($file, $lead);
        }

        return redirect()->back()->with('success', 'Files uploaded successfully.');
    }

    public function notes($uuid)
    {
        $lead = Lead::where('uuid', $uuid)->with(['notes'])->first();

        if(!$lead) {
            return redirect()->back()->with('error', 'Lead not found.');
        }

        return view('admin.leads.notes', compact('lead'));
    }

    public function addNotes(Request $request, $uuid)
    {
        $request->validate([
            'note' => 'required'
        ]);

        $lead = Lead::where('uuid', $uuid)->first();

        if(!$lead) {
            return redirect()->back()->with('error', 'Lead not found.');
        }

        $lead->notes()->create([
            'note' => $request->note,
            'created_by' => auth()->id()
        ]);

        return redirect()->back()->with('success', 'Note added successfully.');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:2048'
        ]);

        try {
            $file = $request->file('file');

            $path = $file->storeAs('temp', 'import_' . time() . '.csv');

            Excel::import(new LeadsImport, storage_path('app/' . $path));

            Storage::delete($path);
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }

        return redirect()->back()->with('success', 'Leads Imported successfully.');
    }

    public function products($uuid)
    {
        $lead = Lead::where('uuid', $uuid)
                    ->with(['stocks' => function($query) {
                        $query->where('type', 'out')
                            ->with('product');  // Add product relationship in ProductStock model
                    }])
                    ->first();
        $products = Product::all();

        if(!$lead) {
            return redirect()->back()->with('error', 'Lead not found.');
        }

        return view('admin.leads.products', compact('lead', 'products'));
    }

    public function addProducts(Request $request, $uuid)
    {
        $request->validate([
            'products' => 'required|array',
            'products.*' => 'exists:products,id'
        ]);

        $lead = Lead::where('uuid', $uuid)->first();

        if(!$lead) {
            return redirect()->back()->with('error', 'Lead not found.');
        }

        // $lead->products()->sync($request->products);

        try {
            \DB::transaction(function () use ($request, $lead) {
                // $lead->products()->sync($request->products);
                
                // Process stock reduction for each product
                foreach ($request->products as $productId) {
                    $product = Product::find($productId);
                    if ($product) {
                        $product->removeStock(
                            1, // Assuming quantity of 1 per product
                            auth()->id(),
                            'sale',
                            'Product assigned to lead: ' . $lead->uuid,
                            $lead
                        );
                    }
                }
            });
    
            return redirect()->back()->with('success', 'Products added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', 'Products added successfully.');
    }
}
