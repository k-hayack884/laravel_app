<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPage\ProfileController;
use App\Http\Controllers\MyPage\SoldItemsController;
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
Route::get('items/{item}', function () {
    return "商品詳細";
})->name('item');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')
->group(function(){
    Route::get('sell',[SellController::class,'showSellForm'])->name('sell');
    Route::post('sell',[SellController::class,'sellItem'])->name('sell');

});

Route::prefix('mypage')
->namespace('MyPage')
->middleware('auth')
->group(function(){
    Route::get('edit-profile',[ProfileController::class,'showProfileEditForm'] )->name('mypage.edit-profile');
    Route::post('edit-profile',[ProfileController::class,'editProfile'])->name('mypage.edit-profile');
    Route::get('sold-items',[SoldItemsController::class,'showSoldItems'])->name('mypage.sold-items');
});
