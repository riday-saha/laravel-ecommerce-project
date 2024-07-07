<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;



route::get('/',[UserController::class,'home'])->name('home');
route::get('/dashboard',[UserController::class,'dashboard'])->middleware(['auth', 'verified','user'])->name('dashboard');



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


//user views

