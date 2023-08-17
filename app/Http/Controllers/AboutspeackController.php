<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\{Aboutspeack};
use App\DataTables\AboutspeackDataTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Validation\Validator;

class AboutspeackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AboutspeackDataTable $dataTable)
    {
        //
        return $dataTable->render('backend.aboutspeack.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.aboutspeack.add');

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
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'position' => 'required',
        ]);

        // $fileName = time().'.'.$request->file->extension();  
        $input = $request->all();
        $input['created_by'] =  Auth::id();
        $input['updated_by'] =  0;
        $aboutspeack = Aboutspeack::create($input);

        return redirect('admin/aboutspeack');

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
        $aboutspeack = Aboutspeack::find($id);
        $this->data['aboutspeack'] = $aboutspeack;
        return view('backend.aboutspeack.edit',$this->data);
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
            'title' => 'required',
            'name' => 'required',
            'position' => 'required',
           
        ]);
  
        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);
        $input['updated_by'] =  Auth::id();
        $aboutspeack = Aboutspeack::where('id',$id)->update($input);
        return redirect('admin/aboutspeack')->with('success','Update Successfully');
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
        $data = Aboutspeack::find($id);
        $data->delete();
        return redirect('admin/aboutspeack')->with('warning','deleted Successfully');
    }
    public function changeStatusAboutspeack(Request $request)
    {
        $team = Aboutspeack::where('id',$request->id)->update(['status' => $request->status]);
        return response()->json(['success'=>'Status changed successfully.']);
    }
}
