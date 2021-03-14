<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\CustomerData;
use App\Models\customerDeleted;
use App\Models\customerDeleted as ModelsCustomerDeleted;
use App\Models\phone;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countCustomers = CustomerData::distinct()->select('cname')->get()->count(); //GET COUNT OF ROWS DATABASE
        $countOrders = CustomerData::get()->count();
        $countMeter = CustomerData::sum('meter');
        $countDeleted = customerDeleted::get()->count();
        $lastDelorder = customerDeleted::get();
        $AllTable = CustomerData::select('id','cname','meter')->distinct()->limit('5')->orderBy('id','DESC')->get();
        $Today = CustomerData::whereDate('created_at','=', now())->sum('meter');
        $LastComment = comment::orderBy('id','DESC')->limit('5')->get();
        // $AllTable = customerDeleted::limit('5')->get();
        return view('home')->with([
            'countCustomers'=>$countCustomers,
            'countOrders'=>$countOrders,
            'countDeleted'=>$countDeleted,
            'countMeter'=>$countMeter,
            'AllTable'=>$AllTable,
            'lastDelorder'=>$lastDelorder,
            'today'=>$Today,
            'LastComment'=>$LastComment,
        ]);
    }

    public function get(){

        //    $data =  User::with('phone')->find('15');
        $data = phone::with('user')->find(1);
        // $data->makeVisible(['user_id']);
        //    $data = phone::with(User)->find('1');
        //  $user = User::all();
        //  return $data;
        return response()->json($data);
        }
}
