@extends('backend.layouts.master')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css"> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- <a href="category/create" class="btn btn-sm btn-outline-primary" style="float:right;"><i class="fa fa-plus"></i> Add Category</a> --}}
            <h4 class="m-0 font-weight-bold text-primary">All Users
                <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="fa fa-plus"></i> Add User</a>
            </h4>
        </div>
        <div class="card-body">
            <table class="table w-100" id="dataTableBuilder">
                <thead>
                    <tr>
                        <th></th>
                        <th><div class="col-sm-12 datatable-form-filter no-padding"><input type="text" class="form-control" placeholder="" name="filter_f_name" autocomplete="off"></div></th>
                        <th><div class="col-sm-12 datatable-form-filter no-padding"><input type="text" class="form-control" placeholder="" name="filter_l_name" autocomplete="off"></div></th>
                        <th><div class="col-sm-12 datatable-form-filter no-padding"><input type="text" class="form-control" placeholder="" name="filter_username" autocomplete="off"></div></th>
                        <th><div class="col-sm-12 datatable-form-filter no-padding"><input type="text" class="form-control" placeholder="" name="filter_email" autocomplete="off"></div></th>
                        <th><div class="col-sm-12 datatable-form-filter no-padding"><input type="text" class="form-control" placeholder="" name="filter_mobile" autocomplete="off"></div></th>
                        <th>
                            <div class="col-sm-12 datatable-form-filter no-padding float-right">
                                {!! Form::select('filter_country',['' => 'All']+$country,null,['id' => 'filter_country','class' => 'form-control',]); !!}
                            </div>
                        </th>
                        <th>
                            <div class="col-sm-12 datatable-form-filter no-padding float-right">
                                {!! Form::select('filter_state',['' => 'All']+$state,null,['id' => 'filter_state','class' => 'form-control',]); !!}
                            </div>
                        </th>
                        <th>
                            <div class="col-sm-12 datatable-form-filter no-padding float-right">
                                {!! Form::select('filter_city',['' => 'All']+$city,null,['id' => 'filter_city','class' => 'form-control',]); !!}
                            </div>
                        </th>
                        <th></th>
                        <th></th>
                        
                    </tr>
                    <tr>
                            <th>ID</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>username</th>
                            <th>Email</th>
                            <th>mobile</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>status</th>
                            <th>Action</th>
                         
                    </tr>
                </thead>
                
            </table>
      
    </div>
</div>
</div>
@endsection
@include('backend.users.script')



