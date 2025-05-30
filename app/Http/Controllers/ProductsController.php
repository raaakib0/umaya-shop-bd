<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // Display Products
    public function index()
    {

        $products = Products::all();
        return view('home', compact('products'));
    }

    public function allProducts()
    {
        $products = Products::all();
        return view('admin-pages.products-page.all-products', compact('products'));
    }

    // Admin Dashboard data show
    public function dashboard()
    {
        $products = Products::all();

        // Count products
        $productsCount = $products->count();

        // Dummy total sales (replace with real sales logic)
        $totalSales = 12345.67;

        // Dummy active users count (replace with real logic)
        $activeUsers = 37;

        // Products count grouped by category
        $productsByCategory = $products->groupBy('category')->map->count()->toArray();

        return view('admin-pages.dashboard', compact('products', 'productsCount', 'totalSales', 'activeUsers', 'productsByCategory'));
    }

    // public function deleteProducts()
    // {
    //     return response('<h1>Delete Products</h1>');
    // }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-pages.products-page.add-products');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'nullable|string|max:255',
            'brand' => 'required|string|max:255',
            'manufacturer' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        \App\Models\Products::create($validated);

        return redirect()->route('admin.all-products')->with('success', 'Products Added Successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products = Products::findofFail($id);
        return view('admin-pages.products-page.edit-products', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = basename($imagePath);
        }

        $product->update($validated);

        return redirect()->route('admin.all-products')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $products = Products::findOrFail($id);
        $products->delete();
        return redirect()->route('admin.all-products')->with('success', 'Products Deleted Successfully.');
    }
}
