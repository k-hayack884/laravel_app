<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\http\Requests\productRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Image;
use App\Models\Shop;
use App\Models\Product;
use App\Models\PrimaryCategory;
use App\Models\Stock;
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
    public function create()
    {
        $shops=Shop::where('owner_id',Auth::id())->select('id','name')->get();
        $images = Image::where('owner_id', Auth::id())->select('id', 'title','filename')
        ->orderBy('updated_at','desc')
        ->get();

        $categories=PrimaryCategory::with('secondary')
        ->get();
// dd($shops,$images,$categories);
        return view('owner.products.create',compact('shops','images','categories'));
    }
    
    public function store(productRequest $request){
        // dd($request);
      

        try {
            DB::transaction(function () use ($request) {
                $product = Product::create([
                    'name' => $request->name,
                    'information' => $request->information,
                    'price' => $request->price,            
                    'sort_order' =>$request->sort_order ,
                    'shop_id' =>$request->shop_id ,
                    'secondary_category_id' =>$request->category ,
                    'image1' =>$request->image1 ,
                    'image2' =>$request->image2 ,
                    'image3' => $request->image3,
                    'image4' =>$request->image4 ,
                    'is_selling' =>$request->is_selling,
        
                ]);
                Stock::create([
                    'product_id' => $product->id,
                    'type'=>1,
                    'quantity'=>$request->quantity
                ]);
            }, 2);
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }
        return redirect()->route('owner.products.index')
        ->with([
            'message' => '我が追加したのだ',
            'status' => 'info'
        ]);

    }
    public function edit($id){
        $product=Product::findOrFail($id);
        $quantity=Stock::where('product_id',$product->id)
        ->sum('quantity');

        $shops=Shop::where('owner_id',Auth::id())->select('id','name')->get();
        $images = Image::where('owner_id', Auth::id())->select('id', 'title','filename')
        ->orderBy('updated_at','desc')
        ->get();

        $categories=PrimaryCategory::with('secondary')
        ->get();
        return view('owner.products.edit',compact('product','quantity','shops','images','categories'));
    }
    public function update(productRequest $request ,$id){
        $request->validate([
            'current_quantity' => ['required', 'integer'],

        ]);
        $product=Product::findOrFail($id);
        $quantity=Stock::where('product_id',$product->id)
        ->sum('quantity');
        if($request->current_quantity !==$quantity){
            $id = $request->route()->parameter('product');
            return redirect()->route('owner.products.edit',['product'=>$id])
            ->with([
                'message' => '何い!!在庫数を書き換えただとぉ!!',
                'status' => 'alert'
            ]);
        }else{
            try {
                DB::transaction(function () use ($request,$product) {

                        $product->name = $request->name;
                        $product->information =$request->information;
                        $product->price = $request->price;          
                        $product->sort_order =$request->sort_order ;
                        $product->shop_id =$request->shop_id ;
                        $product->secondary_category_id =$request->category ;
                        $product->image1 =$request->image1 ;
                        $product->image2 =$request->image2 ;
                        $product->image3 = $request->image3;
                        $product->image4 =$request->image4 ;
                        $product->is_selling =$request->is_selling;
                        $product->save();
if($request->type===\Constant::PRODUCT_LIST['add']){
    $newQuantity=$request->quantity;
}
if($request->type===\Constant::PRODUCT_LIST['reduce']){
    $newQuantity=$request->quantity*-1;
}

                    Stock::create([
                        'product_id' => $product->id,
                        'type'=>$request->type,
                        'quantity'=>$newQuantity,
                    ]);
                }, 2);
            } catch (Throwable $e) {
                Log::error($e);
                throw $e;
            }
            return redirect()->route('owner.products.index')
            ->with([
                'message' => '商品情報を書き換えたのだ',
                'status' => 'info'
            ]);
        }
    }
        
}
