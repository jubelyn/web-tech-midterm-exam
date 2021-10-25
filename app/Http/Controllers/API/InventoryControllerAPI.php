<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\Inventory;

class InventoryControllerAPI extends Controller
{
    public function index(){

        $inventories = Inventory::all();

        return response()->json(['inventory'=>$inventories]);
    }
}
