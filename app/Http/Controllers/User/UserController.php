<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Order;
use Exception;
use Image;
use PDF;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
        ]);

        try{
            $user = User::find(Auth::id());
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->updated_at = Carbon::now();
            $user->save();
            return redirect()->back()->with('message','Profile Updated Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function loadImage(){
        return view('user.imageupdate');
    }

    public  function updateImage(Request $request)
    {
        $request->validate([
            'image'=>'required',
        ]);

        $user = User::find(Auth::id());
        try{
            if($request->hasFile('image')) {
                if ($user->image != null){
                    File::delete(public_path($user->image)); //Old image delete
                }
                $file = $request->file('image');
                $imgname = 'boiutso-'.Str::random(20) . '-' . now()->timestamp . '.' . $file->getClientOriginalExtension();
                $url = 'fontend/media/'.$imgname;
                Image::make($file)->resize(300,300)->save($url);
                $user->Update([
                    'image' => $url
                ]);
                return redirect()->back()->with('message','Image Updated Successfully');
            }
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function loadPassword()
    {
        return view('user.password-update');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password'=>'required',
            'new_password'=>'required',
            'confirmation_password'=>'required|same:new_password',
        ]);
        $db_pass = Auth::user()->password;
        $password = $request->password;
        $new_password = $request->new_password;
        $confirmation_password = $request->confirmation_password;

        if(Hash::check($password,$db_pass)){
            User::find(Auth::user()->id)->Update([
                'password' => Hash::make($new_password),
            ]);
            Auth::logout();
            return redirect()->route('login')->with('message','Now Login With New Password');
        }else{
            return redirect()->back()->with('error','Your Password does not exist');
        }
    }

    public function ordersList()
    {
        $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('user.orders.order',compact('orders'));
    }
    public function returnOrder()
    {
        $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->where('return_date','!=',NULL)->get();
        return view('user.orders.return-order',compact('orders'));
    }
    public function cancelOrder()
    {
        $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->where('status','Cancel')->get();
        return view('user.orders.cancel-order',compact('orders'));
    }
    public function orderView($order_id)
    {
        $order = Order::with(['division','district','state','user','orderItems'])->where('user_id',Auth::id())->find($order_id);
        return view('user.orders.view-order',compact('order'));
    }
    // Order Invoice Download
    public function invoiceDownload($order_id)
    {
        $order = Order::with(['division','district','state','user','orderItems'])->where('user_id',Auth::id())->find($order_id);

        $pdf = PDF::loadView('user.orders.invoice',compact('order'))->setPaper('a4')->setOptions([
                'tempDir' => public_path(),
                'chroot' => public_path(),
            ]);
        return $pdf->download('boiutso-invoice.pdf');

        // return view('user.orders.invoice',compact('order'));
    }
    //Return Order
    public function sendReturnOrder(Request $request, $order_id)
    {
        $request->validate([
            'return_reason'=>'required'
        ],[
            'return_reason.required' =>'This field is required'
        ]);

        try{
            Order::find($order_id)->update([
                'return_date'=>Carbon::now()->format('d F Y'),
                'return_reason'=>$request->return_reason,
            ]);

            return redirect()->route('user.my-order')->with('message','Return Request Send Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

}
