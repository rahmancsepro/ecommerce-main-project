<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class TrackingController extends Controller
{
    public function orderTrack(Request $request)
    {
        if(empty($request->invoice_no)){
            return redirect()->back()->with('error','Please Enter invoice no');
        }else{
            $order = Order::with(['division','district','state','user','orderItems'])->where('invoice_no',$request->invoice_no)->first();
            if($order){
                return view('fontend.order-track',compact('order'));
            }else{
                return redirect()->back()->with('error','Order not found');
            }
        }
    }
}
