<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class SearchController extends Controller
{
    public function searchProduct(Request $request)
    {
        $products=Product::where('product_name_en',"LIKE",'%'.$request->search_name.'%')    ->orWhere('product_name_bn',"LIKE",'%'.$request->search_name.'%')
                ->orWhere('product_tags_en',"LIKE",'%'.$request->search_name.'%')
                ->orWhere('product_tags_bn',"LIKE",'%'.$request->search_name.'%')
                ->orWhere('short_descp_en',"LIKE",'%'.$request->search_name.'%')
                ->orWhere('short_descp_bn',"LIKE",'%'.$request->search_name.'%')
                ->orWhere('long_descp_en',"LIKE",'%'.$request->search_name.'%')
                ->orWhere('long_descp_bn',"LIKE",'%'.$request->search_name.'%')
                ->paginate(12);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $tags_en = Product::groupBy('product_tags_en')->select('product_tags_en')->get();
        $tags_bn = Product::groupBy('product_tags_bn')->select('product_tags_bn')->get();
        return view('fontend.search-result',compact('products','categories','tags_en','tags_bn'));  
    }

    public function searchAutoCompleteProduct(Request $request)
    {
        $products=Product::where('product_name_en',"LIKE",'%'.$request->search_name.'%')    ->orWhere('product_name_bn',"LIKE",'%'.$request->search_name.'%')
                ->orWhere('product_tags_en',"LIKE",'%'.$request->search_name.'%')
                ->orWhere('product_tags_bn',"LIKE",'%'.$request->search_name.'%')
                ->orWhere('short_descp_en',"LIKE",'%'.$request->search_name.'%')
                ->orWhere('short_descp_bn',"LIKE",'%'.$request->search_name.'%')
                ->orWhere('long_descp_en',"LIKE",'%'.$request->search_name.'%')
                ->orWhere('long_descp_bn',"LIKE",'%'.$request->search_name.'%')
                ->take(5)
                ->get();

        return view('fontend.search-auto-complete',compact('products')); 
    }



}
