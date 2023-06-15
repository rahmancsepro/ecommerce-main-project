<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.report.index');
    }

    public function orderByDate(Request $request)
    {

        $request->validate([
            'order_date'=>'required',
        ],[
            'order_date.required' =>'This field is required',
        ]);

        try{
            $date = Carbon::parse($request->order_date);
            $order_date = $date->format('d F Y');
            $orders = Order::where('order_date',$order_date)->orderBy('id','DESC')->get();
            return view('admin.report.order-by-date',compact('orders'));
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function orderByMonth(Request $request)
    {

        $request->validate([
            'order_month'=>'required',
            'order_year'=>'required',
        ],[
            'order_date.required' =>'This field is required',
            'order_year.required' =>'This field is required',
        ]);

        try{
            $orders = Order::where('order_month',$request->order_month)->where('order_year',$request->order_year)->orderBy('id','DESC')->get();
            return view('admin.report.order-by-month',compact('orders'));
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function orderByYear(Request $request)
    {

        $request->validate([
            'order_year'=>'required',
        ],[
            'order_year.required' =>'This field is required',
        ]);

        try{
            $orders = Order::where('order_year',$request->order_year)->orderBy('id','DESC')->get();
            return view('admin.report.order-by-year',compact('orders'));
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

}
