<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndustriesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SolutionsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| All routes are named and point to controllers (never inline closures
| with content baked in), per the project's controller architecture.
| Blade views reference these exclusively via route() helpers, so URL
| structure can change later without touching any view file.
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/solutions', [SolutionsController::class, 'index'])->name('solutions');
Route::get('/industries', [IndustriesController::class, 'index'])->name('industries');
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
Route::get('/careers', [CareersController::class, 'index'])->name('careers');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
