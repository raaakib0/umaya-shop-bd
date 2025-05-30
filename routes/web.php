<?php
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductsController::class, 'index']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [ProductsController::class, 'dashboard'])->name('dashboard');
    Route::get('/all-products', [ProductsController::class, 'allProducts'])->name('all-products');

    Route::get('/add-products', [ProductsController::class, 'create'])->name('add-products');
    Route::post('/add-products', [ProductsController::class, 'store'])->name('store-products');

    Route::get('/edit-products/{id}', [ProductsController::class, 'edit'])->name('edit-products');
    Route::put('/update-products/{id}', [ProductsController::class, 'update'])->name('update-products');

    Route::delete('/delete-products/{id}', [ProductsController::class, 'destroy'])->name('delete-products');
});
