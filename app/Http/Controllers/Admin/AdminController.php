<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Auth;
use Exception;
use Image;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard.index');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function profile()
    {
        return view('admin.profile.index');
    }

    public function updateProfile(Request $request)
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

    public function loadImage()
    {
        return view('admin.profile.imageupdate');
    }

    public function updateImage(Request $request)
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
        return view('admin.profile.password-update');
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

    public function userList()
    {
        $users = User::where('role_id','!=',1)->orderBy('id','DESC')->get();
        return view('admin.users.index',compact('users'));
    }

    public function userBanned($user_id)
    {
        User::find($user_id)->update(['isban'=> 1]);
        return redirect()->back()->with('message','User Banned Successfully');
    }
    public function userUnbanned($user_id)
    {
        User::find($user_id)->update(['isban'=> 0]);
        return redirect()->back()->with('message','User Unbanned Successfully');
    }
}
