<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use App\Models\Product;
use App\Models\SecondaryCategory;
use App\Models\Owner;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');
        $this->middleware(function ($request, $next) {

            $id = $request->route()->parameter('product'); //直接入力した数字
            if (!is_null($id)) {
                $productsOwnerId = Product::findOrFail($id)->shop->owner->id;
                $productId = (int)$productsOwnerId;
                if ($productId !== Auth::id()) {
                    abort(404);
                }
            }
            return $next($request);
        });
    }

    public function index()
    {
        // $products=Owner::findOrFail(Auth::id())->shop->product;
        $ownerInfo=Owner::with('shop.product.imageFirst')
        ->where('id',Auth::id())->get();
        // dd($OwnerInfo);
        // foreach($ownerInfo as $owner){
        //     foreach($owner->shop->product as $product){
        //         $product->imageFirst->filename;
        //     }
        // }
        return view('owner.products.index', compact('ownerInfo'));
    }
}
