<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Exception;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::get();
        return view('admin.slider.index',compact('sliders'));
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
            'title_en'=>'required|unique:sliders,title_en',
            'title_bn'=>'required|unique:sliders,title_bn',
            'description_en'=>'required',
            'description_bn'=>'required',
            'image'=>'required',
        ],[
            'title_en.required' =>'This field is required',
            'title_bn.required' =>'This field is required',
            'description_en.required' =>'This field is required',
            'description_bn.required' =>'This field is required',
            'image.required' =>'This field is required',
        ]);

        try{
            $slider = new Slider();
            $slider->title_en = $request->title_en;
            $slider->title_bn = $request->title_bn;
            $slider->description_en = $request->description_en;
            $slider->description_bn = $request->description_bn;

            if($request->hasFile('image')) {
                if ($slider->image != null){
                    File::delete(public_path($slider->image)); //Old image delete
                }
                $file = $request->file('image');
                $imgname = 'boiutso-'.Str::random(20) . '-' . now()->timestamp . '.' . $file->getClientOriginalExtension();
                $url = 'uploads/slider/'.$imgname;
                Image::make($file)->resize(870,370)->save($url);
            }
            $slider->image = $url;
            $slider->save();
            return redirect()->back()->with('message','Slider Added Successfully');
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
        $slider    = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title_en'=>'required|unique:sliders,title_en,'.$id,
            'title_bn'=>'required|unique:sliders,title_bn,'.$id,
            'description_en'=>'required',
            'description_bn'=>'required',
        ],[
            'title_en.required' =>'This field is required',
            'title_bn.required' =>'This field is required',
            'description_en.required' =>'This field is required',
            'description_bn.required' =>'This field is required',
        ]);

        try{
            $slider = Slider::find($id);
            $slider->title_en = $request->title_en;
            $slider->title_bn = $request->title_bn;
            $slider->description_en = $request->description_en;
            $slider->description_bn = $request->description_bn;

            if($request->hasFile('image')) {
                if ($slider->image != null){
                    File::delete(public_path($slider->image)); //Old image delete
                }
                $file = $request->file('image');
                $imgname = 'boiutso-'.Str::random(20) . '-' . now()->timestamp . '.' . $file->getClientOriginalExtension();
                $url = 'uploads/slider/'.$imgname;
                Image::make($file)->resize(870,370)->save($url);
                $slider->image = $url;
                $slider->update();
            }
            $slider->update();
            return redirect()->route('admin.slider.index')->with('message','Slider Update Successfully');
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
        $slider = Slider::find($id);
        if ($slider->image != null){
            File::delete(public_path($slider->image)); //Old image delete
        }
        try{
            $slider = Slider::find($id);
            $slider->delete();
            return redirect()->back()->with('message','Slider Deleted Successfully');
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    public function active($id)
    {
       try{
         Slider::findOrFail($id)->update(['status' => '1']);
         return redirect()->back()->with('message','Slider Activate Successfully');
       }catch(Exception $e){
        return redirect()->back()->with('error',$e->getMessage());
       }
    }

    public function inactive($id)
    {
        try{
         Slider::find($id)->update(['status' => '0']);
         return redirect()->back()->with('message','Slider Inactivate Successfully');
       }catch(Exception $e){
        return redirect()->back()->with('error',$e->getMessage());
       }
    }
}
