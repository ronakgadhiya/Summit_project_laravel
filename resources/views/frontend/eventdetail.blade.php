@include('frontend.common.header')

<div class="hero-area set-bg" data-setbg="{{ asset('frontend/img/blog/blog-hero-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-text">
                    <h2>{{ $speakabout->title ?? '' }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Area End -->
{{-- <div class="card text-center">
    <div class="card-body" >
        <div class="" style="margin-top:2%;">
            <div class="guest-info "  style="margin-bottom:2%;" >
                <h1 class="">{{ $speakabout->name ?? '' }} </h1><h2> <span> {{ $speakabout->position ?? '' }}</span></h2>
                <p class="long-text"></p>
            </div>
        </div>
        <div class="" style="">
        <a href="/ticket"  class="primary-btn btn-sm buy-tickets">Buy Tickets</a>
        </div>
    </div>
  </div> --}}

  <div class="card  text-center">
    
    <div class="card-body">
      <h1 class="card-title">{{ $speakabout->name ?? '' }} </h1>
      <h4 class="card-text"> {{ $speakabout->position ?? '' }} </h4>
      <div class="" style="margin-top:2%;">
        <a href="/ticket"  class="primary-btn btn-sm buy-tickets">Buy Tickets</a>
        </div>
    </div>
  </div>


<!-- Footer Begin -->
@include('frontend.common.footer')


{{-- js --}}
@include('frontend.common.js')