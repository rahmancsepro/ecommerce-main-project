<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use PDF;

class OrderController extends Controller
{
    public function pendingOrder()
    {
        $orders = Order::where('status','Pending')->orderBy('id','DESC')->get();
        return view('admin.order.pending',compact('orders'));
    }
    public function confirmOrder()
    {
        $orders = Order::where('status','Confirm')->orderBy('id','DESC')->get();
        return view('admin.order.confirm',compact('orders'));
    }
    public function processingOrder()
    {
        $orders = Order::where('status','Processing')->orderBy('id','DESC')->get();
        return view('admin.order.processing',compact('orders'));
    }
    public function pickedOrder()
    {
        $orders = Order::where('status','Picked')->orderBy('id','DESC')->get();
        return view('admin.order.picked',compact('orders'));
    }
    public function shippedOrder()
    {
        $orders = Order::where('status','Shipped')->orderBy('id','DESC')->get();
        return view('admin.order.shipped',compact('orders'));
    }
    public function deliverOrder()
    {
        $orders = Order::where('status','Deliver')->orderBy('id','DESC')->get();
        return view('admin.order.deliver',compact('orders'));
    }
    public function cancelOrder()
    {
        $orders = Order::where('status','Cancel')->orderBy('id','DESC')->get();
        return view('admin.order.cancel',compact('orders'));
    }

    public function viewOrder($order_id)
    {
        $order = Order::with(['division','district','state','user','orderItems'])->find($order_id);
        return view('admin.order.view-order',compact('order'));
    }
    //Admin Invoice Download
    public function invoiceDownload($order_id)
    {
            $order = Order::with(['division','district','state','user','orderItems'])->find($order_id);

        $pdf = PDF::loadView('admin.order.invoice',compact('order'))->setPaper('a4')->setOptions([
                'tempDir' => public_path(),
                'chroot' => public_path(),
            ]);
        return $pdf->download('boiutso-invoice.pdf');
    }

    //Update Order Status

    public function pendingToConfirm($order_id)
    {
        Order::find($order_id)->update([
            'status'=>'Confirm',
            'confirmed_date'=>Carbon::now()->format('d F Y'),
        ]);
        return redirect()->route('admin.confirm.order')->with('message','Order Confirm Successfully');
    }
    public function pendingToCancel($order_id)
    {
        Order::find($order_id)->update([
            'status'=>'Cancel',
            'confirmed_date'=>Carbon::now()->format('d F Y'),
        ]);
        return redirect()->route('admin.cancel.order')->with('message','Order Cancel Successfully');
    }
    public function confirmToProcessing($order_id)
    {
        Order::find($order_id)->update([
            'status'=>'Processing',
            'processing_date'=>Carbon::now()->format('d F Y'),
        ]);
        return redirect()->route('admin.processing.order')->with('message','Order processing Successfully');
    }
    public function processingToPicked($order_id)
    {
        Order::find($order_id)->update([
            'status'=>'Picked',
            'picked_date'=>Carbon::now()->format('d F Y'),
        ]);
        return redirect()->route('admin.picked.order')->with('message','Order Picked Successfully');
    }
    public function pickedToShipped($order_id)
    {
        Order::find($order_id)->update([
            'status'=>'Shipped',
            'shipped_date'=>Carbon::now()->format('d F Y'),
        ]);
        return redirect()->route('admin.shipped.order')->with('message','Order Shipped Successfully');
    }
    public function shippedToDeliver($order_id)
    {
        Order::find($order_id)->update([
            'status'=>'Deliver',
            'delivered_date'=>Carbon::now()->format('d F Y'),
        ]);
        return redirect()->route('admin.deliver.order')->with('message','Order Deliver Successfully');
    }
}
