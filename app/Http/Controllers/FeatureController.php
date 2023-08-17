<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Validation\Validator;
use Log;
use Auth;
use App\DataTables\FeatureDataTable;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FeatureDataTable $dataTable)
    {
        //
        return $dataTable->render('backend.feature.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.feature.add');
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
        $request->validate([
            'name' => 'required',
        ]);
        
        $input = $request->all();
        $input['created_by'] =  Auth::id();
        $input['updated_by'] =  0;
        $feature = Feature::create($input);
        return redirect('admin/feature');
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
        $features = Feature::find($id);
        $this->data['features'] = $features;
        return view('backend.feature.edit',$this->data);
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
            'name' => 'required',
        ]);
           
            $input = $request->all();
            unset($input['_token']);
            unset($input['_method']);
            $input['updated_by'] =  Auth::id();
            $features = Feature::where('id',$id)->update($input);
            
            return redirect('admin/feature')->with('success','Update Successfully');
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
        $data = Feature::find($id);
        $data->delete();
        return redirect('admin/feature')->with('warning','deleted Successfully');
    }
    public function datatableAjaxfeature()
    {
        return datatables()->of(Feature::query())->make(true);
    }

    public function changeStatusfeature(Request $request)
    {
        $team = Feature::where('id',$request->id)->update(['status' => $request->status]);
        return response()->json(['success'=>'Status changed successfully.']);
    }

}
