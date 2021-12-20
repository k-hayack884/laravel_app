<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BoughtItemsController extends Controller
{
    public function showBoughtItems(){
        $user=Auth::user();
        $items=$user->boughtItems()->ouderBy('id','DESC')->get();

        return view('mypage.bought_items')
        ->with('items',$items);
    }
}
