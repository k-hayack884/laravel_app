<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPage\ProfileController;
use App\Http\Controllers\sellController;
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
})->name('top');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')
->group(function(){
    Route::get('sell',[SellController::class,'showSellForm'])->name('sell');
});

Route::prefix('mypage')
->namespace('Mypage')
->middleware('auth')
->group(function(){
    Route::get('edit-profile',[ProfileController::class,'showProfileEditForm'] )->name('mypage.edit-profile');
    Route::post('edit-profile',[ProfileController::class,'editProfile'])->name('mypage.edit-profile');
});
