<?php

namespace App\Http\Controllers;

use App\Models\CustomerData;
use App\Models\customerdataACH;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function orderAddView()
    {
        $comeData = CustomerData::distinct()->select('cname')->get(); // to git solo row dublicated
        return view('addorder')->with('comeData', $comeData);
    }
    public function storeOrder(Request $request)
    {

        //MANUAL VALIDATE CUSTOMIZE
        // $rules = $this->getRules();
        // $validate = Validator::make($request->all(),$rules);
        // if($validate -> fails()){
        //     return redirect()->back()->withErrors($validate)->withInput();
        // }

        //FASTER VALIDATOR
        $request->validate([
            'cname' => 'required|min:2',
            'Ycopy' => 'required',
            'FileHight' => 'required',
            'meter' => 'required',
            'type' => 'required',
        ]);

        //INSERT DATA FROM MODEL
        CustomerData::create([
            'cname' => $request->cname,
            'Ycopy' => $request->Ycopy,
            'FileHight' => $request->FileHight,
            'meter' => $request->meter,
            'type' => $request->type,
            'Printer' => $request->Printer,
            'note' => $request->note,
            'EMP' => Auth::user()->name,
        ]);
        Session::flash('storedone', 'Data has been added');

        // return redirect()->back();
        return response()->json(["MSG" => "Add Order Has Been Successfly"]);


        //INSERT DATA
        // $storeData = new CustomerData;
        // $storeData->cname=$request->input('cname');
        // $storeData->meter=$request->input('meter');
        // $storeData->save();
        // return redirect()->back();

    }

    //VALIDIATOR THE INPUTS STORE
    // protected function getRules(){
    //     return $rules = [
    //         'cname'=>'required|min:3',
    //         'meter'=>'required|numeric',
    //     ];
    // }


    public function editOrder(Request $request, $orderId)
    {
        $checkid = CustomerData::find($orderId);
        if ($checkid) {
            $get = CustomerData::select('id', 'cname', 'meter')->where('id', $orderId)->first();
            $getLastUpdate = customerdataACH::select('id', 'WhoEdited', 'updated_at', 'old_id', 'cname', 'meter')->where('old_id', '=', $orderId)->orderBy('id', 'DESC')->get();
            return view('edit')->with(['get' => $get, 'getlast' => $getLastUpdate]);
        } else {
            return redirect()->back()->with(['faild' => 'This id Not Found']);
        }
    }

    public function orderUpdate(Request $request, $orderId)
    {
        CustomerData::where('id', '=', $orderId)->update([
            'cname' => $request->cname,
            'meter' => $request->meter,
            'WhoEdited' => Auth::user()->name,
        ]);
        return redirect()->back()->with(['success' => 'updated done']);
    }

    public function deleteOrderAjax(Request $request)
    {
        // CustomerData::where('id','=',$request)->delete();
        CustomerData::find($request->id)->delete();
        // return redirect()->back();
        return response()->json([
            "MSG" => "Delete Order Has Been Successfly",
            "id" => $request->id
        ]);
    }
    public function deleteOrder(Request $request, $orderId)
    {
        CustomerData::where('id', '=', $orderId)->delete();
        // CustomerData::find($request->id)->delete();
        return redirect()->back();
    }

    public function orderGetAll()
    {
        return 'action';
    }
    public function viewAllData()
    {

        $getAllData = CustomerData::select()->get();

        return view('allDataView')->with('comeData', $getAllData);
    }

    public function TotalMeter()
    {
        // $data = CustomerData::whereDate('created_at','=', now())->select('created_at')->get();
        $data = CustomerData::whereDate('created_at', '=', now())->sum('meter');

        return view('totalmeter')->with('data', $data);
    }
}
