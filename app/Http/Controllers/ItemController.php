<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    
    public function index()
    {
       return Items::all();
       
    }

    
   
    public function store(Request $request)
    {
      
        $newItem = new Items;
        $newItem->name = $request->name;
        $newItem->save();

        return $newItem;
       
    }

 
    public function update(Request $request, $id)
    {
        $existingItem = Items::find($id);  

        if($existingItem){
           $existingItem->name = $request->name;
           $existingItem->save();
           return $existingItem;

        } 
        return "Item not found";
       
    }

    public function destroy($id)
    {
       
        $existingItem = Items::find($id);
        if($existingItem){
           $existingItem->delete();
           return "Item deleted";
        }
        return "Item not found";
       
    }
}