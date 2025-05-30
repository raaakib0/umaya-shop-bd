<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;


Route::get('/', [ProductsController::class, 'index']);

Route::get('/login', function () {
    return view('accounts.login');
});

Route::prefix('admin')->name('admin.')->group(function () {
    // Route::get('/admin', [ProductsController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/dashboard', [ProductsController::class, 'dashboard'])->name('dashboard');
    Route::get('/all-products', [ProductsController::class, 'allProducts'])->name('all-products');
    
    Route::get('/add-products', [ProductsController::class, 'create'])->name('add-products');
    Route::post('/add-products', [ProductsController::class, 'store'])->name('store-products');

    // Correct dynamic route for editing
    Route::get('/edit-products/{id}', [ProductsController::class, 'edit'])->name('edit-products');
    Route::put('/update-products/{id}', [ProductsController::class, 'update'])->name('update-products');

    // Correct dynamic route for deleting
    Route::delete('/delete-products/{id}', [ProductsController::class, 'destroy'])->name('delete-products');
});


// Resource routes for products (CRUD)
Route::resource('products', ProductsController::class);
