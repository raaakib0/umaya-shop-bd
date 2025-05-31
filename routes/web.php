<?php
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', [ProductsController::class, 'index']);

// Display Contact Page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Handle form submission
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin']) // ← Restrict to logged-in admins
    ->group(function () {
        Route::get('/dashboard', [ProductsController::class, 'dashboard'])->name('dashboard');
        Route::get('/all-products', [ProductsController::class, 'allProducts'])->name('all-products');

        Route::get('/add-products', [ProductsController::class, 'create'])->name('add-products');
        Route::post('/add-products', [ProductsController::class, 'store'])->name('store-products');

        Route::get('/edit-products/{id}', [ProductsController::class, 'edit'])->name('edit-products');
        Route::put('/update-products/{id}', [ProductsController::class, 'update'])->name('update-products');

        Route::delete('/delete-products/{id}', [ProductsController::class, 'destroy'])->name('delete-products');
    });
