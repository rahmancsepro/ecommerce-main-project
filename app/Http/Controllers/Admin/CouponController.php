<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::get();
        return view('admin.coupon.index',compact('coupons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'coupon_name'=>'required',
            'coupon_discount'=>'required',
            'coupon_validaty'=>'required',
        ],[
            'coupon_name.required' =>'Coupon name is required',
            'coupon_discount.required' =>'Coupon discount is required',
            'coupon_validaty.required' =>'Coupon validity is required',
        ]);

        try{
            $coupon = new Coupon();
            $coupon->coupon_name = strtoupper($request->coupon_name);
            $coupon->coupon_discount = $request->coupon_discount;
            $coupon->coupon_validaty = $request->coupon_validaty;

            $coupon->save();
            return redirect()->back()->with('message','Coupon Added Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function edit(string $id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit',compact('coupon'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'coupon_name'=>'required',
            'coupon_discount'=>'required',
            'coupon_validaty'=>'required',
        ],[
            'coupon_name.required' =>'Coupon name is required',
            'coupon_discount.required' =>'Coupon discount is required',
            'coupon_validaty.required' =>'Coupon validity is required',
        ]);

        try{
            $coupon = Coupon::find($id);
            $coupon->coupon_name = strtoupper($request->coupon_name);
            $coupon->coupon_discount = $request->coupon_discount;
            $coupon->coupon_validaty = $request->coupon_validaty;

            $coupon->update();
            return redirect()->route('admin.coupon.index')->with('message','Coupon Update Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }


    public function destroy(string $id)
    {
        try{
            $coupon = Coupon::find($id);
            $coupon->delete();
            return redirect()->back()->with('message','Coupon Deleted Successfully');
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
        
    }
}
