<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Date;

class ItemController extends Controller
{
    public function index()
    {
       return Item::orderBy('created_at', 'desc')->get();
    }
    public function store(Request $request)
    {
        $newItem = new Item;
        $newItem->name = $request->item['name'];
        $newItem->save();

        return $newItem;
    }
    public function update(Request $request, $id)
    {
        $existingItem = Item::find($id);  

        if($existingItem){
           $existingItem->completed = $request->item['completed'] ? true : false;
           $existingItem->updated_at = Date::now() ;
           $existingItem->save();
           return $existingItem;

        } 
        return "Item not found";
    }
    public function destroy($id)
    {
        $existingItem = Item::find($id);
        if($existingItem){
           $existingItem->delete();
           return "Item deleted";
        }
        return "Item not found";
    }
}