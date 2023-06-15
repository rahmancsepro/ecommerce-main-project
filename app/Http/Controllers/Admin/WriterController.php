<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Writer;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Exception;
use Image;
use Carbon\Carbon;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $writers = Writer::latest()->get();
        return view('admin.writer.index',compact('writers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.writer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en'=>'required',
            'name_bn'=>'required',
            'phone_en'=>'required',
            'phone_bn'=>'required',
            'email'=>'required',
            'image'=>'required',
            'dob_en'=>'required',
            'dob_bn'=>'required',
            'dod_en'=>'required',
            'dod_bn'=>'required',
            'history_of_life_en'=>'required',
            'history_of_life_bn'=>'required',
            'description_en'=>'required',
            'description_bn'=>'required',
        ],[
            'name_en.required' =>'This field is required',
            'name_bn.required' =>'This field is required',
            'phone_en.required' =>'This field is required',
            'phone_bn.required' =>'This field is required',
            'email.required' =>'This field is required',
            'image.required' =>'This field is required',
            'dob_en.required' =>'This field is required',
            'dob_bn.required' =>'This field is required',
            'dod_en.required' =>'This field is required',
            'dod_bn.required' =>'This field is required',
            'history_of_life_en.required' =>'This field is required',
            'history_of_life_bn.required' =>'This field is required',
            'description_en.required' =>'This field is required',
            'description_bn.required' =>'This field is required',
        ]);

        try{

             if($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = 'boiutso-'.Str::random(20) . '-' . now()->timestamp . '.' . $image->getClientOriginalExtension();
                    $imageUrl = 'uploads/writers/'.$imageName;
                    Image::make($image)->resize(917,1000)->save($imageUrl);
            }

            Writer::insert([
                'name_en' => $request->name_en,
                'name_bn' => $request->name_bn,
                'phone_en' => $request->phone_en,
                'phone_bn' => $request->phone_bn,
                'email' => $request->email,
                'image' => $imageUrl,
                'dob_en' => $request->dob_en,
                'dob_bn' => $request->dob_bn,
                'dod_en' => $request->dod_en,
                'dod_bn' => $request->dod_bn,
                'history_of_life_en' => $request->history_of_life_en,
                'history_of_life_bn' => $request->history_of_life_bn,
                'description_en' => $request->description_en,
                'description_bn' => $request->description_bn,
                'created_at' => Carbon::now(),
            ]);

            return redirect()->route('admin.writer.index')->with('message','Writer Added Successfully');
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
        $writer    = Writer::find($id);
        return view('admin.writer.edit',compact('writer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'name_en'=>'required',
            'name_bn'=>'required',
            'phone_en'=>'required|unique:writers,phone_en,'.$id,
            'phone_bn'=>'required|unique:writers,phone_bn,'.$id,
            'email'=>'required|unique:writers,email,'.$id,
            'dob_en'=>'required',
            'dob_bn'=>'required',
            'dod_en'=>'required',
            'dod_bn'=>'required',
            'history_of_life_en'=>'required',
            'history_of_life_bn'=>'required',
            'description_en'=>'required',
            'description_bn'=>'required',
        ],[
            'name_en.required' =>'This field is required',
            'name_bn.required' =>'This field is required',
            'phone_en.required' =>'This field is required',
            'phone_bn.required' =>'This field is required',
            'email.required' =>'This field is required',
            'dob_en.required' =>'This field is required',
            'dob_bn.required' =>'This field is required',
            'dod_en.required' =>'This field is required',
            'dod_bn.required' =>'This field is required',
            'history_of_life_en.required' =>'This field is required',
            'history_of_life_bn.required' =>'This field is required',
            'description_en.required' =>'This field is required',
            'description_bn.required' =>'This field is required',
        ]);

        try{
            if($request->hasFile('image')) {
                $writer = Writer::find($id);
                if ($writer->image != null){
                    File::delete(public_path($writer->image)); //Old image delete
                }

                $image = $request->file('image');
                $imageName = 'boiutso-'.Str::random(20) . '-' . now()->timestamp . '.' . $image->getClientOriginalExtension();
                    $imageUrl = 'uploads/writers/'.$imageName;
                    Image::make($image)->resize(917,1000)->save($imageUrl);
                $writer->image = $imageUrl;
                $writer->update();
            }

            Writer::find($id)->update([
                'name_en' => $request->name_en,
                'name_bn' => $request->name_bn,
                'phone_en' => $request->phone_en,
                'phone_bn' => $request->phone_bn,
                'email' => $request->email,
                'dob_en' => $request->dob_en,
                'dob_bn' => $request->dob_bn,
                'dod_en' => $request->dod_en,
                'dod_bn' => $request->dod_bn,
                'history_of_life_en' => $request->history_of_life_en,
                'history_of_life_bn' => $request->history_of_life_bn,
                'description_en' => $request->description_en,
                'description_bn' => $request->description_bn,
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->route('admin.writer.index')->with('message','Writer Updated Successfully');
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
            $writer = Writer::find($id);
            if ($writer->image != null){
                File::delete(public_path($writer->image)); //Old image delete
            }
             Writer::find($id)->delete();

             return redirect()->back()->with('message','Writer Deleted Successfully');
        }
        catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function active($id)
    {
       try{
         Writer::findOrFail($id)->update(['status' => '1']);
         return redirect()->back()->with('message','Writer Activate Successfully');
       }catch(Exception $e){
        return redirect()->back()->with('error',$e->getMessage());
       }
    }

    public function inactive($id)
    {
        try{
         Writer::find($id)->update(['status' => '0']);
         return redirect()->back()->with('message','Writer Inactivate Successfully');
       }catch(Exception $e){
        return redirect()->back()->with('error',$e->getMessage());
       }
    }
}
