<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Slider;

class SliderController extends Controller
{
    public function slider()
    {
        $sliderList = Slider::all();

        return view('admin.addSlider',['sliderList'=>$sliderList]);
    }
    public function addSlider(Request $req)
    {
        $slider = new Slider;
        
        $slider->title = $req->input('title');
        $slider->slug = $req->input('slug');
        $slider->slider = $req->file('slider')->store('uploads');
        $slider->slider_status = 1;

        return $slider->save();

        if($result)
        {
            return redirect('/slider');
        }

    }
}
