<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Exception;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('status','1')->get();
        return view('admin.category.index',compact('categories'));
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
            'category_name_en'=>'required|unique:categories,category_name_en',
            'category_name_bn'=>'required|unique:categories,category_name_bn',
            'category_icon'=>'required',
        ],[
            'category_name_en.required' =>'This field is required',
            'category_name_bn.required' =>'This field is required',
            'category_icon.required' =>'This field is required',
        ]);

        try{
            $category = new Category();
            $category->category_name_en = $request->category_name_en;
            $category->category_name_bn = $request->category_name_bn;
            $category->category_slug_en = strtolower(str_replace(' ','-', $request->category_name_en));
            $category->category_slug_bn = str_replace(' ','-',$request->category_name_bn);
            $category->category_icon = $request->category_icon;
            $category->save();
            return redirect()->back()->with('message','Category Added Successfully');
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
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_name_en'=>'required|unique:categories,category_name_en,'.$id,
            'category_name_bn'=>'required|unique:categories,category_name_bn,'.$id,
            'category_icon'=>'required',
        ],[
            'category_name_en.required' =>'This field is required',
            'category_name_bn.required' =>'This field is required',
            'category_icon.required' =>'This field is required',
        ]);

        try{
            $category = Category::find($id);
            $category->category_name_en = $request->category_name_en;
            $category->category_name_bn = $request->category_name_bn;
            $category->category_slug_en = strtolower(str_replace(' ','-', $request->category_name_en));
            $category->category_slug_bn = str_replace(' ','-',$request->category_name_bn);
            $category->category_icon = $request->category_icon;

            $category->update();
            return redirect()->route('admin.category.index')->with('message','Category Update Successfully');
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
            $category = Category::find($id);
            $category->delete();
            return redirect()->back()->with('message','Category Deleted Successfully');
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
