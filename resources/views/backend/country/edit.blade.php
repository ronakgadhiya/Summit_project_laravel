@extends('backend.layouts.master')
@section('title', 'Country')
@section('content')


<div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Update Country</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Country Edit
                    <a href="{{ route('country.index') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="fas fa-angle-left"></i> Back</a>
                </h6>
            </div>
            <div class="card-body">
               
                        {!! Form::model($country,array('route' => array('country.update', $country->id),'role'=>"form",'id'=>'countryForm','enctype' => 'multipart/form-data')) !!}
                            @method('PUT')
                        
                            {!! Form::hidden('id', $country->id , ['id' => 'id']) !!}
                            @include('backend.country.form',[
                                'country' => $country
                            ])
                            
                        {!! Form::close() !!}
                   
            </div>
        </div>
    
</div>
@endsection