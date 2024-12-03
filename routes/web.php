<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', [HomeController::class, 'login_home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);

route::get('view_category', [AdminController::class, 'view_category'])->middleware(['auth', 'admin']);

route::post('add_category', [AdminController::class, 'add_category'])->middleware(['auth', 'admin']);

route::get('delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(['auth', 'admin']);

route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->middleware(['auth', 'admin']);

route::post('update_category/{id}', [AdminController::class, 'update_category'])->middleware(['auth', 'admin']);

route::get('add_product', [AdminController::class, 'add_product'])->middleware(['auth', 'admin']);

route::post('upload_product', [AdminController::class, 'upload_product'])->middleware(['auth', 'admin']);

route::get('view_product', [AdminController::class, 'view_product'])->middleware(['auth', 'admin']);

route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth', 'admin']);

route::get('edit_product/{id}', [AdminController::class, 'edit_product'])->middleware(['auth', 'admin']);

route::post('update_product/{id}', [AdminController::class, 'update_product'])->middleware(['auth', 'admin']);

route::get('search_product', [AdminController::class, 'search_product'])->middleware(['auth', 'admin']);

route::get('product_details/{id}', [HomeController::class, 'product_details']);

route::get('add_to_cart/{id}', [HomeController::class, 'add_to_cart'])->middleware(['auth', 'verified']);

route::get('my_cart', [HomeController::class, 'my_cart'])->middleware(['auth', 'verified']);

route::delete('/cart_remove/{id}', [HomeController::class, 'cart_remove'])->middleware(['auth', 'verified']);

route::post('/place_order', [HomeController::class, 'place_order'])->middleware(['auth', 'verified']);

route::get('view_order', [AdminController::class, 'view_order'])->middleware(['auth', 'admin']);

//Route header
route::get('/shop', [HomeController::class, 'shop']);
route::get('/why', [HomeController::class, 'why']);
route::get('/testi', [HomeController::class, 'testi']);
route::get('/contact', [HomeController::class, 'contact']);
