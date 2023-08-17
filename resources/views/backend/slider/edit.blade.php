@extends('backend.layouts.master')
@section('title', 'Slider')
@section('content')


<div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Update Slider</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Slider Edit
                    <a href="{{ route('slider.index') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="fas fa-angle-left"></i> Back</a>
                </h6>
            </div>
            <div class="card-body">
               
                        {!! Form::model($slider,array('route' => array('slider.update', $slider->id),'role'=>"form",'id'=>'sliderForm','enctype' => 'multipart/form-data')) !!}
                            @method('PUT')
                        
                            {!! Form::hidden('id', $slider->id , ['id' => 'id']) !!}
                            @include('backend.slider.form',[
                                'slider' => $slider
                            ])
                            
                        {!! Form::close() !!}
                   
            </div>
        </div>
    
</div>
@endsection