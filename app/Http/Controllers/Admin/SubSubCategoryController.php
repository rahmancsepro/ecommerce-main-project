<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class SubSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        $subsubcategories = SubSubCategory::with(['category:id,category_name_en','subcategory:id,subcategory_name_en'])->get();
        return view('admin.sub-sub-category.index',compact('categories','subsubcategories'));
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
            'sub_category_id'=>'required',
            'subsubcategory_name_en'=>'required|unique:sub_sub_categories,subsubcategory_name_en',
            'subsubcategory_name_bn'=>'required|unique:sub_sub_categories,subsubcategory_name_bn',
        ],[
            'category_id.required' =>'This field is required',
            'sub_category_id.required' =>'This field is required',
            'subsubcategory_name_en.required' =>'This field is required',
            'subsubcategory_name_bn.required' =>'This field is required',
        ]);

        try{
            $subsubcategory = new SubSubCategory();
            $subsubcategory->category_id = $request->category_id;
            $subsubcategory->sub_category_id = $request->sub_category_id;
            $subsubcategory->subsubcategory_name_en = $request->subsubcategory_name_en;
            $subsubcategory->subsubcategory_name_bn = $request->subsubcategory_name_bn;
            $subsubcategory->subsubcategory_slug_en = strtolower(str_replace(' ','-', $request->subsubcategory_name_en));
            $subsubcategory->subsubcategory_slug_bn = str_replace(' ','-',$request->subsubcategory_name_bn);
            $subsubcategory->save();
            return redirect()->back()->with('message','Sub Sub Category Added Successfully');
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
        $subsubcategory = SubSubCategory::find($id);
        $subcategories = SubCategory::where('category_id',$subsubcategory->category_id)->where('status','1')->orderBy('subcategory_name_en','ASC')->get(['id','subcategory_name_en']);
        return view('admin.sub-sub-category.edit',compact('categories','subcategories','subsubcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'category_id'=>'required',
            'sub_category_id'=>'required',
            'subsubcategory_name_en'=>'required|unique:sub_sub_categories,subsubcategory_name_en,'.$id,
            'subsubcategory_name_bn'=>'required|unique:sub_sub_categories,subsubcategory_name_bn,'.$id,
        ],[
            'category_id.required' =>'This field is required',
            'sub_category_id.required' =>'This field is required',
            'subsubcategory_name_en.required' =>'This field is required',
            'subsubcategory_name_bn.required' =>'This field is required',
        ]);
        try{
            $subsubcategory = SubSubCategory::find($id);
            $subsubcategory->category_id = $request->category_id;
            $subsubcategory->sub_category_id = $request->sub_category_id;
            $subsubcategory->subsubcategory_name_en = $request->subsubcategory_name_en;
            $subsubcategory->subsubcategory_name_bn = $request->subsubcategory_name_bn;
            $subsubcategory->subsubcategory_slug_en = strtolower(str_replace(' ','-', $request->subsubcategory_name_en));
            $subsubcategory->subsubcategory_slug_bn = str_replace(' ','-',$request->subsubcategory_name_bn);

            $subsubcategory->update();
            return redirect()->route('admin.sub-sub-category.index')->with('message','Sub Sub Category Update Successfully');
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
            $subsubcategory = SubSubCategory::find($id);
            $subsubcategory->delete();
            return redirect()->back()->with('message','Sub Sub Category Deleted Successfully');
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function getSubcategory($cat_id)
    {
        $subcat = SubCategory::where('category_id',$cat_id)->where('status','1')->orderBy('subcategory_name_en','ASC')->get(['id','subcategory_name_en']);
        return json_encode($subcat);
    }

    public function getSubSubcategory($sub_cat_id)
    {
        $subsubcat = SubSubCategory::where('sub_category_id',$sub_cat_id)->where('status','1')->orderBy('subsubcategory_name_en','ASC')->get(['id','subsubcategory_name_en']);
        return json_encode($subsubcat);
    }
}
