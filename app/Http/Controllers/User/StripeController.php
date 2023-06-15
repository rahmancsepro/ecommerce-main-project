<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Cart;
use App\Mail\OrderMail;

class StripeController extends Controller
{
    public function store(Request $request)
    {
        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = Cart::total();
        }
        \Stripe\Stripe::setApiKey('sk_test_51NEz91Hq4jIPr6kiL5qpDTpJYa8iCwQI2HaCvg9QruBjEKjdhL3uyGs6QiqanNBSweACXpvBQ24Tdtu5q39F61na00CXFxvxvo');

        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
          'amount' => $total_amount*100,
          'currency' => 'usd',
          'description' => 'Stripe Payment from boiutso',
          'source' => $token,
          'metadata' => ['order_id' => uniqid()],
        ]);

        $order_id = Order::insertGetId([
            'user_id'=> Auth::id(),
            'division_id'=>$request->division_id,
            'district_id'=>$request->district_id,
            'state_id'=>$request->state_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'post_code'=>$request->post_code,
            'notes'=>$request->notes,
            'payment_type'=>$charge->payment_method,
            'payment_method'=>'Stripe',
            'transaction_id'=>$charge->balance_transaction,
            'currency'=>$charge->currency,
            'amount'=>$total_amount,
            'order_number'=>$charge->metadata->order_id,
            'invoice_no'=>'boiutso-'.mt_rand(10000000,99999999),
            'order_date'=>Carbon::now()->format('d F Y'),
            'order_month'=>Carbon::now()->format('F'),
            'order_year'=>Carbon::now()->format('Y'),
            'status' => "Pending",
            'created_at'=>Carbon::now(),
        ]);

        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id'=>$order_id,
                'product_id'=>$cart->id,
                'qty'=>$cart->qty,
                'price'=>$cart->price,
                'created_at'=>Carbon::now(),
            ]);
        }

        //Mail Start
        $invoice = Order::find($order_id);
        $data = [
            'invoice_no'=> $invoice->invoice_no,
            'amount'=> $total_amount,
        ];

        Mail::to($request->email)->send(new OrderMail($data));
        //Mail End

        if(Session::has('coupon')){
            Session::forget('coupon');
        }

        Cart::destroy();

        return redirect()->route('user.dashboard')->with('message','Payment Successfully Done');
    }
}
