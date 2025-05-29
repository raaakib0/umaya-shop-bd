<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

// Route::get('/', function () {
//     $json=Storage::get('data/products.json');
//     $products = json_decode($json,true);
//     return view('home', compact('products'));
// });

Route::get('/', [ProductsController::class, 'index']);

Route::get('/login', function () {
    return view('accounts.login');
});

// Route::view('/admin', 'admin-pages.admin');

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [ProductsController::class, 'dashboard'])->name('dashboard');

    Route::get('/all-products', [ProductsController::class, 'allProducts'])->name('all-products');

    Route::get('/add-products', function () {
        return view('admin-pages.products-page.add-products');
    })->name('add-products');

    Route::get('/edit-products', function () {
        return view('admin-pages.products-page.edit-products');
    })->name('edit-products');

    Route::get('/delete-products', [ProductsController::class, 'deleteProducts'])->name('delete-products');
});

// Resource routes for products (CRUD)
Route::resource('products', ProductsController::class);
