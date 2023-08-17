<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\{Feature, Tiket,User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Validation\Validator;
use App\DataTables\TiketDataTable;
use Symfony\Component\Console\Input\Input;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TiketDataTable $dataTable)
    {
        //
        $username = User::pluck('username','id')->toArray();
        $feature = Feature::pluck('name','id')->toArray();
        return $dataTable->render('backend.tikets.list',['username' => $username, 'feature' => $feature]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       // dd('frdd');
       $username = User::pluck('username','id')->toArray();
       $feature = Feature::pluck('name','id')->toArray();
        return view('backend.tikets.add',['username'=>$username,'feature'=>$feature]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
       // dd($input);
        $input['created_by'] =  Auth::id();
        $input['feature'] =  implode(',', $request->feature);
        $input['updated_by'] =  0;
        $tiket = Tiket::create($input);
        return redirect('admin/tiket');
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
        $username = User::pluck('username','id')->toArray();
        $feature = Feature::pluck('name','id')->toArray();
        $tiket = tiket::find($id);
        $this->data['tikets'] = $tiket;
        return view('backend.tikets.edit',$this->data,['tiket'=> $tiket,'username'=>$username,'feature'=>$feature]);
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

        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);
        $input['feature'] =  implode(',', $request->feature);
        $input['updated_by'] =  Auth::id();
        $tiket = Tiket::where('id',$id)->update($input);
        return redirect('admin/tiket')->with('success','Update Successfully');

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
        $data = Tiket::find($id);
        $data->delete();
        return redirect('admin/tiket')->with('warning','deleted Successfully');
    }
    public function changeStatusTiket(Request $request)
    {
        $team = Tiket::where('id',$request->id)->update(['status' => $request->status]);
        return response()->json(['success'=>'Status changed successfully.']);
    }
}
