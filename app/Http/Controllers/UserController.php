<?php

namespace App\Http\Controllers;

use App\Models\{User,State,Country,City};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Validator;
use Log;
use App\DataTables\UserDataTable;
use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $dataTable)
    {
        // $data = Category::paginate(5);
        // return view('Category.list',['members'=>$data]);
        // return view('Category.list');
        
        //return $dataTable->render('users.list');
        $country = Country::pluck('name','id')->toArray();
        $state = State::pluck('name','id')->toArray();
        $city = City::pluck('name','id')->toArray();
        return $dataTable->render('backend.users.list',['state' => $state,'country'=>$country,'city'=>$city]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //  return view('users.add');
        $country = Country::pluck('name','id');
        $state = State::pluck('name','id');
        $city = City::pluck('name','id');
        return view('backend.users.add',['state' => $state,'country' => $country,'city'=>$city]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'f_name' => ['required', 'string', 'max:30', 'unique:users', 'regex:/^\S*$/u'],
            'l_name' => ['required', 'string', 'max:30', 'unique:users', 'regex:/^\S*$/u'],
            'username'=>['required', 'string', 'max:30', 'unique:users', 'regex:/^\S*$/u'],
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:12',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'min:8|required_with:conform_password|same:conform_password',
            'conform_password' => 'min:8',
        ]);
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $input['created_by'] =  Auth::id();
            $input['updated_by'] =  0;
            $users = User::create($input);

        return redirect('admin/users');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::pluck('name','id');
        $state = State::pluck('name','id');
        $city = City::pluck('name','id');
        $users = User::find($id);
        $this->data['users'] = $users;
        return view('backend.users.edit',$this->data,['users'=> $users,'state' => $state,'country'=>$country,'city'=>$city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'f_name' => [ 'string', 'max:30', 'regex:/^\S*$/u'],
            'l_name' => [ 'string', 'max:30',  'regex:/^\S*$/u'],
            'username'=>[ 'string', 'max:30', 'regex:/^\S*$/u'],
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:12',
            'email' => 'required|string|email|max:255',
            // 'address' => 'required'

        ]);
        if ($request->password != "") {

            $request->validate([
                'password' => 'min:8|required_with:conform_password|same:conform_password',
                'conform_password' => 'min:8',
            ]);
        }

            // $data = User::find($id);
            // $data->f_name = $request->f_name;
            // $data->l_name = $request->l_name;
            // $data->mobile = $request->mobile;
            // $data->email = $request->email;
            // $data->password = Hash::make($request->password);
            // $data->address = $request->address;
            // $data->created_by = '0';
            // $data->updated_by = Auth::id();

            // $data->save();

            $input = $request->all();
            unset($input['_token']);
            unset($input['_method']);
            unset($input['conform_password']);
            unset($input['password']);
            if ($request->password != "") {
                $input['password'] = Hash::make($request->password);
            }
            $input['updated_by'] =  Auth::id();
            $users = User::where('id',$id)->update($input);
            return redirect('admin/users')->with('success','Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('admin/users')->with('warning','deleted Successfully');
    }

    public function datatableAjaxusers()
    {
        return datatables()->of(User::query())->make(true);
    }
    public function changeStatusUsers(Request $request)
    {
        $team = User::where('id',$request->id)->update(['status' => $request->status]);
        return response()->json(['success'=>'Status changed successfully.']);
    }
    
}
