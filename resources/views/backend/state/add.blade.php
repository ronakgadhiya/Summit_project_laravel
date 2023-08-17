@extends('backend.layouts.master')
@section('title', 'State')
@section('content')

<!-- Begin Page Content --> 
 <div class="container-fluid">

    <!-- Page Heading -->
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">State Details</h4>
            </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add State
                <a href="{{ route('state.index') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="	fas fa-angle-left"></i> Back</a>
            </h6>
        </div>
        <div class="card-body">
                    {!! Form::open(array('route' => 'state.store','role'=>"form",'id'=>'stateForm','enctype' => 'multipart/form-data')) !!}
                    @include('backend.state.form',[
                       'state' => null
                   ])
                    {!! Form::close() !!}
             
        </div>
    </div>

</div>
 
 @endsection
 