<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\TagController;

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

Route::get('/', [MemoController::class, 'index'])->name('index')->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('memos', MemoController::class)->only(['index', 'store', 'update', 'destroy',])->middleware('auth');

Route::post('/memos/{memo}/attach-tags', [App\Http\Controllers\MemoController::class, 'attachTags'])->name('memos.attachTags');

Route::resource('tags', TagController::class)->only(['store', 'update', 'destroy'])->middleware('auth');

Route::get('tag/{tag}', [App\Http\Controllers\MemoController::class, 'tagFilter'])->name('memo.tagFilter');
