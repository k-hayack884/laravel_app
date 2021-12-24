<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Shop;


class ShopController extends Controller
{
    public function index(){
        $area_tokyo=Area::find(1)->shops;
        dd($area_tokyo);
    }
}
