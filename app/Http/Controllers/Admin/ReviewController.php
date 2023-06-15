<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductReview;

class ReviewController extends Controller
{
    public function reviewList()
    {
        $reviews = ProductReview::with(['product'])->orderBy('id','DESC')->get();
        return view('admin.review.index',compact('reviews'));
    }

    public function destroy($id)
    {
        try{
            $review = ProductReview::find($id);
            $review->delete();
            return redirect()->back()->with('message','Review Deleted Successfully');
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function reviewApprove($id)
    {
        try{
         ProductReview::findOrFail($id)->update(['status' => 'approve']);
         return redirect()->back()->with('message','Review approved successfully');
       }catch(Exception $e){
        return redirect()->back()->with('error',$e->getMessage());
       }
    }
    public function reviewPending($id)
    {
        try{
         ProductReview::findOrFail($id)->update(['status' => 'pending']);
         return redirect()->back()->with('message','Review pending successfully');
       }catch(Exception $e){
        return redirect()->back()->with('error',$e->getMessage());
       }
    }
}
