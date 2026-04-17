<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Site\SiteController;
use App\Http\Controllers\Api\Admin\AuthController;
use App\Http\Controllers\Api\Admin\ChefController;
use App\Http\Controllers\Api\Admin\MealController;
use App\Http\Controllers\Api\Admin\ServiceController;
use App\Http\Controllers\Api\Admin\CategoryController;

//admin
Route::prefix('admin')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);

        Route::get('services', [ServiceController::class, 'index']);
        Route::Post('services', [ServiceController::class, 'create']);
        Route::put('services/{service}', [ServiceController::class, 'update']);
        Route::delete('services/{service}', [ServiceController::class, 'destroy']);

        Route::get('categories', [CategoryController::class, 'index']);
        Route::Post('categories', [CategoryController::class, 'create']);
        Route::put('categories/{category}', [CategoryController::class, 'update']);
        Route::delete('categories/{category}', [CategoryController::class, 'destroy']);

        Route::get('meals', [MealController::class, 'index']);
        Route::Post('meals', [MealController::class, 'create']);
        Route::post('meals/{meal}', [MealController::class, 'update']);
        Route::delete('meals/{meal}', [MealController::class, 'destroy']);

        Route::get('chefs', [ChefController::class, 'index']);
        Route::Post('chefs', [ChefController::class, 'create']);
        Route::Post('chefs/{chef}', [ChefController::class, 'update']);
        Route::delete('chefs/{chef}', [ChefController::class, 'destroy']);
    });
});

//site
Route::prefix('site')->middleware('auth:sanctum')->group(function () {

    Route::get('index', [SiteController::class, 'index']);
        // Route::get('menu', [SiteController::class, 'menu']);
        // Route::get('about', [SiteController::class, 'about']);
        // Route::get('blog', [SiteController::class, 'blog']);
        // Route::get('blog_single', [SiteController::class, 'blog_single']);
        // Route::get('service', [SiteController::class, 'service']);
        // Route::get('contact', [SiteController::class, 'contact']);
        // Route::post('contact-data', [SiteController::class, 'contact_data']);
});
