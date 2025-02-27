<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'initial_quantity' => 'required|integer|min:0',
            ]);
            
            $product = DB::transaction(function () use ($validated, $request) {
                $product = Product::create([
                    'name' => $validated['name'],
                    'description' => $validated['description'],
                    'price' => $validated['price'],
                    'quantity' => $validated['initial_quantity']
                ]);
                

                // If there's initial quantity, create a stock record
                if ($validated['initial_quantity'] > 0) {
                    $product->stocks()->create([
                        'quantity' => $validated['initial_quantity'],
                        'type' => 'in',
                        'reason' => 'purchase',
                        'notes' => $validated['notes'] ?? 'Initial stock entry',
                        'user_id' => auth()->id()
                    ]);
                }

                // Load the stocks relationship
                // $product->load('stocks');

                // return $product;
            });
            // dd($product);

            // Return success response
            return redirect()->back()->with('success', 'Product created successfully');

        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Product creation failed: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while creating the product');
        }
    
    }
    public function create()
    {
        return view('admin.products.create');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        
        return view('admin.products.show', compact('product'));
    }
}
