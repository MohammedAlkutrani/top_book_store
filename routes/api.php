<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Author\AuthController as AuthorAuthController;
use App\Http\Controllers\Author\BookController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthorMiddleware;
use App\Http\Middleware\CustomerMiddleware;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login',[AuthController::class,'login']);


Route::get('customer/test',function(){
    return 'im customer';
})->middleware(['auth:sanctum',CustomerMiddleware::class]);


Route::get('admin/test',function(){
    return 'im admin';
})->middleware(['auth:sanctum',AdminMiddleware::class]);


Route::prefix('admin')->middleware(['auth:sanctum',AdminMiddleware::class])->group(function(){
    Route::apiResource('category',CategoryController::class);
    Route::apiResource('author',AuthorController::class);
    Route::put('author/{author}/approve',[AuthorController::class,'approve']);
});


Route::prefix('author')->middleware(['auth:sanctum',AuthorMiddleware::class])->group(function(){
    Route::apiResource('book',BookController::class);

});

 Route::post('author/sign-up',[AuthorAuthController::class,'signup']);


