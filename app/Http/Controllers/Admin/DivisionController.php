<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::orderBy('id','DESC')->get();
        return view('admin.division.index',compact('divisions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'division_name'=>'required',
        ],[
            'division_name.required' =>'This field is required',
        ]);

        try{
            $division = new Division();
            $division->division_name = $request->division_name;
            $division->save();
            return redirect()->back()->with('message','Division Added Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function edit($id)
    {
        $division = Division::find($id);
        return view('admin.division.edit',compact('division'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'division_name'=>'required'
        ],[
            'division_name.required' =>'This field is required',
        ]);

        try{
            $division = Division::find($id);
            $division->division_name = $request->division_name;

            $division->update();
            return redirect()->route('admin.division.index')->with('message','Division Update Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function destroy($id)
    {
         try{
            $division = Division::find($id);
            $division->delete();
            return redirect()->back()->with('message','Division Deleted Successfully');
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function active($id)
    {
       try{
         Division::findOrFail($id)->update(['status' => '1']);
         return redirect()->back()->with('message','Division Activate Successfully');
       }catch(Exception $e){
        return redirect()->back()->with('error',$e->getMessage());
       }
    }

    public function inactive($id)
    {
        try{
         Division::find($id)->update(['status' => '0']);
         return redirect()->back()->with('message','Division Inactivate Successfully');
       }catch(Exception $e){
        return redirect()->back()->with('error',$e->getMessage());
       }
    }

}
