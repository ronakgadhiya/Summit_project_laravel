@extends('backend.layouts.master')
@section('content')
<div class="container-fluid">
    <!-- page hading-->
    <div class="d-sm-flax align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Users</h1>
        <a href="/users" style="float:right;margin-top:-15px;" class="btn btn-sm btn-outline-primary" >
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
    <!-- DataTables Example-->
    <div class="card shadow mb-4">
        <div class="card-header py--3">
            <h6 class="m-0 font-weight-bold text-primarty">Edit Users
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="fas fa-angle-left"></i> Back</a>
            </h6>

        </div>
        <div class="card-body">
                {!! Form::model($users,array('route' => array('users.update', $users->id),'role'=>"form",'id'=>'userForm','enctype' => 'multipart/form-data')) !!}
                            @method('PUT')
                            {!! Form::hidden('id', $users->id , ['id' => 'id']) !!}
                            @include('backend.users.form',[
                                'users' => $users
                            ])
                {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
@section('script')
 <script type="text/javascript">
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
                        $('#state_id').val({{ $users->state_id }});
                        $("#state_id").trigger("change");
                    }
                });
            }
  });
  $("#country_id").trigger("change");

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
                        $('#city_id').val({{ $users->city_id }});
                        
                    }
                });
            }
  });
  

});     
</script>
@endsection