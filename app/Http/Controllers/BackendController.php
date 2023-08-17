<?php

namespace App\Http\Controllers;
use App\Models\{Country, State,City, Slider, Speacker, User,Feature,Tiket,Blog,Aboutspeack};
use Illuminate\Http\Request;

class BackendController extends Controller
{
    //
    public function index()
    {
        $country = Country::where('status','1')->count();
        $city = City::where('status','1')->count();
        $state = State::where('status','1')->count();
        $user = User::where('status','1')->count();
        $slider = Slider::where('status','1')->count();
        $speacker = Speacker::where('status','1')->count();
        $blog = Blog::where('status','1')->count();
        $feature = Feature::where('status','1')->count();
        $tiket = Tiket::where('status','1')->count();
        $aboutspeack = Aboutspeack::where('status','1')->count();
        
        return view('backend.admin',[
            'country'=>$country,
            'city'=>$city,
            'state'=>$state,
            'user'=>$user,
            'slider'=>$slider,
            'speacker'=>$speacker,
            'blog'=>$blog,
            'aboutspeack'=>$aboutspeack,
            'feature'=>$feature,
            'tiket'=>$tiket,
        ]);
    }
}
