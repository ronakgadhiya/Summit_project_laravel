@extends('backend.layouts.master')
@section('title', 'Feature')
@section('content')
<div class="container-fluid">
 <!-- Begin Page Content -->

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Update Feature</h1>    
    <div class="card shadow mb-4">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        </div>
    
        <!-- Content Row -->
       
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary color-white">Feature Edit
                    <a href="{{ route('feature.index') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="fas fa-angle-left"></i> Back</a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                            {!! Form::model($features,array('route' => array('feature.update', $features->id),'role'=>"form",'id'=>'featureForm','enctype' => 'multipart/form-data')) !!}
                            @method('PUT')
                    
                            {!! Form::hidden('id', $features->id , ['id' => 'id']) !!}
                              @include('backend.feature.form',[
                                  'features' => $features
                              ])
                              
                            {!! Form::close() !!}
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection