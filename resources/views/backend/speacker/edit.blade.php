@extends('backend.layouts.master')
@section('title', 'Speacker')
@section('content')


<div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Update Speacker</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Speacker Edit
                    <a href="{{ route('speacker.index') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="fas fa-angle-left"></i> Back</a>
                </h6>
            </div>
            <div class="card-body">
               
                        {!! Form::model($speacker,array('route' => array('speacker.update', $speacker->id),'role'=>"form",'id'=>'speackerForm','enctype' => 'multipart/form-data')) !!}
                            @method('PUT')
                        
                            {!! Form::hidden('id', $speacker->id , ['id' => 'id']) !!}
                            @include('backend.speacker.form',[
                                'speacker' => $speacker
                            ])
                            
                        {!! Form::close() !!}
                   
            </div>
        </div>
    
</div>
@endsection