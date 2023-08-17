<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\{Slider};
use App\DataTables\SliderDataTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Validation\Validator;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SliderDataTable $dataTable)
    {
        //
        return $dataTable->render('backend.slider.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.slider.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd('errgvdf');
        $request->validate([
            'image' => 'required:mimes:jpg,jpeg,png|max:2048',
            'title' => 'required',
            'subtitle' => 'required',
        ]);

        // $fileName = time().'.'.$request->file->extension();  
        $input = $request->all();
        $input['created_by'] =  Auth::id();
        $input['updated_by'] =  0;
        // $request->file->move(public_path('images'), $fileName);
        unset($input['image']);
        if ($request->has('image')) {
            $imageName = time().'.'.$request->image->extension();  
            
            if($request->image->move(public_path('images'), $imageName))
            {
                $input['image']=$imageName;
            }
        }
        $slider = Slider::create($input);
        return redirect('admin/slider');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $slider = Slider::find($id);
        $this->data['slider'] = $slider;
        return view('backend.slider.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            // 'file' => 'required|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required',
            'subtitle' => 'required',
           
        ]);
  
        $input = $request->all();
        unset($input['image']);
        if ($request->has('image')) {
            $imageName = time().'.'.$request->image->extension();  
            
            if($request->image->move(public_path('images'), $imageName))
            {
                $input['image']=$imageName;
            }
        }
        
        unset($input['_token']);
        unset($input['_method']);
        $input['updated_by'] =  Auth::id();
        $slider = Slider::where('id',$id)->update($input);
        return redirect('admin/slider')->with('success','Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Slider::find($id);
        $data->delete();
        return redirect('admin/slider')->with('warning','deleted Successfully');
    }
    public function changeStatusSlider(Request $request)
    {
        $team = Slider::where('id',$request->id)->update(['status' => $request->status]);
        return response()->json(['success'=>'Status changed successfully.']);
    }
}
