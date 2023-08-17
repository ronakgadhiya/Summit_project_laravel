<?php

namespace App\Http\Controllers;
use App\Models\{Slider,Speacker,Aboutspeack, Blog, Contact,Tiket,Feature,Book};
use Illuminate\Http\Request;
use Auth;

class FrontendController extends Controller
{
    //
    public function index()
    {
        $homesliders = Slider::get();
        $this->data['homesliders'] = $homesliders;

        $top3speakers = Speacker::orderBy('id','asc')->take(3)->get();
        $this->data['top3speakers'] = $top3speakers;

         $speakabouts = Aboutspeack::orderBy('id','asc')->take(6)->get();
        $this->data['speakabouts'] = $speakabouts;
        return view('frontend.index', $this->data);

    }

    public function speaker(){

        $speakers = Speacker::get();
        //dd($speakers);
        $this->data['speakers'] = $speakers;
        return view('frontend.speaker',$this->data);
    }

    public function contact(){
        return view('frontend.contact');
    }


    public function contactform(Request $request){  
        $input = $request->all();
        //dd($request->all());
        $input['created_by'] =  0;
        $input['updated_by'] =  0;
        $contact = Contact::create($input);
        return redirect('/contact');
    }

    public function blog(){
        $blogiteams = Blog::paginate(5);
        $this->data['blogiteams'] = $blogiteams;
        return view('frontend.blog',$this->data);

    }

    public function ticket(){
        $packages = Tiket::get();
        $this->data['feature_list']=Feature::pluck('name','id')->toArray();
        $this->data['packages'] = $packages;
        return view('frontend.tickets',$this->data);
    }

    public function booktiket($id){
        
        $booktiket = Tiket::where('id',$id)->first();
       
       // dd($booktiket);
        $this->data['booktiket'] = $booktiket;
       return view('frontend.booktiket',$this->data);
    }

    public function tiketform(Request $request){
        $input = $request->all();
        //dd($request->all());
        $input['created_by'] =  0;
        $input['updated_by'] =  0;
        $tiketform = Book::create($input);
        return redirect('/');
    }

    public function eventdetail($id){

        $speakabout = Aboutspeack::where('id',$id)->first();

        // dd($speakabout);
        $this->data['speakabout'] = $speakabout;
        return view('frontend.eventdetail',$this->data);
    }
    
}
