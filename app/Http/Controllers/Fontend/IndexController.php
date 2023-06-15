<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\Product;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with(['subcategory','products'])->orderBy('category_name_en', 'ASC')->get();
        $sliders = Slider::where('status','1')->orderBy('id', 'DESC')->take(5)->get();
        $products = Product::with(['productreviews'=>function($query){
            $query->where('status', 'approve');
        }])->where('status','1')->orderBy('id', 'DESC')->get();
        $featureds = Product::where('featured','1')->where('status','1')->orderBy('id', 'DESC')->get();
        $special_offers = Product::where('special_offer','1')->where('status','1')->orderBy('id', 'DESC')->get();
        $hot_deals = Product::where('hot_deals','1')->where('status','1')->where('discount_price','!=',NULL)->orderBy('id', 'DESC')->get();
        $special_deals = Product::where('special_deals','1')->where('status','1')->orderBy('id', 'DESC')->get();
        $category_skip_0 = Category::with(['products'])->skip(0)->first();
        $category_skip_1 = Category::with(['products'])->skip(1)->first();
        $brand_skip_0 = Brand::with(['products'])->skip(0)->first();
        $tags_en = Product::groupBy('product_tags_en')->select('product_tags_en')->get();
        $tags_bn = Product::groupBy('product_tags_bn')->select('product_tags_bn')->get();
        return view('fontend.index', compact('categories','sliders','products','featureds','special_offers','hot_deals','special_deals','category_skip_0','category_skip_1','brand_skip_0','tags_en','tags_bn'));
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

    public function singleProduct($id,$slug)
    {
        $product = Product::with(['productreviews'=>function($query){
            $query->where('status', 'approve');
        }])->where('status','1')->find($id);
        $hot_deals = Product::where('hot_deals','1')->where('status','1')->where('discount_price','!=',NULL)->orderBy('id', 'DESC')->get();
        $relatedProducts = Product::where('status','1')->where('category_id',$product->category_id)->where('id','!=',$product->id)->get();
        return view('fontend.single-product',compact('product','hot_deals','relatedProducts'));
    }

    public function tagWiseProduct($tag){
        $products = Product::where('status','1')->where('product_tags_en',$tag)->orWhere('product_tags_bn',$tag)->orderBy('id','DESC')->paginate(12);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $tags_en = Product::groupBy('product_tags_en')->select('product_tags_en')->get();
        $tags_bn = Product::groupBy('product_tags_bn')->select('product_tags_bn')->get();
        return view('fontend.tag-product',compact('products','categories','tags_en','tags_bn'));
    }
    public function subCatWiseProduct(Request $request, $id, $slug){
        $route = "sub-category/product";
        $sort = '';
        if($request->sort != null){
            $sort = $request->sort;
        }
        if($id == null){
            return view('error.404');
        }else{
            if($sort = 'priceHighToLow'){
                $products = Product::where('status','1')->where('sub_category_id',$id)->orderBy('selling_price','ASC')->paginate(12);
            }elseif($sort = 'priceLowToHigh'){
                $products = Product::where('status','1')->where('sub_category_id',$id)->orderBy('selling_price','DESC')->paginate(12);
            }elseif($sort = 'nameAtoZ'){
                $products = Product::where('status','1')->where('sub_category_id',$id)->orderBy('product_name_en','ASC')->paginate(12);
            }elseif($sort = 'nameZtoA'){
                $products = Product::where('status','1')->where('sub_category_id',$id)->orderBy('product_name_en','DESC')->paginate(12);
            }else{
                $products = Product::where('status','1')->where('sub_category_id',$id)->orderBy('id','DESC')->paginate(12);
            }
        }
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $tags_en = Product::groupBy('product_tags_en')->select('product_tags_en')->get();
        $tags_bn = Product::groupBy('product_tags_bn')->select('product_tags_bn')->get();
        return view('fontend.sub-category-product',compact('products','categories','tags_en','tags_bn','route','id','slug'));
    }
    public function subSubCatWiseProduct($id, $slug){
        $products = Product::where('status','1')->where('sub_sub_category_id',$id)->orderBy('id','DESC')->paginate(12);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $tags_en = Product::groupBy('product_tags_en')->select('product_tags_en')->get();
        $tags_bn = Product::groupBy('product_tags_bn')->select('product_tags_bn')->get();
        return view('fontend.sub-sub-category-product',compact('products','categories','tags_en','tags_bn'));
    }

    public function viewModalProduct($id)
    {
        $product = Product::with(['category','brand'])->find($id);
        return response()->json([
            'product'=> $product,
        ]);
    }
}
