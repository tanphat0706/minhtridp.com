<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Response;
use Datatables;
use Auth;
use App\Http\Requests;

class OrderController extends Controller
{
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * get list users to datatables
     *
     * @param
     *            Request
     * @return Response
     */
    public function getOrderJson()
    {
        $carou = Order::select('id','title', 'img_url', 'status', 'description','created_at');
        $buttons = array();
        return Datatables::of($carou)
            ->editColumn('status', function ($carou) {
                return '<span class="flat label status-label label-' . $carou->getStatusColor() . '">' . $carou->getStatus() . '</span>';
            })
            ->addColumn('action', function ($carou) {
                $buttons = array();

                    $buttons[] = [
                        'href' => 'edit/' . e($carou->id),
                        'icon' => 'edit',
                        'type' => 'primary',
                        'label' => trans('system.edit')
                    ];

                    $formId = 'delete-Order-' . e($carou->id);
                    $buttons[] = [
                        'href' => '#' . e($carou->id),
                        'icon' => 'remove',
                        'type' => 'danger',
                        'delete' => e($carou->id),
                        'id' => $formId,
                        'route' => 'Order-del',
                        'label' => trans('system.del'),
                        'htmlOptions' => [
                            "onclick" => "confirmDelete('$formId')"
                        ]
                    ];


                $action = view('partial.action', compact('buttons'))->render();
                return (string)$action;
            })
            ->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Order.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listStatus = $this->Order->createListStatus();
        return view('Order.create',compact('listStatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carou = $request->all();
        $time = time();
        $trimSpace = str_replace(" ", "_", strtolower($carou['title']));
        $img_type = $request->file('img_url')->getClientOriginalExtension();
        $image = \Image::make($request->file('img_url')->getRealPath());
        $imageName = "img_" . $trimSpace . "_" . $time;
        $image->save(public_path('images/Order_img/' . $imageName . "." . $img_type));
        $carou['img_url'] = $imageName.".".$img_type;
        Order::create($carou);
        return redirect()->route('Order-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carou = Order::find($id);

        $listStatus = $this->Order->createListStatus();

        return view('Order.edit', compact('carou', 'listStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $carouUpdate = $request->all();
        $carou = Order::find($id);

        $carou->title = $carouUpdate['title'];
        $time = time();
        $trimSpace = str_replace(" ", "_", strtolower($carou['title']));
        $imageName = "img_" . $trimSpace . "_" . $time;
        if(isset($carouUpdate['img_url'])){
            $img_type = $request->file('img_url')->getClientOriginalExtension();
            $image = \Image::make($request->file('img_url')->getRealPath());
            $image->save(public_path('images/Order_img/' . $imageName . "." . $img_type));
//            $request->file('image_url')->move(base_path() . '/public/images/category_img/', $imageName);
            \File::delete(public_path('images/Order_img/' . $carou->img_url));
            $carou->img_url = $imageName. "." . $img_type;
        }
        $carou->status = $carouUpdate['status'];
        $carou->order_number = $carouUpdate['order_number'];
        $carou->description = $carouUpdate['description'];
        $carou->save();
        return redirect()->route('Order-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find result by id and delete
        $carou=Order::find($id);
        \File::delete(public_path('images/Order_img/' . $carou->img_url));
        $carou->delete();
        // Redirecting to index() method
        return redirect()->route('Order-list');
    }
}
