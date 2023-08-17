<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\{Blog};
use App\DataTables\BlogDataTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Validation\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BlogDataTable $dataTable)
    {
        //
        return $dataTable->render('backend.blog.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.blog.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $request->validate([
            'image' => 'required:mimes:jpg,jpeg,png|max:2048',
            'title' => 'required',
            'discription' => '',
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
        $blog = Blog::create($input);
        //dd($blog);

        return redirect('admin/blog');
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
        $blog = Blog::find($id);
        $this->data['blog'] = $blog;
        return view('backend.blog.edit',$this->data);
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
        $blog = Blog::where('id',$id)->update($input);
        return redirect('admin/blog')->with('success','Update Successfully');
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
        $data = Blog::find($id);
        $data->delete();
        return redirect('admin/blog')->with('warning','deleted Successfully');
    }
    public function changeStatusBlog(Request $request)
    {
        $team = Blog::where('id',$request->id)->update(['status' => $request->status]);
        return response()->json(['success'=>'Status changed successfully.']);
    }
}
