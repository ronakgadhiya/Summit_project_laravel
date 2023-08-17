@include('frontend.common.header')



<!-- Hero Area Begin -->
<div class="hero-area set-bg" data-setbg="{{ asset('frontend/img/contact-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-text">
                    <h2>Book Tiket</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Area End -->





    <!-- Page Heading -->
            <div class=" py-3">                
                <h4 class="m-0 mb-2 font-weight-bold text-dark">Package Name : {{ $booktiket->subtitle }}
                    <a href="{{ route('ticket') }}" class="btn btn-sm btn-dark" style="float:right;"><i class="fa fa-angle-left"></i> Change Package</a>
                </h4>
            </div>
    <!-- DataTales Example -->
 

<section class="contact-section">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-6 offset-lg-6">
                <div class="contact-details">
                    <h2>Add Book Tiket</h2>
                    
                    <div class="contact-form">
                        {!! Form::open(array('route' => 'tiketform','role'=>"tiketform",'id'=>'tiketForm','enctype' => 'multipart/form-data')) !!}
                <div class="containe">
                    {!! Form::hidden('tiket_id', $booktiket->id , ['id' => 'tiket_id']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('First Name',__('tiket.firstname'))!!}
                                <span class="text-danger">*</span>
                                {!! Form::text('firstname',old('firstname'),['id' => 'firstname','class' => 'form-control','required' => true]) !!}
                                @if ($errors->has('firstname'))
                                    <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                @endif 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('Last Name',__('tiket.lastname'))!!}
                                <span class="text-danger">*</span>
                                {!! Form::text('lastname',old('lastname'),['id' => 'lastname','class' => 'form-control','required' => true]) !!}
                                @if ($errors->has('lastname'))
                                    <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                @endif 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('email',__('user.email'))!!}
                                <span class="text-danger">*</span>
                                {!! Form::text('email',old('email'),['id' => 'Email','class' => 'form-control','required' => true]) !!}
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('mobile',__('user.mobile'))!!}
                                <span class="text-danger">*</span>
                                {!! Form::text('mobile',null,['id' => 'mobile','class' => 'form-control',]) !!}
                                @if ($errors->has('mobile'))
                                <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">  
                        {!! Form::label('address',__('user.address'))!!}
                        <span class="text-danger">*</span>
                        {!! Form::textarea('address',null,['id' => 'address','class' => 'form-control',]) !!}
                        @if ($errors->has('address'))
                        <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    {!! Form::submit('Submit', ['class' => 'submit-btn contact-btn']) !!}
                </div>
                {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
   
        <div class="map set-bg" data-setbg="{{ asset('frontend/img/blog/blog-hero-bg.jpg') }}">
        {{-- <img src="{{ asset('frontend/img/blog/blog-item.jpg') }}" alt=""> --}}
        </div>
    
</section>



    <!-- Footer Begin -->
    @include('frontend.common.footer')

    {{-- js file include--}}
@include('frontend.common.js')