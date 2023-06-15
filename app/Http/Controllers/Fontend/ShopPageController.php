<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ShopPageController extends Controller
{
    public function shopPage()
    {
        $products = Product::query();
        //Filter By Category
        if(!empty($_GET['category'])){
            $slugs = explode(',',$_GET['category']);
            $catIds = Category::select('id')->whereIn('category_slug_en',$slugs)->pluck('id')->toArray();
            $products = $products->whereIn('category_id',$catIds);
        }

        //Filter By Brand
        if(!empty($_GET['brand'])){
            $slugs = explode(',',$_GET['brand']);
            $brandIds = Brand::select('id')->whereIn('brand_slug_en',$slugs)->pluck('id')->toArray();
            $products = $products->whereIn('brand_id',$brandIds);
        }

        //Filter By Price
        if(!empty($_GET['price'])){
            $price = explode('-',$_GET['price']);
            $products = $products->whereBetween('selling_price',$price);
        }

        //Filter By Sorting
        if(!empty($_GET['sort'])){
            $sortValue = $_GET['sort'];

            if($sortValue = 'priceHighToLow'){
                $products = $products->where('status','1')->orderBy('selling_price','ASC')->paginate(12);
            }elseif($sortValue = 'priceLowToHigh'){
                $products = $products->where('status','1')->orderBy('selling_price','DESC')->paginate(12);
            }elseif($sortValue = 'nameAtoZ'){
                $products = $products->where('status','1')->orderBy('product_name_en','ASC')->paginate(12);
            }elseif($sortValue = 'nameZtoA'){
                $products = $products->where('status','1')->orderBy('product_name_en','DESC')->paginate(12);
            }else{
                $products = $products->where('status','1')->orderBy('id','DESC')->paginate(12);
            }

        }else{
            $products = Product::where('status','1')->orderBy('id','DESC')->paginate(12);
        }
        
        $categories = Category::orderBy('category_name_en','ASC')->get();

        $tags_en = Product::groupBy('product_tags_en')->select('product_tags_en')->get();
        $tags_bn = Product::groupBy('product_tags_bn')->select('product_tags_bn')->get();
        $brands = Brand::where('status','1')->get();

        return view('fontend.shop', compact('products','categories','tags_en','tags_bn','brands'));
    }

    public function shopFilter(Request $request)
    {
        $data = $request->all();

        // Filter By Category
        $catUrl = "";
        if(!empty($data['category'])){
            foreach ($data['category'] as $category) {
                if(empty($catUrl)){
                    $catUrl .= "&category=".$category;
                }else{
                    $catUrl .= ",".$category;
                }
            }
        }

        // Filter By Brand
        $brandUrl = "";
        if(!empty($data['brand'])){
            foreach ($data['brand'] as $brand) {
                if(empty($brandUrl)){
                    $brandUrl .= "&brand=".$brand;
                }else{
                    $brandUrl .= ",".$brand;
                }
            }
        }

        // Filter By Sorting
        $sortUrl = "";
        if(!empty($data['sort'])){
                $sortUrl .= "&sort=".$data['sort'];
        }

        // Filter By Price
        $priceRangeUrl = "";
        if(!empty($data['price_range'])){
                $priceRangeUrl .= "&price=".$data['price_range'];
        }

        return redirect()->route('shop',$catUrl.$brandUrl.$sortUrl.$priceRangeUrl);

    }



}
