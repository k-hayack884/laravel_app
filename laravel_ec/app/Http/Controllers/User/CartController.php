<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;

class CartController extends Controller
{
    public function index(){
        $user=User::findOrFail(Auth::id());
        $products=$user->products; // 多対多のリレーション
        $totalPrice=0;

        foreach($products as $product){
            $totalPrice+=$product->price*$product->pivot->quantity;
        }
        // dd($products,$totalPrice);
        return view('user.cart',compact('products','totalPrice'));
    }

    public function add(Request $request)
    {
        $itemInCart=Cart::where('user_id',Auth::id())
        ->where('product_id',$request->product_id)
        ->first();

        if($itemInCart){
            $itemInCart->quantity+=$request->quantity;
            $itemInCart->save();
        }else{
            Cart::create([
                'user_id'=>Auth::id(),
                'product_id'=>$request->product_id,
                'quantity'=>$request->quantity


            ]);
        }

        return redirect()->route('user.cart.index');
    }
    public function delete($id)
    {
        Cart::where('product_id',$id)
        ->where('user_id',Auth::id())
        ->delete();

        return redirect()->route('user.cart.index');
    }
}
