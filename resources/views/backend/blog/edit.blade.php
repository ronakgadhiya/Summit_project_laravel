@extends('backend.layouts.master')
@section('title', 'Blog')
@section('content')


<div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Update Blog</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Blog Edit
                    <a href="{{ route('blog.index') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="fas fa-angle-left"></i> Back</a>
                </h6>
            </div>
            <div class="card-body">
               
                        {!! Form::model($blog,array('route' => array('blog.update', $blog->id),'role'=>"form",'id'=>'blogForm','enctype' => 'multipart/form-data')) !!}
                            @method('PUT')
                        
                            {!! Form::hidden('id', $blog->id , ['id' => 'id']) !!}
                            @include('backend.blog.form',[
                                'blog' => $blog
                            ])
                            
                        {!! Form::close() !!}
                   
            </div>
        </div>
    
</div>
@endsection