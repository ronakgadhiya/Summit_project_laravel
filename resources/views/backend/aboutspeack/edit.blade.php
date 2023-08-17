@extends('backend.layouts.master')
@section('title', 'Aboutspeack')
@section('content')


<div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Update Aboutspeack</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aboutspeack Edit
                    <a href="{{ route('aboutspeack.index') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="fas fa-angle-left"></i> Back</a>
                </h6>
            </div>
            <div class="card-body">
               
                        {!! Form::model($aboutspeack,array('route' => array('aboutspeack.update', $aboutspeack->id),'role'=>"form",'id'=>'aboutspeackForm','enctype' => 'multipart/form-data')) !!}
                            @method('PUT')
                        
                            {!! Form::hidden('id', $aboutspeack->id , ['id' => 'id']) !!}
                            @include('backend.aboutspeack.form',[
                                'aboutspeack' => $aboutspeack
                            ])
                            
                        {!! Form::close() !!}
                   
            </div>
        </div>
    
</div>
@endsection