<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Node\Block\Document;

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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();
Auth::routes(['verify' => true]);

Route::view('body','layouts.body');

Route::resource('admin/documents', AdminController::class)->middleware(['auth', 'IsAdmin']);
Route::resource('admin/users', UserController::class)->middleware(['auth', 'IsAdmin']);
Route::get('documents/{id}', [AdminController::class, 'show'])->name('documents.show');
Route::get('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');



//Route::resource('accueil', DocumentController::class);

Route::group(['prefix'=>'etudiant','as'=>'etudiant.' ,'middleware' => ['auth','IsUser','verified']],function () {
    Route::resource('accueil', DocumentController::class);
    Route::resource('profile', StudentController::class);
    Route::get('documents/{id}', [DocumentController::class, 'show'])->name('documents.show');
    Route::get('document/{id}', [studentController::class, 'destroy'])->name('document.destroy');
});
Route::get('/etudiant/privacy', function () {
    return view('layouts/user/privacy');
})->name('etudiant.privacy');

Route::get('download/{id}', [DocumentController::class, 'download'])->name('download');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/welcome', 'WelcomeController@index')->name('welcome');
