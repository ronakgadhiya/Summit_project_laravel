@extends('backend.layouts.master')
@section('title', 'State')
@section('content')


<div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Update State
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update State
                    <a href="{{ route('state.index') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="fas fa-angle-left"></i> Back</a>
                </h6>
            </div>
            <div class="card-body">
                        {!! Form::model($state,array('route' => array('state.update', $state->id),'role'=>"form",'id'=>'stateForm','enctype' => 'multipart/form-data')) !!}
                            @method('PUT')
                        
                            {!! Form::hidden('id', $state->id , ['id' => 'id']) !!}
                            @include('backend.state.form',[
                                'state' => $state
                            ])
                            
                        {!! Form::close() !!}
                  
            </div>
        </div>
    
</div>
@endsection



