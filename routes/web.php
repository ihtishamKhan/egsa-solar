<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();



//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

// Users Routes
Route::group(['prefix' => 'employees', 'as' => 'employees.', 'middleware' => 'auth'], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'leads', 'as' => 'leads.', 'middleware' => 'auth'], function () {
    Route::get('/', [LeadController::class, 'index'])->name('index');
    Route::get('/create', [LeadController::class, 'create'])->name('create');
    Route::post('/store', [LeadController::class, 'store'])->name('store');
    Route::get('/show/{uuid}', [LeadController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [LeadController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [LeadController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [LeadController::class, 'destroy'])->name('destroy');

    Route::get('/kanban', [LeadController::class, 'kanban'])->name('kanban');

    Route::post('/import', [LeadController::class, 'import'])->name('import');

    Route::get('/site-survey/{uuid}', [LeadController::class, 'siteSurvey'])->name('siteSurvey');
    Route::put('/site-survey/{uuid}', [LeadController::class, 'siteSurveyUpdate'])->name('siteSurveyUpdate');

    Route::get('/products/{uuid}', [LeadController::class, 'products'])->name('products');
    Route::post('/add-products/{uuid}', [LeadController::class, 'addProducts'])->name('addProducts');

    Route::get('/files/{uuid}', [LeadController::class, 'files'])->name('files');
    Route::post('/add-files/{uuid}', [LeadController::class, 'addFiles'])->name('addFiles');

    Route::get('/notes/{uuid}', [LeadController::class, 'notes'])->name('notes');
    Route::post('/add-notes/{uuid}', [LeadController::class, 'addNotes'])->name('addNotes');
});

Route::group(['prefix' => 'products', 'as' => 'products.', 'middleware' => 'auth'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::get('/show/{id}', [ProductController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'projects', 'as' => 'projects.', 'middleware' => 'auth'], function () {
    Route::get('/', [ProjectController::class, 'index'])->name('index');
    Route::get('/create', [ProjectController::class, 'create'])->name('create');
    Route::post('/store', [ProjectController::class, 'store'])->name('store');
    Route::get('/show/{id}', [ProjectController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [ProjectController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [ProjectController::class, 'destroy'])->name('destroy');

    Route::post('/sort', [ProjectController::class, 'sortProject'])->name('sort');
});

Route::group(['prefix' => 'tasks', 'as' => 'tasks.', 'middleware' => 'auth'], function () {
    Route::get('/', [TaskController::class, 'index'])->name('index');
    Route::get('/create', [TaskController::class, 'create'])->name('create');
    Route::post('/store', [TaskController::class, 'store'])->name('store');
    Route::get('/show/{id}', [TaskController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [TaskController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [TaskController::class, 'destroy'])->name('destroy');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');
// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');