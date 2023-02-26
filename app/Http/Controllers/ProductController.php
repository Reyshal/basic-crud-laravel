<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'color' => 'required',
            'category' => 'required',
            'price' => 'required'
        ]);

        Product::create([
            'name' => $request->name,
            'color' => $request->color,
            'category' => $request->category,
            'price' => $request->price
        ]);

        return redirect()->route('product.index')->with(['success' => 'Data has been saved successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'color' => 'required',
            'category' => 'required',
            'price' => 'required'
        ]);

        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'color' => $request->color,
            'category' => $request->category,
            'price' => $request->price
        ]);

        return redirect()->route('product.index')->with(['success' => 'Data has been saved successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with(['success' => 'Data has been deleted successfully!']);
    }
}
