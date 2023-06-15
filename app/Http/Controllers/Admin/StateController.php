<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;
use App\Models\State;

class StateController extends Controller
{
    public function index()
    {
        $divisions = Division::orderBy('id','DESC')->get();
        $states = State::with('division','district')->orderBy('id','DESC')->get();
        return view('admin.state.index',compact('divisions','states'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'division_id'=>'required',
            'district_id'=>'required',
            'state_name'=>'required',
        ],[
            'division_id.required' =>'This field is required',
            'district_id.required' =>'This field is required',
            'state_name.required' =>'This field is required',
        ]);

        try{
            $state = new State();
            $state->division_id = $request->division_id;
            $state->district_id = $request->district_id;
            $state->state_name = $request->state_name;
            $state->save();
            return redirect()->back()->with('message','State Added Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function edit($id)
    {
        $divisions = Division::orderBy('id','DESC')->get();
        $state = State::find($id);
        $districts = District::where('division_id',$state->division_id)->where('status','1')->orderBy('district_name','ASC')->get();

        return view('admin.state.edit',compact('state','districts','divisions'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'division_id'=>'required',
            'district_id'=>'required',
            'state_name'=>'required',
        ],[
            'division_id.required' =>'This field is required',
            'district_id.required' =>'This field is required',
            'state_name.required' =>'This field is required',
        ]);

        try{
            $state = State::find($id);
            $state->division_id = $request->division_id;
            $state->district_id = $request->district_id;
            $state->state_name = $request->state_name;

            $state->update();
            return redirect()->route('admin.state.index')->with('message','State Update Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function destroy($id)
    {
         try{
            $state = State::find($id);
            $state->delete();
            return redirect()->back()->with('message','State Deleted Successfully');
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function getDistrict($division_id)
    {
        $districts = District::where('division_id',$division_id)->where('status','1')->orderBy('id','ASC')->get();
        return json_encode($districts);
    }
}
