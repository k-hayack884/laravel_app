<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPage\ProfileController;
use App\Http\Controllers\MyPage\BoughtItemsController;
use App\Http\Controllers\MyPage\SoldItemsController;
use App\Http\Controllers\sellController;
use App\Http\Controllers\itemsController;

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

Route::get('',[ItemsController::class,'showItems'])->name('top');
Route::get('items/{item}',[itemsController::class,'showItemDetail'])->name('item');

Auth::routes();


Route::middleware('auth')
->group(function(){
    Route::get('items/{item}/buy',[ItemsController::class,'showBuyItemForm'])->name('item.buy');
    Route::post('items/{item}/buy',[ItemsController::class,'buyItem'])->name('item.buy');
    Route::get('sell',[SellController::class,'showSellForm'])->name('sell');
    Route::post('sell',[SellController::class,'sellItem'])->name('sell');

});

Route::prefix('mypage')
->namespace('MyPage')
->middleware('auth')
->group(function(){
    Route::get('edit-profile',[ProfileController::class,'showProfileEditForm'] )->name('mypage.edit-profile');
    Route::post('edit-profile',[ProfileController::class,'editProfile'])->name('mypage.edit-profile');
    Route::get('bought-items',[BoughtItemsController::class,'showBoughtItems'])->name('mypage.bought-items');
    Route::get('sold-items',[SoldItemsController::class,'showSoldItems'])->name('mypage.sold-items');
});
