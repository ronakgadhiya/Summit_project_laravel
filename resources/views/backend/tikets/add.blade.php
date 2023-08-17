@extends('backend.layouts.master')
@section('title', 'Tiket')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- Begin Page Content --> 
 <div class="container-fluid">

    <!-- Page Heading -->
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Tiket Details</h4>
            </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Tiket
                <a href="{{ route('tiket.index') }}" class="btn btn-sm btn-primary" style="float:right;"><i class="	fas fa-angle-left"></i> Back</a>
            </h6>
        </div>
        <div class="card-body">
                {!! Form::open(array('route' => 'tiket.store','role'=>"form",'id'=>'tiketForm','enctype' => 'multipart/form-data')) !!}
                    @include('backend.tikets.form',[
                       'tiket' => null
                   ])
                {!! Form::close() !!}
        </div>
    </div>

</div>
 
 @endsection
 @section('script')
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function() {
    $('.feature').select2();
});
 </script>
 

 @endsection
 