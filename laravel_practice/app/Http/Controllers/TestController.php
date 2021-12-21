<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\DB;
class TestController extends Controller
{
    public function index(){
        $values=Test::all();
        $test=DB::table('tests')->get();
        //dd($test);
        return view('tests.test',compact('values'));
    }
}
