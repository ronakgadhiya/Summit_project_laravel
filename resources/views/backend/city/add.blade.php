@extends('backend.layouts.master')
@section('title', 'City')
@section('content')

<!-- Begin Page Content --> 
 <div class="container-fluid">

    <!-- Page Heading -->
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">City Details</h4>
            </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add City
                <a href="{{ route('city.index') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="	fas fa-angle-left"></i> Back</a>
            </h6>
        </div>
        <div class="card-body">
                    {!! Form::open(array('route' => 'city.store','role'=>"form",'id'=>'cityForm','enctype' => 'multipart/form-data')) !!}
                        @include('backend.city.form',[
                            'city' => null
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
                console.log(val);
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
                        console.log(data);
                    }
                });
            }
        });
    });
    </script>
 @endsection

