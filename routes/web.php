<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OrderController;


Route::get('/', [ProductsController::class, 'index']);
Route::get('/product/{id}', [ProductsController::class, 'show'])->name('product.show');

// Display Contact Page
Route::get('/contact', function () {
    return view ('contact');
})->name('contact');

// Handle form submission
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/order', [OrderController::class, 'showForm'])->name('order.form');
Route::post('/order', [OrderController::class, 'store'])->name('order.submit');
Route::get('/order/thankyou', [OrderController::class, 'thankYou'])->name('order.thankyou');

Route::get('/product/{id}/order', [OrderController::class, 'showOrderForm'])->name('product.order.form');
Route::post('/product/{id}/order', [OrderController::class, 'submitOrder'])->name('product.order.submit');


Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth']) // ← Restrict to logged-in admins
    ->group(function () {
        Route::get('/dashboard', [ProductsController::class, 'dashboard'])->name('dashboard');
        Route::get('/all-products', [ProductsController::class, 'allProducts'])->name('all-products');

        Route::get('/add-products', [ProductsController::class, 'create'])->name('add-products');
        Route::post('/add-products', [ProductsController::class, 'store'])->name('store-products');

        Route::get('/edit-products/{id}', [ProductsController::class, 'edit'])->name('edit-products');
        Route::put('/update-products/{id}', [ProductsController::class, 'update'])->name('update-products');

        Route::delete('/delete-products/{id}', [ProductsController::class, 'destroy'])->name('delete-products');

        Route::get('/orders', [OrderController::class, 'adminOrders'])->name('orders');
        // Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
        Route::patch('/orders/{id}', [OrderController::class, 'update'])->name('status.update');


        Route::get('/users', [ProductsController::class, 'indexUsers'])->name('users.index');
        Route::patch('/users/{user}/toggle-admin', [ProductsController::class, 'toggleAdmin'])->name('users.toggle');

        Route::get('/contact-message', [ContactController::class, 'index'])->name('contact-message.index');
        

    });
