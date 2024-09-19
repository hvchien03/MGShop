<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CategoriesController;

use App\Http\Middleware\EnsureCartIsAccessedByAuthenticatedUser;

Route::prefix('/admin')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('admin.home');

    //products
    Route::prefix('/products')->group(function () {
        Route::get('', [ProductsController::class, 'index'])->name('admin.products.index');
        Route::match(['get', 'post'], '/create', [ProductsController::class, 'store'])->name('admin.products.store');
        Route::get('/{id}', [ProductsController::class, 'show'])->name('admin.products.show');
        Route::match(['get', 'post'], '/{id}/edit', [ProductsController::class, 'edit'])->name('admin.products.edit');
        Route::get('/{id}/delete', [ProductsController::class, 'destroy'])->name('admin.products.destroy');
    });

    //categories
    Route::prefix('/categories')->group(function () {
        Route::get('', [CategoriesController::class, 'index'])->name('admin.categories.index');
        Route::post('', [CategoriesController::class, 'store'])->name('admin.categories.store');
        Route::match(['get', 'post'], '/{id}/edit', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
        Route::get('/{id}/delete', [CategoriesController::class, 'destroy'])->name('admin.categories.destroy');
    });

    //brands
    Route::prefix('/brands')->group(function () {
        Route::get('', [BrandsController::class, 'index'])->name('admin.brands.index');
        Route::post('', [BrandsController::class, 'store'])->name('admin.brands.store');
        Route::match(['get', 'post'], '/{id}/edit', [BrandsController::class, 'edit'])->name('admin.brands.edit');
        Route::get('/{id}/delete', [BrandsController::class, 'destroy'])->name('admin.brands.destroy');
    });

    //users
    Route::get('/users', [UsersController::class, 'index'])->name('admin.users');
});