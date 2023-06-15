<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductReview;

class ProductReviewController extends Controller
{
    public function reviewCreate($prouct_id)
    {
        return view('user.orders.review',compact('prouct_id'));

    }

    public function reviewStore(Request $request)
    {
        $request->validate([
            'comment'=>'required',
            'rating'=>'required',
        ]);

        try{
            $review = new ProductReview();
            $review->user_id = Auth()->id();
            $review->product_id = $request->prouct_id;
            $review->comment = $request->comment;
            $review->rating = $request->rating;
            $review->save();
            return redirect()->back()->with('message','Product Review Added Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
