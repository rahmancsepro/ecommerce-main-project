<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;

class DistrictController extends Controller
{
     public function index()
    {
        $divisions = Division::orderBy('id','DESC')->get();
        $districts = District::with('division')->orderBy('id','DESC')->get();
        return view('admin.district.index',compact('districts','divisions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'division_id'=>'required',
            'district_name'=>'required',
        ],[
            'division_id.required' =>'This field is required',
            'district_name.required' =>'This field is required',
        ]);

        try{
            $district = new District();
            $district->division_id = $request->division_id;
            $district->district_name = $request->district_name;
            $district->save();
            return redirect()->back()->with('message','District Added Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function edit($id)
    {
        $divisions = Division::orderBy('id','DESC')->get();
        $district = District::find($id);
        return view('admin.district.edit',compact('district','divisions'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'division_id'=>'required',
            'district_name'=>'required'
        ],[
            'division_id.required' =>'This field is required',
            'division_name.required' =>'This field is required',
        ]);

        try{
            $district = District::find($id);
            $district->division_id = $request->division_id;
            $district->district_name = $request->district_name;

            $district->update();
            return redirect()->route('admin.district.index')->with('message','District Update Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function destroy($id)
    {
         try{
            $district = District::find($id);
            $district->delete();
            return redirect()->back()->with('message','District Deleted Successfully');
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function active($id)
    {
       try{
         District::findOrFail($id)->update(['status' => '1']);
         return redirect()->back()->with('message','District Activate Successfully');
       }catch(Exception $e){
        return redirect()->back()->with('error',$e->getMessage());
       }
    }

    public function inactive($id)
    {
        try{
         District::find($id)->update(['status' => '0']);
         return redirect()->back()->with('message','District Inactivate Successfully');
       }catch(Exception $e){
        return redirect()->back()->with('error',$e->getMessage());
       }
    }
}
