@extends('backend.layouts.master')
@section('title', 'State')
@section('content')

@if (session('status'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
</div>
@endif
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css"> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                {{-- <a href="category/create" class="btn btn-sm btn-outline-primary" style="float:right;"><i class="fa fa-plus"></i> Add Category</a> --}}
                <h4 class="m-0 font-weight-bold text-primary">State Details
                    <a href="state/create" class="btn btn-sm btn-primary" style="float:right;"><i class="fa fa-plus"></i> Add State</a> 
                </h4>
            </div>
            <div class="card-body">
                <table class="table w-100" id="dataTableBuilder">
                    <thead>
                        <tr>
                            <th></th>
                            <th><div class="col-sm-12 datatable-form-filter no-padding float-right">
                                    {!! Form::select('filter_country',['' => 'All']+$country,null,['id' => 'filter_country','class' => 'form-control',]); !!}
                                </div>
                            </th>
                            <th><div class="col-sm-12 datatable-form-filter no-padding float-right"><input type="text" placeholder="Search" class="form-control" name="filter_name" autocomplete="off"></div></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                                <th>ID</th>
                                <th>Country</th>
                                <th>State Name</th>
                                <th>Status</th>
                                <th>Action</th>
                        </tr>
                    </thead>
                    
                </table>
          
        </div>
    </div>
</div>
@endsection
@include('backend.state.script')

