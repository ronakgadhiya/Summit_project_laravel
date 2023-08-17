@extends('backend.layouts.master')
@section('title', 'country')
@section('content')
<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Country Details</h4>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Country
                <a href="{{ route('country.index') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="fas fa-angle-left"></i> Back</a>
            </h6>
        </div>
        <div class="card-body">
                    {!! Form::open(array('route' => 'country.store','role'=>"form",'id'=>'countryForm','enctype' => 'multipart/form-data')) !!}
                        @include('backend.country.form',[
                        'categories' => null
                    ])
                
        </div>
    </div>

</div>
@endsection