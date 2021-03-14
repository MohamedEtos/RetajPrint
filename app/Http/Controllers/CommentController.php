<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    // public function NewComment (){
    //     return view('NewComment');
    //   }
    // public function StoreComment (Request $request){
    //     $request->validate([
    //           'newcomment'=>'required|min:5'
    //           ]);

    //         comment::create([
    //             'comment'=>$request->newcomment,
    //             'EmpCommet'=>Auth::User()->name
    //             ]);
    //             return redirect()->back()->with('CommentSuc','The Comment Has Been Added');
    // }



    public function NewComment (){
        return view('NewComment');
    }


    public function StoreComment (Request $request){
    $request->validate([
        'newcomment'=>'required|min:1'
    ]);



    $create = comment::create([
        'comment'=>$request->newcomment,
        'EmpCommet'=>Auth::User()->name
    ]);

    if($create){
        return response()->json([
            'MSG'=>'The Comment Has Been Added Successfly'
        ]);
    }else{
        return response()->json([
            'MSG'=>'Error Plase Try Again'
        ]);
    }

    }




}
