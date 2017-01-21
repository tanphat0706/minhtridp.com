<?php

namespace App\Http\Controllers;

use App\Order;
use App\Property;
use Illuminate\Support\Facades\Auth;
use App\PropertyDetail;
use Illuminate\Http\Request;
use App\Http\Requests;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model_detail = new PropertyDetail();
        $property = Property::get(['id', 'name']);
        $property_detail = PropertyDetail::get(['id', 'name', 'property_id']);
        return view('product.create', compact('property', 'property_detail', 'model_detail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        dd($input);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function bao_gia(Request $request)
    {
        $param = $request->all();
        $order = [];
        if (Auth::user()) {
            $code = 'ODFD' . substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 6)), 0, 6);
            $order['user_id'] = Auth::user()->id;
            $order['order_code'] = $code;
            $order['content'] = $param['product_name'] . ' - ' . $param['option1'] . ' - ' . $param['option2'] . ' - ' . $param['qty'].' cái';
            Order::create($order);
            \Session::flash('message', 'Chúng tôi sẽ phản hồi quý khách trong vòng 24h, vui lòng vào trang cá nhân để kiểm tra trạng thái !');
            return redirect()->back();
        } else {
            \Session::flash('error', 'Vui lòng đăng nhập trước khi yêu cầu báo giá !');
            return redirect()->back();
        }
    }
}
