<?php

use App\Models\Service;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\MealController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CategoryController;


Route::get('/', function () {
    return view('welcome');
});


require __DIR__ . '/auth.php';

Route::get('/dashboard', [AdminController::class, 'index'])->middleware('auth')->name('dashboard');

Route::prefix('dashboard')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('services', ServiceController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('meals', MealController::class);
    Route::resource('chefs', ChefController::class);
});

Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('menu',[SiteController::class,'menu'])->name('site.menu');
Route::get('about',[SiteController::class,'about'])->name('site.about');
Route::get('blog',[SiteController::class,'blog'])->name('site.blog');
Route::get('blog_single',[SiteController::class,'blog_single'])->name('site.blog_single');
Route::get('service',[SiteController::class,'service'])->name('site.service');
Route::get('contact',[SiteController::class,'contact'])->name('site.contact');
Route::post('contact-data', [SiteController::class, 'contact_data'])->name('site.contact_data');




