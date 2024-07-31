<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;



route::get('/',[UserController::class,'home'])->name('home');
route::get('/dashboard',[UserController::class,'dashboard'])->middleware(['auth', 'verified','user'])->name('dashboard');
route::get('/add_cart',[UserController::class,'add_cart'])->middleware(['auth', 'verified','user'])->name('add.cart');
route::get('/my_cart/{id}',[UserController::class,'my_cart'])->middleware(['auth', 'verified','user'])->name('my.cart');
route::get('/my_cart/remove/{id}',[UserController::class,'remove_cart'])->middleware(['auth', 'verified','user'])->name('remove.cart');
route::post('/my_cart/form_cart',[UserController::class,'form_cart'])->middleware(['auth', 'verified','user'])->name('form.cart');
route::get('/all-orders',[UserController::class,'order'])->middleware(['auth', 'verified','user'])->name('order');
route::get('/product-details/{id}',[UserController::class,'product_details'])->middleware(['auth', 'verified','user'])->name('product.details');








Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//route for admin (category related)
route::get('/admin/dashboard',[AdminController::class,'dashboard'])->middleware(['auth','admin']) ->name('admin.dashboard');
route::get('/admin/category',[AdminController::class,'category'])->middleware(['auth','admin']) ->name('admin.category');
route::post('/admin/category/add',[AdminController::class,'add_category'])->middleware(['auth','admin']) ->name('add.category');
route::get('/admin/category/edit/{id}',[AdminController::class,'edit_category'])->middleware(['auth','admin']) ->name('edit.category');
route::post('/admin/category/update/{id}',[AdminController::class,'update_category'])->middleware(['auth','admin']) ->name('update.category');
route::get('/admin/category/delete/{id}',[AdminController::class,'delete_category'])->middleware(['auth','admin']) ->name('delete.category');

//route for admin (Product related)
route::get('/admin/add_product',[AdminController::class,'add_product'])->middleware(['auth','admin']) ->name('add.product');
route::post('/admin/store_product',[AdminController::class,'store_product'])->middleware(['auth','admin']) ->name('store.product');
route::get('/admin/all_product',[AdminController::class,'all_product'])->middleware(['auth','admin']) ->name('all.product');
route::get('/admin/edit_product/{id}',[AdminController::class,'edit_product'])->middleware(['auth','admin']) ->name('edit.product');
route::post('/admin/update_product/{id}',[AdminController::class,'update_product'])->middleware(['auth','admin']) ->name('update.product');
route::get('/admin/delete_product/{id}',[AdminController::class,'delete_product'])->middleware(['auth','admin']) ->name('delete.product');
route::get('/admin/all-order',[AdminController::class,'all_order'])->middleware(['auth','admin']) ->name('all.order');
route::get('/admin/delivered/{id}',[AdminController::class,'delivered'])->middleware(['auth','admin']) ->name('admin.delivered');
route::get('/admin/on_way/{id}',[AdminController::class,'Onway'])->middleware(['auth','admin']) ->name('admin.onway');
route::get('/admin/print_pdf/{id}',[AdminController::class,'print_pdf'])->middleware(['auth','admin']) ->name('print.pdf');

