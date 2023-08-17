<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\{Country,State};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Validation\Validator;
use App\DataTables\StateDataTable;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StateDataTable $dataTable)
    {
        //
        $country = Country::pluck('name','id')->toArray();
        return $dataTable->render('backend.state.list',['country' => $country]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $country = Country::pluck('name','id');
        return view('backend.state.add',['country' => $country]);
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
        $state = State::create($input);

        return redirect('admin/state');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $country = Country::pluck('name','id');
        $state = State::find($id);
        $this->data['state'] = $state;
        return view('backend.state.edit',$this->data,['state' => $state,'country' => $country]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $request->validate([
            'name' => 'required'
            
        ]);
        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);
        $input['updated_by'] =  Auth::id();
        $state = State::where('id',$id)->update($input);
        return redirect('admin/state')->with('success','Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = State::find($id);
        $data->delete();
        return redirect('admin/state')->with('warning','deleted Successfully');

    }
    // public function datatableAjaxState()
    // {
    //     return datatables()->of(State::with('Country')->get())->make(true);
    // }

    public function changeStatusState(Request $request)
    {
        $team = State::where('id',$request->id)->update(['status' => $request->status]);
        return response()->json(['success'=>'Status changed successfully.']);
    }
}
