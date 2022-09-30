<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home',[HomeController::class,'index'])->name('index');
Route::get('/show/{list}',[HomeController::class,'showList'])->name('show.list');
Route::get('/?tag={tag}',[HomeController::class,'showListWithTag'])->name('show.list.tag');
Route::get('/myPosts',[ListingController::class,'UserPosts'])->name('user.posts');
Route::get('/creatPost',[ListingController::class,'create'])->name('create.list');
Route::post('/savePost',[ListingController::class,'store'])->name('save.post');
