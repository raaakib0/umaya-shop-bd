<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {

// if(!Storage::exists('data/products.json')){
//     dd('file not found');
// }
    $json=Storage::get('data/products.json');
    $products = json_decode($json,true);
    return view('home', compact('products'));

});

Route::get('/login',function(){
    return view('login');
});

Route::view('/admin','admin-pages.admin');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin-pages.dashboard');
    })->name('dashboard');

    Route::get('/all-products', function () {
        return view('admin-pages.products-page.all-products');
    })->name('dashall-productsboard');

    Route::get('/add-products', function () {
        return view('admin-pages.products-page.add-products');
    })->name('add-products');

    Route::get('/edit-products', function () {
        return view('admin-pages.products-page.edit-products');
    })->name('edit-products');
});