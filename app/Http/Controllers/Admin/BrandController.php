<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Exception;
use Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::get();
        return view('admin.brand.index',compact('brands'));
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
        $request->validate([
            'brand_name_en'=>'required|unique:brands,brand_name_en',
            'brand_name_bn'=>'required|unique:brands,brand_name_bn',
            'brand_image'=>'required',
        ],[
            'brand_name_en.required' =>'English brand name is required',
            'brand_name_bn.required' =>'Bangla brand name is required',
            'brand_image.required' =>'Bangla icon field is required',
        ]);

        try{
            $brand = new Brand();
            $brand->brand_name_en = $request->brand_name_en;
            $brand->brand_name_bn = $request->brand_name_bn;
            $brand->brand_slug_en = strtolower(str_replace(' ','-', $request->brand_name_en));
            $brand->brand_slug_bn = str_replace(' ','-',$request->brand_name_bn);

            if($request->hasFile('brand_image')) {
                if ($brand->brand_image != null){
                    File::delete(public_path($brand->brand_image)); //Old image delete
                }
                $file = $request->file('brand_image');
                $imgname = 'boiutso-'.Str::random(20) . '-' . now()->timestamp . '.' . $file->getClientOriginalExtension();
                $url = 'uploads/brand/'.$imgname;
                Image::make($file)->resize(166,110)->save($url);
            }
            $brand->brand_image = $url;
            $brand->save();
            return redirect()->back()->with('message','Brand Added Successfully');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'brand_name_en'=>'required|unique:brands,brand_name_en,'.$id,
            'brand_name_bn'=>'required|unique:brands,brand_name_bn,'.$id,
        ],[
            'brand_name_en.required' =>'English brand name is required',
            'brand_name_bn.required' =>'Bangla brand name is required',
        ]);

        try{
            $brand = Brand::find($id);
            $brand->brand_name_en = $request->brand_name_en;
            $brand->brand_name_bn = $request->brand_name_bn;
            $brand->brand_slug_en = strtolower(str_replace(' ','-', $request->brand_name_en));
            $brand->brand_slug_bn = str_replace(' ','-',$request->brand_name_bn);

            if($request->hasFile('brand_image')) {
                if ($brand->brand_image != null){
                    File::delete(public_path($brand->brand_image)); //Old image delete
                }
                $file = $request->file('brand_image');
                $imgname = 'boiutso-'.Str::random(20) . '-' . now()->timestamp . '.' . $file->getClientOriginalExtension();
                $url = 'uploads/brand/'.$imgname;
                Image::make($file)->resize(166,110)->save($url);
                $brand->brand_image = $url;
                $brand->update();
            }
            $brand->update();
            return redirect()->route('admin.brand.index')->with('message','Brand Update Successfully');
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
        $brand = Brand::find($id);
        if ($brand->brand_image != null){
            File::delete(public_path($brand->brand_image)); //Old image delete
        }
        try{
            $brand = Brand::find($id);
            $brand->delete();
            return redirect()->back()->with('message','Brand Deleted Successfully');
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
        
    }
}
