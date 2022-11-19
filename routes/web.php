<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TaskController;
use App\Models\Author;

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

// Route::get('/', function () {
//   return view('welcome');
// });
// Route::get('/', [AuthorController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\TaskController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
  Route::get('home', [HomeController::class, 'index'])->name('home');

  Route::resource('authors', AuthorController::class);
  Route::resource('books', BookController::class);
});
Route::resource('tasks', TaskController::class);
Route::get('/edit-task/{id}', [TaskController::class, 'edit']);
Route::put('/update-task', [TaskController::class, 'update']);
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
