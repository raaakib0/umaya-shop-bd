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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        return view('admin-pages.products-page.edit-products',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $products = Products::findOrFail($id);
        $products->delete();
        return redirect()->route('admin.all-products')->with('success','Products Deleted Successfully.');
    }
}
