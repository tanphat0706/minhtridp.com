<?php

namespace App\Http\Controllers;
use App\Categories;
use App\Order;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = Categories::where('status',1)->get();
        return view('welcome',compact('cates'));
    }
    public function admin()
    {
        return view('admin');
    }
    public function mypage(){
        $orders = Order::where('user_id',\Auth::user()->id)->get();
        return view('mypage',compact('orders'));
    }
}
