<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
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
        $order = Order::select('order_feedback.id','users.name as customer', 'order_code', 'content', 'order_feedback.status','result','comment','order_feedback.created_at','order_feedback.updated_at')
            ->leftJoin('users', 'users.id', '=', 'order_feedback.user_id');;
        $buttons = array();
        return Datatables::of($order)
            ->editColumn('status', function ($order) {
                return '<span class="flat label status-label label-' . $order->getStatusColor() . '">' . $order->getStatus() . '</span>';
            })
            ->editColumn('result', function ($order) {
                if($order->result == 0){
                    return '<span class="flat label status-label label-default">Chưa phản hồi</span>';
                }elseif ($order->result == 1){
                    return '<span class="flat label status-label label-success">Đồng ý</span>';
                }elseif ($order->result == 2){
                    return '<span class="flat label status-label label-danger">Không đồng ý</span>';
                }
            })
            ->addColumn('action', function ($order) {
                $buttons = array();
                if($order->status == 2){
                    $buttons[] = [
                        'href' => 'edit/' . e($order->id),
                        'icon' => 'eye',
                        'type' => 'info',
                        'label' => 'Xem'
                    ];
                }else{
                    $buttons[] = [
                        'href' => 'edit/' . e($order->id),
                        'icon' => 'edit',
                        'type' => 'primary',
                        'label' => 'Xử lý'
                    ];
                    $buttons[] = [
                        'href' => route('order-send',$order->id),
                        'icon' => 'send',
                        'type' => 'warning',
                        'label' => 'Gửi'
                    ];
                }
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
        return view('order.list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $user = User::find($order->user_id);
        return view('order.edit', compact('order','user'));
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
        $orderUpdate = $request->all();
        $order = Order::find($id);
        $order->price = str_replace(',', '', $orderUpdate['price']);
        $order->status = 1;
        $order->save();
        return redirect()->route('order-list');
    }
    public function send_order($id)
    {
        $order = Order::find($id);
        $order->status = 2;
        $order->save();
        return redirect()->route('order-list');
    }

    public function feedback($order_code){
        if(\Auth::user()){
            $order = $this->order->getOrderByCode($order_code);
            return view('order.feedback',compact('order'));
        }else{
            return redirect()->route('frontend');
        }
    }
    public function agree(Request $request){
        $agree=$request->all();
        $order = $this->order->getOrderByCode($agree['order_code']);
        $orderUpdate = $this->order->find($order->id);
        $orderUpdate->result = 1;
//        dd($orderUpdate);
        $orderUpdate->save();
        $data = array('code' => $orderUpdate['order_code'], 'content' =>$orderUpdate['content'], 'price' => $orderUpdate['price']);
        $this->sendMailRequestformUser($data, \Auth::user()->email, 'Xác nhận báo giá từ Minhtri DP');
        \Session::flash('message','Chúng tôi sẽ liên hệ với quý khách trong thời gian sớm nhất ! Xin cảm ơn.');
        return redirect()->route('my-page');
    }
    public function notagree(Request $request){
        $notagree=$request->all();
        $order = $this->order->getOrderByCode($notagree['order_code']);
        $orderUpdate = $this->order->find($order->id);
        $orderUpdate->result = 2;
        $orderUpdate->comment = $notagree['feedback-content'];
        $orderUpdate->save();
        \Session::flash('message','Cảm ơn vì đã phản ánh về dịch vụ của chúng tôi ! Xin cảm ơn.');
        return redirect()->route('my-page');
    }
    /**
     * Send mail for user
     *
     * @author Phat Le 22 Jan, 2017
     * @return Response, send to multiple email
     */
    protected function sendMailRequestformUser($data, $mail, $subject)
    {
        \Mail::send('emails.confirm', $data, function ($message) use ($mail, $subject) {
            $message->from(env('MAIL_FROM_ADMIN'), env('MAIL_NAME_ADMIN'));
            $message->to($mail)
                ->subject($subject);
        });
    }
}
