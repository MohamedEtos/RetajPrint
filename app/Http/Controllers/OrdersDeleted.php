<?php

namespace App\Http\Controllers;

use App\Models\OrderDeleted;
use Illuminate\Http\Request;

class OrdersDeleted extends Controller
{
    public function RecycleBin(){
        $comedata = OrderDeleted::all();
        return view('RecycleBin')->with('comeData',$comedata);
    }

    public function restore(Request $request,$orderId){
        OrderDeleted::where('id','=',$orderId)->delete();
        $comedata = OrderDeleted::all();
        return view('RecycleBin')->with('comeData',$comedata);
    }
}
