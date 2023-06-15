<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        return view('user.wishlist-page');
    }
    public function getWishlist()
    {
        $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        return response()->json($wishlist);
    }
    public function removeWishlist($id)
    {
        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success'=>'Wishlist Removed Successfully']);
    }
}
