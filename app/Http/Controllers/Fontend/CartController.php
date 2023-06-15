<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Coupon;
use App\Models\Division;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request, $prouctId)
    {
        Session::forget('coupon');
        $product = Product::find($prouctId);

        if($product->discount_price == NULL){
            Cart::add([
                'id' => $prouctId,
                'name' => $product->product_name_en,
                'qty' => $request->product_qty,
                'weight' => 1,
                'price' => $product->selling_price,
                'options' => ['image' => $product->product_thumbnail],
            ]);
             return response()->json(['success'=>'Product Added Successfully']);
        }else{
            Cart::add([
                'id' => $prouctId,
                'name' => $product->product_name_en,
                'qty' => $request->product_qty,
                'weight' => 1,
                'price' => $product->discount_price,
                'options' => ['image' => $product->product_thumbnail],
            ]);
             return response()->json(['success'=>'Product Added Successfully']);
        }
    }

    // Mini Cart Start
    public function miniCart()
    {
       $carts =  Cart::content();
       $cartQty = Cart::count();
       $cartSubTotal = Cart::subtotal();

       return response()->json([
        'carts'=>$carts,
        'cartQty'=>$cartQty,
        'cartSubTotal'=>$cartSubTotal,
        ]);
    }

    public function miniCartRemove($rowId)
    {
        Cart::remove($rowId);
        if(Session::has('coupon')){
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->where('coupon_validaty','>=',Carbon::now()->format('Y-m-d'))->first();

            $subtotal = str_replace(',','', Cart::subtotal());
            $total = str_replace(',','', Cart::total());
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(( (float)$total * (int) $coupon->coupon_discount) / 100),
                'total_amount' => round(((float)$total - ( (float)$total * (int) $coupon->coupon_discount) / 100)),
            ]);
        }
        return response()->json(['success'=>'Cart Remove Successfully']);
    }

    // Mini Cart End

    // Wishlist Start
    public function addToWishlist($prouctId)
    {
        if(Auth::check()){
            $checkWishlist = Wishlist::where('user_id',Auth::id())->where('product_id',$prouctId)->first();
            if(!$checkWishlist){
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $prouctId,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success'=>'Wishlist Added Successfully']);
            }else{
                return response()->json(['error'=>'This product already has wishlist']);
            }
        }else{
            return response()->json(['error'=>'Please login first']);
        }
    }
    // Wishlist End

    //Main Cart Start
    public function index()
    {
        return view('user.cart-page');
    }

    public function cartProduct()
    {
        $carts =  Cart::content();
        $cartQty = Cart::count();
        $cartSubTotal = Cart::subtotal();

       return response()->json([
        'carts'=>$carts,
        'cartQty'=>$cartQty,
        'cartSubTotal'=>$cartSubTotal,
        ]);
    }

    public function cartRemove($rowId)
    {
        Cart::remove($rowId);
        if(Session::has('coupon')){
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->where('coupon_validaty','>=',Carbon::now()->format('Y-m-d'))->first();

            $subtotal = str_replace(',','', Cart::subtotal());
            $total = str_replace(',','', Cart::total());
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(( (float)$total * (int) $coupon->coupon_discount) / 100),
                'total_amount' => round(((float)$total - ( (float)$total * (int) $coupon->coupon_discount) / 100)),
            ]);
        }
        return response()->json(['success'=>'Cart Remove Successfully']);
    }
    //Main Cart End

    //  Cart Increment and Decrement

    public function cartIncrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);
        if(Session::has('coupon')){
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->where('coupon_validaty','>=',Carbon::now()->format('Y-m-d'))->first();

            $subtotal = str_replace(',','', Cart::subtotal());
            $total = str_replace(',','', Cart::total());
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(( (float)$total * (int) $coupon->coupon_discount) / 100),
                'total_amount' => round(((float)$total - ( (float)$total * (int) $coupon->coupon_discount) / 100)),
            ]);
        }
        return response()->json(['success'=>'Cart Updated']);
    }

    public function cartDecrement($rowId)
    {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);
        if(Session::has('coupon')){
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->where('coupon_validaty','>=',Carbon::now()->format('Y-m-d'))->first();

            $subtotal = str_replace(',','', Cart::subtotal());
            $total = str_replace(',','', Cart::total());
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(( (float)$total * (int) $coupon->coupon_discount) / 100),
                'total_amount' => round(((float)$total - ( (float)$total * (int) $coupon->coupon_discount) / 100)),
            ]);
        }
        return response()->json(['success'=>'Cart Updated']);
    }

    public function couponApply(Request $request)
    {
        $coupon_name = $request->coupon_name;
        $coupon = Coupon::where('coupon_name',$coupon_name)->where('coupon_validaty','>=',Carbon::now()->format('Y-m-d'))->first();

        $subtotal = str_replace(',','', Cart::subtotal());
        $total = str_replace(',','', Cart::total());
        if (empty($coupon_name)) {
            return response()->json(['error'=>'Please Enter Your Coupon']);
        }elseif($coupon){
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(( (float)$total * (int) $coupon->coupon_discount) / 100),
                'total_amount' => round(((float)$total - ( (float)$total * (int) $coupon->coupon_discount) / 100)),
            ]);
            return response()->json(['success'=>'Your Coupon Added Successfully']);
        }else{
            return response()->json(['error'=>'Your Coupon Not Valid']);
        }
    }

    public function couponCalculation()
    {
        $subtotal = str_replace(',','', Cart::subtotal());
        $total = str_replace(',','', Cart::total());
        if (Session::has('coupon')) {
            return response()->json([
            'subtotal'=> Cart::subtotal(),
            'coupon_name'=> Session::get('coupon')['coupon_name'],
            'coupon_discount'=> Session::get('coupon')['coupon_discount'],
            'discount_amount'=> Session::get('coupon')['discount_amount'],
            'total_amount'=> Session::get('coupon')['total_amount'],
            ]);
        }else{
            return response()->json([
            'total'=> round((float)$total),
            'subtotal'=> round((float)$subtotal),
            ]);
        }
    }

    public function removeCoupon()
    {
        Session::forget('coupon');
        return response()->json(['success'=>'Coupon Remove Successfully']);
    }

    //checkout
    public function checkout()
    {
        if(auth()->check()){
            if(Cart::total() > 0){
                $carts =  Cart::content();
                $tax = Cart::tax();
                $cartSubTotal = Cart::subtotal();
                $total = Cart::total();
                $divisions = Division::where('status','1')->orderBy('division_name','ASC')->get();
                return view('fontend.checkout',compact('carts','tax','cartSubTotal','total','divisions'));
            }else{
                return redirect()->route('/')->with('error','Please add to cart');
            }
        }else{
            return redirect()->back()->with('error','You need to login first');
        }
    }
}
