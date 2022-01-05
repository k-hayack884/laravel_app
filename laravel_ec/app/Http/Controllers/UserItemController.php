<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class UserItemController extends Controller
{
    public function index(){
        $products=Product::all();
        return view('user.index');
    }
}
