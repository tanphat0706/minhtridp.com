<?php

namespace App\Http\Controllers;
use App\Categories;
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
}
