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