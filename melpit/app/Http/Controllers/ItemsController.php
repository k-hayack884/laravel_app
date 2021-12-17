<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class ItemsController extends Controller
{
    public Function showItems(Request $request){
        $items = Item::orderByRaw("FIELD(state, '" . Item::STATE_SELLING . "', '" . Item::STATE_BOUGHT . "')")
            ->orderBy('id', 'DESC')
        ->paginate(52);
    return view('items.items')
        ->with('items',$items);
    }
    public function shoWItemDetail(Item $item){
        return view('items.item_detail')
        ->with('item',$item);
    }

}
