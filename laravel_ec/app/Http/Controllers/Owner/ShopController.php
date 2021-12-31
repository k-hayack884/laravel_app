<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');
        $this->middleware(function($request,$next){
            //dd($request->route()->parameter('shop'));//文字絵r津
            //dd(Auth::id());//数字
            $id=$request->route()->parameter('shop'); //直接入力した数字
            if(!is_null($id)){
                $shopsOwnerId=Shop::findOrFail($id)->owner->id;
                $shopId=(int)$shopsOwnerId;
                $ownerId=Auth::id();//ログインしているオーナーの数字
                if($shopId!==$ownerId){
                    abort(404);
                }
            }
            return $next($request);
        });
    }
    public function index()
    {
        //$ownerId = Auth::id();
        $shops = Shop::where('owner_id', Auth::id())->get();

        return view('owner.shops.index', compact('shops'));
    }
    public function edit($id)
    {
        return view('owner.shops.index', compact('shops'));
    }
    public function update(Request $request, $id)
    {
    }
}
