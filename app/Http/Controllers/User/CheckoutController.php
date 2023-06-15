<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\District;
use App\Models\State;
use Cart;

class CheckoutController extends Controller
{
    public function getDistrict($division_id)
    {
        $districts = District::where('division_id',$division_id)->where('status','1')->orderBy('id','ASC')->get();
        return json_encode($districts);
    }

    public function getState($district_id)
    {
        $states = State::where('district_id',$district_id)->where('status','1')->orderBy('id','ASC')->get();
        return json_encode($states);
    }

    public function checkoutStore(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['notes'] = $request->note;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['post_code'] = $request->post_code;

        $tax = Cart::tax();
        $cartSubTotal = Cart::subtotal();
        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = Cart::total();
        }
        
        if($request->payment_method == "stripe"){
            return view('fontend.payment.stripe',compact('data','tax','cartSubTotal','total_amount'));
        }elseif($request->payment_method == "sslHosted"){
            return view('fontend.payment.hostedPayment',compact('data','tax','cartSubTotal','total_amount'));
        }elseif($request->payment_method == "sslEasy"){
            return view('fontend.payment.easyPayment',compact('data','tax','cartSubTotal','total_amount'));
        }else{
            return "Hand Cash";
        }
    }


}
