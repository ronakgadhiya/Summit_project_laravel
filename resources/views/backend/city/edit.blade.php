@extends('backend.layouts.master')
@section('title', 'City')
@section('content')


<div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Update City
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update City
                    <a href="{{ route('city.index') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="fas fa-angle-left"></i> Back</a>
                </h6>
            </div>
            <div class="card-body">
                        {!! Form::model($city,array('route' => array('city.update', $city->id),'role'=>"form",'id'=>'cityForm','enctype' => 'multipart/form-data')) !!}
                            @method('PUT')
                        
                            {!! Form::hidden('id', $city->id , ['id' => 'id']) !!}
                            @include('backend.city.form',[
                                'city' => $city
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
                        $('#state_id').val({{ $city->state_id }});     
                    }
                });
            }
  });
  $("#country_id").trigger("change");

});
    </script>
 @endsection



