<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductsController;
use App\Http\Controllers\Client\UsersController;
use App\Http\Controllers\Client\CartsController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\BrandsController as AdminBrandsController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\ProductsController as AdminProductsController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Client\OrdersController;
use App\Http\Middleware\EnsureCartIsAccessedByAuthenticatedUser;
use App\Http\Controllers\Client\LocaleController;

Route::prefix('/')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::match(['get', 'post'], '/login', [UsersController::class, 'login'])->name('login');
    Route::match(['get', 'post'], '/register', [UsersController::class, 'register'])->name('register');
});
Route::prefix('/products')->group(function () {
    Route::get('', [ProductsController::class, 'index'])->name('products');
    Route::get('/{id}', [ProductsController::class, 'show']);
});
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');

Route::middleware(EnsureCartIsAccessedByAuthenticatedUser::class)->group(function () {
    Route::get('/cart', [CartsController::class, 'index'])->name('cart');
    Route::post('/cart', [CartsController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove', [CartsController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update-quantity', [CartsController::class, 'updateQuantity'])->name('cart.updateQuantity');
});

Route::prefix('/orders')->group(function () {
    Route::get('', [OrdersController::class, 'index'])->name('orders');
    Route::get('/{id}', [OrdersController::class, 'show']);
});

Route::prefix('/admin')->group(function () {
    Route::get('', [AdminHomeController::class, 'index'])->name('admin.home');

    //products
    Route::get('/products', [AdminProductsController::class, 'index'])->name('admin.products.index');
    Route::match(['get', 'post'], '/products/create', [AdminProductsController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}', [AdminProductsController::class, 'show'])->name('admin.products.show');
    Route::match(['get', 'post'], '/products/{id}/edit', [AdminProductsController::class, 'edit'])->name('admin.products.edit');
    Route::get('/products/{id}/delete', [AdminProductsController::class, 'destroy'])->name('admin.products.destroy');

    //categories
    Route::get('/categories', [AdminCategoriesController::class, 'index'])->name('admin.categories.index');
    Route::post('/categories', [AdminCategoriesController::class, 'store'])->name('admin.categories.store');
    Route::match(['get', 'post'], '/categories/{id}', [AdminCategoriesController::class, 'edit'])->name('admin.categories.edit');
    Route::get('/categories/{id}/delete', [AdminCategoriesController::class, 'destroy'])->name('admin.categories.destroy');

    //brands
    Route::get('/brands', [AdminBrandsController::class, 'index'])->name('admin.brands.index');
    Route::post('/brands', [AdminBrandsController::class, 'store'])->name('admin.brands.store');
    Route::match(['get', 'post'], '/brands/{id}', [AdminBrandsController::class, 'edit'])->name('admin.brands.edit');
    Route::get('/brands/{id}/delete', [AdminBrandsController::class, 'destroy'])->name('admin.brands.destroy');

    //users
    Route::get('/users', [AdminUsersController::class, 'index'])->name('admin.users');
});

//multi language
Route::get('/locale/{lang}', [LocaleController::class, 'setLocale']);