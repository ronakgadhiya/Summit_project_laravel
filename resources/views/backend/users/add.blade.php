@extends('backend.layouts.master')
@section('title', 'User')
@section('content')


<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">User Details</h4>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add User</h6>
            <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="	fas fa-angle-left"></i> Back</a>
            </a>
        </div>
        <div class="card-body">
                    {!! Form::open(array('route' => 'users.store','role'=>"form",'id'=>'usersForm','enctype' => 'multipart/form-data')) !!}
                        @include('backend.users.form',[
                        'users' => null
                        ])
                    {!! Form::close() !!}
        </div>
    </div>

</div>




@endsection
 @section('script')
    <script>
        $( document ).ready(function() {
            $(document).on('change','#country_id',function () {
                var val = $(this).val();
                if (val != '') {
                    $.ajax({
                    type: "POST",
                    url: "{{ route('getstate') }}",
                    data: {"id":val,"_token": "{{ csrf_token() }}"},
                    success: function(data)
                    {
                        // $.each(data, function (key, val) {
                        //     $("#state_id").append('<option value="">'+val.name+'</option>');
                        // });
                        $("#state_id").html(data);
                    }
                });
            }
        });
    });
    $( document ).ready(function() {
            $(document).on('change','#state_id',function () {
                var val = $(this).val();
                if (val != '') {
                    $.ajax({
                    type: "POST",
                    url: "{{ route('getcity') }}",
                    data: {"id":val,"_token": "{{ csrf_token() }}"},
                    success: function(data)
                    {
                        // $.each(data, function (key, val) {
                        //     $("#state_id").append('<option value="">'+val.name+'</option>');
                        // });
                        $("#city_id").html(data);
                    }
                });
            }
        });
    });
    </script>
 @endsection