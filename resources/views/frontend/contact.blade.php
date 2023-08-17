@include('frontend.common.header')

<!-- Hero Area Begin -->
<div class="hero-area set-bg" data-setbg="{{ asset('frontend/img/contact-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-text">
                    <h2>Contact</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Area End -->
<!-- Contact Section Begin -->
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-6">
                <div class="contact-details">
                    <h2>Get in Touch</h2>
                    <div class="contact-form">
                        {!! Form::open(array('route' => 'contactform','role'=>"contactform",'id'=>'contact','enctype' => 'multipart/form-data')) !!}
                            <div class="row">
                                <div class="col-lg-6">
                                    {!! Form::label('Enter name',__('contact.name'))!!}
                                    <span class="text-danger">*</span>
                                    {!! Form::text('name', null, ['class' => 'form-control','id' => 'name']) !!}
                                    
                                    @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6">
                                    {!! Form::label('Enter email',__('contact.email'))!!}
                                    <span class="text-danger">*</span>
                                    {!! Form::text('email', null, ['class' => 'form-control','id' => 'email']) !!}
                                    
                                    @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-12">
                                    
                                    {!! Form::label('Enter subject',__('contact.subject'))!!}
                                    <span class="text-danger">*</span>
                                    {!! Form::text('subject', null, ['class' => 'form-control','id' => 'subject']) !!}
                                    
                                    @if ($errors->has('subject'))
                                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                                    @endif

                                    {!! Form::label('Enter message',__('contact.message'))!!}
                                    <span class="text-danger">*</span>
                                    {!! Form::text('message', null, ['class' => 'form-control','id' => 'message']) !!}
                                    @if ($errors->has('message'))
                                            <span class="text-danger">{{ $errors->first('message') }}</span>
                                    @endif
                                    {!! Form::submit('Send Message', ['class' => 'submit-btn contact-btn']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12093.813490649247!2d-73.99671288184456!3d40.730048447813495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2599aff739a83%3A0xea0adbc1f438a974!2sThe+Public+Theater!5e0!3m2!1sen!2sbd!4v1564162536545!5m2!1sen!2sbd"
            height="738" style="border:0" allowfullscreen></iframe>
        <div class="contact-address">
            <h4>Contact Info</h4>
            <ul>
                <li><i class="flaticon-placeholder"></i><span>4127 Raoul Wallenber4127 Raoul Wallen berg Place
                </span></li>
                <li><img src="img/phone-white.png" alt=""><span>203-808-8613</span></li>
                <li><i class="flaticon-envelope"></i><span>seawind@youremail.com</span></li>
            </ul>
            <div class="triangle-border"></div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

    <!-- Footer Begin -->
@include('frontend.common.footer')

    {{-- js file include--}}
@include('frontend.common.js')