@include('frontend.common.header')


    <!-- Hero Area Begin -->
    <div class="hero-area set-bg" data-setbg="{{ asset('frontend/img/speakers-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-text">
                        <h2>Speakers</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->


    
    <!-- Speaker Section Begin -->
    <section class="speaker-section spad speaker-all">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>All Speakers</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($speakers as $speaker)
                <div class="col-lg-4 col-md-6">
                  
                    <div class="speakers-about">
                        <div class="speaker-img">
                            <img src="{{ asset('images') }}/{{ $speaker->image }}" alt="">
                        </div>
                        <div class="speaker-text">
                            <h3>{{ $speaker->name ?? '' }} <span>{{ $speaker->position ?? '' }}</span></h3>
                        </div>
                    </div>  
                </div>
                @endforeach 
            </div>
        </div>
    </section>
    <!-- Speaker Section End -->

    <!-- Footer Begin -->
@include('frontend.common.footer')

    {{-- js --}}
@include('frontend.common.js')
