<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use InterventionImage;
use App\Http\Requests\UploadImageRequest;
use App\Services\ImageService;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');
        $this->middleware(function ($request, $next) {
            //dd($request->route()->parameter('shop'));//文字絵r津
            //dd(Auth::id());//数字
            $id = $request->route()->parameter('shop'); //直接入力した数字
            if (!is_null($id)) {
                $shopsOwnerId = Shop::findOrFail($id)->owner->id;
                $shopId = (int)$shopsOwnerId;
                $ownerId = Auth::id(); //ログインしているオーナーの数字
                if ($shopId !== $ownerId) {
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
        $shop = Shop::findOrFail($id);
        return view('owner.shops.edit', compact('shop'));
    }
    public function update(UploadImageRequest $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'information' => ['required', 'string', 'max:255'],
            'is_selling' => ['required'],
        ]);
        $imageFile = $request->image; //一時保存
        if (!is_null($imageFile) && $imageFile->isValid()) {
           $fileNameToStore= ImageService::upload($imageFile,'shops');
            //Storage::putFile('public/shops', $imageFile);リサイズナシ
            // $fileName = uniqid(rand() . '_');
            // $extension = $imageFile->extension();
            // $fileNameToStore = $fileName . '.' . $extension;
            // $resizedImage = InterventionImage::make($imageFile)->resize(1920, 1080)->encode();
            // Storage::put('public/shops/' . $fileNameToStore, $resizedImage);
        }

        $shop = Shop::findOrFail($id);
        $shop->name = $request->name;
        $shop->information= $request->information;
        $shop->is_selling = $request->is_selling;
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $shop->filename=$fileNameToStore;
        }
        $shop->save();
        return redirect()->route('owner.shops.index')
        ->with([
            'message' => '我が書き換えたのだ',
            'status' => 'info'
        ]);;
    }
}
