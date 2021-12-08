<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/create/{update?}', [CommentController::class, 'showCreateForm']);
Route::post('/create', [CommentController::class, 'createComment'])->name('create');
Route::get('/comments', [CommentController::class, 'showComments']);

Route::get('/delete/{id}', [CommentController::class, 'delete'])->name('delete');
Route::get('/create/{update?}/{updateId}', [CommentController::class, 'showUpdateForm'])->name('showUpdateForm');
// Route::get('/update/{updateId}', [CommentController::class, 'showUpdateForm'])->name('showUpdateForm');
Route::put('/update/{id}', [CommentController::class, 'update'])->name('update');
