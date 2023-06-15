<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Exception;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('status','1')->get();
        $subcategories = SubCategory::with('category:id,category_name_en')->where('status','1')->get();
        return view('admin.sub-category.index',compact('categories','subcategories'));
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
            'category_id'=>'required',
            'subcategory_name_en'=>'required|unique:categories,category_name_en',
            'subcategory_name_bn'=>'required|unique:categories,category_name_bn',
        ],[
            'category_id.required' =>'This field is required',
            'subcategory_name_en.required' =>'This field is required',
            'subcategory_name_bn.required' =>'This field is required',
        ]);

        try{
            $subcategory = new SubCategory();
            $subcategory->category_id = $request->category_id;
            $subcategory->subcategory_name_en = $request->subcategory_name_en;
            $subcategory->subcategory_name_bn = $request->subcategory_name_bn;
            $subcategory->subcategory_slug_en = strtolower(str_replace(' ','-', $request->subcategory_name_en));
            $subcategory->subcategory_slug_bn = str_replace(' ','-',$request->subcategory_name_bn);
            $subcategory->save();
            return redirect()->back()->with('message','Sub Category Added Successfully');
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
        $categories = Category::get();
        $subcategory = SubCategory::find($id);
        return view('admin.sub-category.edit',compact('subcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id'=>'required',
            'subcategory_name_en'=>'required|unique:categories,category_name_en',
            'subcategory_name_bn'=>'required|unique:categories,category_name_bn',
        ],[
            'category_id.required' =>'This field is required',
            'subcategory_name_en.required' =>'This field is required',
            'subcategory_name_bn.required' =>'This field is required',
        ]);

        try{
            $subcategory = SubCategory::find($id);
            $subcategory->category_id = $request->category_id;
            $subcategory->subcategory_name_en = $request->subcategory_name_en;
            $subcategory->subcategory_name_bn = $request->subcategory_name_bn;
            $subcategory->subcategory_slug_en = strtolower(str_replace(' ','-', $request->subcategory_name_en));
            $subcategory->subcategory_slug_bn = str_replace(' ','-',$request->subcategory_name_bn);

            $subcategory->update();
            return redirect()->route('admin.sub-category.index')->with('message','Sub Category Update Successfully');
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
            $subcategory = SubCategory::find($id);
            $subcategory->delete();
            return redirect()->back()->with('message','Sub Category Deleted Successfully');
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
