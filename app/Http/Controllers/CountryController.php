<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Validation\Validator;
use Log;
use Auth;
use App\DataTables\CountryDataTable;


class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CountryDataTable $dataTable)
    {
        //
        return $dataTable->render('backend.country.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.country.add');
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
            'code' => 'required'
        ]);
        $input = $request->all();

        $input['created_by'] =  Auth::id();
        $country = Country::create($input);
        return redirect('admin/country');
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
        $country = Country::find($id);
        $this->data['country'] = $country;
        return view('backend.country.edit',$this->data);
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
            'code' => 'required',
        ]);
            // $data = Category::find($id);
            // $data->name = $request->name;
            // $data->save();
            $input = $request->all();
            unset($input['_token']);
            unset($input['_method']);
            $input['updated_by'] =  Auth::id();
            $Country = Country::where('id',$id)->update($input);
            
            return redirect('admin/country')->with('success','Update Successfully');
          
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
        $data = Country::find($id);
        $data->delete();
        return redirect('admin/country')->with('warning','deleted Successfully');
    }
    // public function datatableAjaxcountry()
    // {
    //     return datatables()->of(Country::query())->make(true);
    // }

    public function changeStatusCountry(Request $request)
    {
        $team = Country::where('id',$request->id)->update(['status' => $request->status]);
        return response()->json(['success'=>'Status changed successfully.']);
    }
}
