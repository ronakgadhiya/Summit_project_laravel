<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\{Country,State,City};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Validation\Validator;
use App\DataTables\CityDataTable;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CityDataTable $dataTable)
    {
        //
        $state = State::pluck('name','id')->toArray();
        $country = Country::pluck('name','id')->toArray();
        return $dataTable->render('backend.city.list',['state' => $state,'country'=>$country]);
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
        $state = State::pluck('name','id');
        return view('backend.city.add',['state' => $state,'country' => $country]);
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
        $city = City::create($input);

        return redirect('admin/city');
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
        $country = Country::pluck('name','id');
        $state = State::pluck('name','id');
        $city = City::find($id);
        $this->data['city'] = $city;
        return view('backend.city.edit',$this->data,['state' => $state,'country' => $country,'city' => $city]);
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
            'state_id' => 'required',
        ]);
        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);
        $input['updated_by'] =  Auth::id();
        $city = City::where('id',$id)->update($input);
        return redirect('admin/city')->with('success','Update Successfully');
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
        $data = City::find($id);
        $data->delete();
        return redirect('admin/city')->with('warning','deleted Successfully');

    }
    public function datatableAjaxCity()
    {
        return datatables()->of(City::with('Country')->get())->make(true);
    }

    public function changeStatusCity(Request $request)
    {
        $team = City::where('id',$request->id)->update(['status' => $request->status]);
        return response()->json(['success'=>'Status changed successfully.']);
    }
}
