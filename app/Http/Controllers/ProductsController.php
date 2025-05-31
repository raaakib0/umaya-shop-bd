<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ProductsController extends Controller
{
    // Show homepage with all products
    public function index()
    {
        $products = Products::all();
        return view('home', compact('products'));
    }

    // Show product details
    public function show($id)
    {
        $product = Products::findOrFail($id);
        return view('product-details', compact('product'));
    }

    // Admin dashboard
    public function dashboard()
    {
        $products = Products::all();
        $productsCount = $products->count();
        $totalSales = 12345.67; // Static/demo data
        $activeUsers = 37;      // Static/demo data

        $productsByCategory = $products->groupBy('category')->map->count()->toArray();

        return view('admin-pages.dashboard', compact('products', 'productsCount', 'totalSales', 'activeUsers', 'productsByCategory'));
    }

    // Show all products (admin)
    public function allProducts()
    {
        $products = Products::all();
        return view('admin-pages.products-page.all-products', compact('products'));
    }

    // Show form to create product
    public function create()
    {
        return view('admin-pages.products-page.add-products');
    }

    // Store new product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'size' => 'nullable|string|max:100',
            'category' => 'nullable|string|max:100',
            'brand' => 'required|string|max:100',
            'manufacturer' => 'nullable|string|max:100',
            'image' => 'nullable|image|max:2048',
        ]);

        // Upload to ImgBB if image exists
        if ($request->hasFile('image')) {
            $imageData = base64_encode(file_get_contents($request->file('image')));
            $response = Http::asForm()->post('https://api.imgbb.com/1/upload', [
                'key' => env('IMGBB_API_KEY'),
                'image' => $imageData,
            ]);

            if ($response->successful()) {
                $validated['image'] = $response->json()['data']['url'];
            } else {
                return back()->with('error', 'Image upload to ImgBB failed.');
            }
        }

        Products::create($validated);

        return redirect()->route('admin.all-products')->with('success', 'Product added successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $product = Products::findOrFail($id);
        return view('admin-pages.products-page.edit-products', compact('product'));
    }

    // Update product
    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'size' => 'nullable|string|max:100',
            'category' => 'nullable|string|max:100',
            'brand' => 'required|string|max:100',
            'manufacturer' => 'nullable|string|max:100',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageData = base64_encode(file_get_contents($request->file('image')));
            $response = Http::asForm()->post('https://api.imgbb.com/1/upload', [
                'key' => env('IMGBB_API_KEY'),
                'image' => $imageData,
            ]);

            if ($response->successful()) {
                $validated['image'] = $response->json()['data']['url'];
            } else {
                return back()->with('error', 'Image upload to ImgBB failed.');
            }
        }

        $product->update($validated);

        return redirect()->route('admin.all-products')->with('success', 'Product updated successfully.');
    }

    // Delete product
    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.all-products')->with('success', 'Product deleted successfully.');
    }

    // Show all users
    public function indexUsers()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    // Toggle admin status
    public function toggleAdmin(User $user)
    {
        if (Auth::id() === $user->id) {
            return back()->with('error', 'You cannot change your own admin status.');
        }

        $user->is_admin = !$user->is_admin;
        $user->save();

        return back()->with('success', 'User admin status updated successfully.');
    }
}
