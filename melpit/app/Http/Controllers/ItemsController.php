<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class ItemsController extends Controller
{
    public Function showItems(Request $request){
        $query=Item::query();
        if($request->filled('category')){
            list($categoryType,$categoryID)=explode(':',$request->input('category'));
            if($categoryType==='primary'){
                $query->whereHas('secondaryCategory',function($query)use($categoryID){
                    $query->where('primary_category_id',$categoryID);     
                });
            }elseif($categoryType==='secondary'){
                $query->where('seondary_category_id',$categoryID);
            }
        }
        if($request->filled('keyword')){
            $keyword='%'.$this->escape($request->input('keyword')).'%';
            $query->where(function($query)use($keyword){
                $query->where('name','LIKE',$keyword);
                $query->orWhere('description','LIKE',$keyword);

            });
        }




        $items = $query->orderByRaw( "FIELD(state, '" . Item::STATE_SELLING . "', '" . Item::STATE_BOUGHT . "')" )
            ->orderBy('id', 'DESC')
        ->paginate(52);
    return view('items.items')
        ->with('items',$items);
    }
    private function escape(string $value){
        return str_replace(
            ['\\','%','_'],
            ['\\\\','\\%','\\_'],
            $value
        );
    }
    public function shoWItemDetail(Item $item){
        return view('items.item_detail')
        ->with('item',$item);
    }

}
