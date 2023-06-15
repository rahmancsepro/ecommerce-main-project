<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Writer;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductMultiImage;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Exception;
use Image;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::where('status','1')->get();
        $categories = Category::where('status','1')->get();
        $writers = Writer::where('status','1')->get();
        return view('admin.product.create',compact('brands','categories','writers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'writer_id'=>'required',
            'brand_id'=>'required',
            'category_id'=>'required',
            'sub_category_id'=>'required',
            'sub_sub_category_id'=>'required',
            'product_name_en'=>'required|unique:products,product_name_en',
            'product_name_bn'=>'required|unique:products,product_name_bn',
            'product_code'=>'required',
            'product_qty'=>'required',
            'product_tags_en'=>'required',
            'product_tags_bn'=>'required',
            'selling_price'=>'required',
            'short_descp_en'=>'required',
            'short_descp_bn'=>'required',
            'long_descp_en'=>'required',
            'long_descp_bn'=>'required',
            'product_thumbnail'=>'required',
            'multipleImage'=>'required',
        ],[
            'writer_id.required' =>'This field is required',
            'brand_id.required' =>'This field is required',
            'category_id.required' =>'This field is required',
            'sub_category_id.required' =>'This field is required',
            'sub_sub_category_id.required' =>'This field is required',
            'product_name_en.required' =>'This field is required',
            'product_name_bn.required' =>'This field is required',
            'product_code.required' =>'This field is required',
            'product_qty.required' =>'This field is required',
            'product_tags_en.required' =>'This field is required',
            'product_tags_bn.required' =>'This field is required',
            'selling_price.required' =>'This field is required',
            'short_descp_en.required' =>'This field is required',
            'short_descp_bn.required' =>'This field is required',
            'long_descp_en.required' =>'This field is required',
            'long_descp_bn.required' =>'This field is required',
            'product_thumbnail.required' =>'This field is required',
            'multipleImage.required' =>'This field is required',
        ]);

        try{

            if($request->hasFile('product_thumbnail')) {
                $thumFile = $request->file('product_thumbnail');
                $thumName = 'boiutso-'.Str::random(20) . '-' . now()->timestamp . '.' . $thumFile->getClientOriginalExtension();
                $thumUrl = 'uploads/products/thumbnail/'.$thumName;
                Image::make($thumFile)->resize(166,110)->save($thumUrl);
            }
            $product_id = Product::insertGetId([
                'writer_id' => $request->writer_id,
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'sub_sub_category_id' => $request->sub_sub_category_id,
                'product_name_en' => $request->product_name_en,
                'product_name_bn' => $request->product_name_bn,
                'product_slug_en' => strtolower(str_replace(' ','-', $request->product_name_en)),
                'product_slug_bn' => str_replace(' ','-',$request->product_name_bn),
                'product_code' => $request->product_code,
                'product_qty' => $request->product_qty,
                'product_tags_en' => $request->product_tags_en,
                'product_tags_bn' => $request->product_tags_bn,
                'product_size_en' => $request->product_size_en,
                'product_size_bn' => $request->product_size_bn,
                'product_color_en' => $request->product_color_en,
                'product_color_bn' => $request->product_color_bn,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'short_descp_en' => $request->short_descp_en,
                'short_descp_bn' => $request->short_descp_bn,
                'long_descp_en' => $request->long_descp_en,
                'long_descp_bn' => $request->long_descp_bn,
                'product_thumbnail' => $thumUrl,
                'hot_deals' => $request->hot_deals,
                'featured' => $request->featured,
                'special_offer' => $request->special_offer,
                'special_deals' => $request->special_deals,
                'created_at' => Carbon::now(),
            ]);
            if($request->hasFile('multipleImage')) {
                $images = $request->file('multipleImage');
                foreach ($images as $image) {
                    $productName = 'boiutso-'.Str::random(20) . '-' . now()->timestamp . '.' . $image->getClientOriginalExtension();
                    $productUrl = 'uploads/products/image/'.$productName;
                    Image::make($image)->resize(917,1000)->save($productUrl);

                    ProductMultiImage::insert([
                        'product_id' => $product_id,
                        'product_image' => $productUrl,
                        'created_at' => Carbon::now(),
                    ]);
                }
            }

            return redirect()->back()->with('message','Product Added Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('productimage')->find($id);
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brands     = Brand::where('status','1')->get();
        $categories = Category::where('status','1')->get();
        $product    = Product::with('productimage')->find($id);
        return view('admin.product.edit',compact('brands','categories','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'brand_id'=>'required',
            'category_id'=>'required',
            'sub_category_id'=>'required',
            'sub_sub_category_id'=>'required',
            'product_name_en'=>'required|unique:products,product_name_en,'.$id,
            'product_name_bn'=>'required|unique:products,product_name_bn,'.$id,
            'product_code'=>'required',
            'product_qty'=>'required',
            'product_tags_en'=>'required',
            'product_tags_bn'=>'required',
            'selling_price'=>'required',
            'short_descp_en'=>'required',
            'short_descp_bn'=>'required',
            'long_descp_en'=>'required',
            'long_descp_bn'=>'required',
        ],[
            'brand_id.required' =>'This field is required',
            'category_id.required' =>'This field is required',
            'sub_category_id.required' =>'This field is required',
            'sub_sub_category_id.required' =>'This field is required',
            'product_name_en.required' =>'This field is required',
            'product_name_bn.required' =>'This field is required',
            'product_code.required' =>'This field is required',
            'product_qty.required' =>'This field is required',
            'product_tags_en.required' =>'This field is required',
            'product_tags_bn.required' =>'This field is required',
            'selling_price.required' =>'This field is required',
            'short_descp_en.required' =>'This field is required',
            'short_descp_bn.required' =>'This field is required',
            'long_descp_en.required' =>'This field is required',
            'long_descp_bn.required' =>'This field is required',
        ]);

        try{
            Product::find($id)->update([
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'sub_sub_category_id' => $request->sub_sub_category_id,
                'product_name_en' => $request->product_name_en,
                'product_name_bn' => $request->product_name_bn,
                'product_slug_en' => strtolower(str_replace(' ','-', $request->product_name_en)),
                'product_slug_bn' => str_replace(' ','-',$request->product_name_bn),
                'product_code' => $request->product_code,
                'product_qty' => $request->product_qty,
                'product_tags_en' => $request->product_tags_en,
                'product_tags_bn' => $request->product_tags_bn,
                'product_size_en' => $request->product_size_en,
                'product_size_bn' => $request->product_size_bn,
                'product_color_en' => $request->product_color_en,
                'product_color_bn' => $request->product_color_bn,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'short_descp_en' => $request->short_descp_en,
                'short_descp_bn' => $request->short_descp_bn,
                'long_descp_en' => $request->long_descp_en,
                'long_descp_bn' => $request->long_descp_bn,
                'hot_deals' => $request->hot_deals,
                'featured' => $request->featured,
                'special_offer' => $request->special_offer,
                'special_deals' => $request->special_deals,
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->back()->with('message','Product Updated Successfully');
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
        try{
            $product = Product::find($id);
            if ($product->product_thumbnail != null){
                File::delete(public_path($product->product_thumbnail)); //Old image delete
            }
             Product::find($id)->delete();
             $images = ProductMultiImage::where('product_id',$id)->get();
             foreach ($images as $img) {
                if ($img->product_image != null){
                File::delete(public_path($img->product_image)); //Old image delete
                }
             }
             return redirect()->back()->with('message','Product Deleted Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function updateThumbnail(Request $request, string $id)
    {
         $request->validate([
            'product_thumbnail'=>'required',
        ],[
            'product_thumbnail.required' =>'This field is required',
        ]);

        try{
            $product = Product::find($id);

            if($request->hasFile('product_thumbnail')) {
                if ($product->product_thumbnail != null){
                    File::delete(public_path($product->product_thumbnail)); //Old image delete
                }
                $file = $request->file('product_thumbnail');
                $imgname = 'boiutso-'.Str::random(20) . '-' . now()->timestamp . '.' . $file->getClientOriginalExtension();
                $url = 'uploads/products/thumbnail/'.$imgname;
                Image::make($file)->resize(917,1000)->save($url);
                $product->product_thumbnail = $url;
                $product->update();
            }
            return redirect()->back()->with('message','Product Thumbnail Update Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function updateImage(Request $request, string $id)
    {
        try{
        $product_images = $request->product_image;
        foreach ($product_images as $imageId => $img) {
            $imgDel = ProductMultiImage::find($imageId);
            File::delete(public_path($imgDel->product_image)); //Old image delete
            $make_name='boiutso-'.Str::random(20) . '-' . now()->timestamp . '.' . $img->getClientOriginalExtension();
            $url = 'uploads/products/image/'.$make_name;
            Image::make($img)->resize(917,1000)->save($url);

           ProductMultiImage::find($imageId)->update([
            'product_image' => $url,
            'updated_at' => Carbon::now(),
           ]);

        }
         return redirect()->back()->with('message','Product Image Update Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function deleteImage($id){
        try{
        $oldimg = ProductMultiImage::find($id);
        File::delete(public_path($oldimg->product_image)); //Old image delete
        ProductMultiImage::find($id)->delete();
        return redirect()->back()->with('message','Product Image Delete Successfully');

        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function addProductImage(Request $request)
    {
       $request->validate([
            'multipleImage'=>'required',
        ],[
            'multipleImage.required' =>'This field is required',
        ]);

        try{
            $product_id = $request->product_id;
            if($request->hasFile('multipleImage')) {
                $images = $request->file('multipleImage');
                foreach ($images as $image) {
                    $productName = 'boiutso-'.Str::random(20) . '-' . now()->timestamp . '.' . $image->getClientOriginalExtension();
                    $productUrl = 'uploads/products/image/'.$productName;
                    Image::make($image)->resize(917,1000)->save($productUrl);

                    ProductMultiImage::insert([
                        'product_id' => $product_id,
                        'product_image' => $productUrl,
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }

            return redirect()->back()->with('message','Product Added Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function active($id)
    {
       try{
         Product::findOrFail($id)->update(['status' => '1']);
         return redirect()->back()->with('message','Product Activate Successfully');
       }catch(Exception $e){
        return redirect()->back()->with('error',$e->getMessage());
       }
    }

    public function inactive($id)
    {
        try{
         Product::find($id)->update(['status' => '0']);
         return redirect()->back()->with('message','Product Inactivate Successfully');
       }catch(Exception $e){
        return redirect()->back()->with('error',$e->getMessage());
       }
    }

}
