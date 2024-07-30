<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\Api\CategoriesController;
// Route::get('/categories', [CategoriesController::class, 'index']);
// Route::get('/categories/{id}', [CategoriesController::class, 'show']);
// Route::post('/categories', [CategoriesController::class, 'store']);
// Route::put('/categories/{id}', [CategoriesController::class, 'update']);
// Route::delete('/categories/{id}', [CategoriesController::class, 'destroy']);

// 1 dòng này bằng 5 dòng bên trên (Lưu ý)
Route::resource('categories', CategoriesController::class);

use App\Http\Controllers\Api\ProductsController;
Route::resource('products', ProductsController::class);

use App\Http\Controllers\Api\BrandsController;
Route::resource('brands', BrandsController::class);