@extends('backend.layouts.master')
@section('title', 'Blog')
@section('content')

<!-- Begin Page Content --> 
 <div class="container-fluid">

    <!-- Page Heading -->
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Blog Details</h4>
            </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Blog
                <a href="{{ route('blog.index') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="	fas fa-angle-left"></i> Back</a>
            </h6>
        </div>
        <div class="card-body">
                {!! Form::open(array('route' => 'blog.store','role'=>"form",'id'=>'blogForm','enctype' => 'multipart/form-data')) !!}
                    @include('backend.blog.form',[
                       'blog' => null
                   ])
                {!! Form::close() !!}
        </div>
    </div>

</div>
 
 @endsection
 