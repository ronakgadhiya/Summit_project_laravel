
@include('frontend.common.header')

    <!-- Hero Area Begin -->
    <div class="hero-section">
        <div class="hero-items owl-carousel">
            @foreach ($homesliders as $homeslider)
            <div class="single-hero-item set-bg" data-setbg="{{ asset('images') }}/{{ $homeslider->image }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>{{ $homeslider->title ?? '' }}</h1>
                            <h2 class="f-bold">{{ $homeslider->subtitle ?? '' }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Hero Area End -->

    <!-- Event Counter Begin -->
    {{-- <section class="event-counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="event-name">
                        <h2>Next Event</h2>
                        <h4>August 25, 2019 <span>Starting @ 09:00 AM</span></h4>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="countdown-timer" id="countdown">
                        <div class="cd-item">
                            <span>56</span>
                            <p>Days</p>
                        </div>
                        <div class="cd-item">
                            <span>12</span>
                            <p>Hours</p>
                        </div>
                        <div class="cd-item">
                            <span>40</span>
                            <p>Minutes</p>
                        </div>
                        <div class="cd-item">
                            <span>52</span>
                            <p>Seconds</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Event Counter End -->

    <!-- Speaker Section Begin -->
    <section class="speaker-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Keynote Speakers</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($top3speakers as $top3speaker)
                
                <div class="col-lg-4 col-sm-6">
                    <div class="speakers-about">
                        <div class="speaker-img">
                            <img src="{{ asset('images') }}/{{ $top3speaker->image }}" alt="">
                        </div>
                        <div class="speaker-text">
                            <h3>{{ $top3speaker->name ?? '' }} <span>{{ $top3speaker->position ?? '' }}</span></h3>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
            <div class="row">
                <div class="col-lg-12 t-center">
                    <a href="{{ route('speacker') }}" class="primary-btn speaker-btn">ALL SPEAKERS</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Speaker Section End -->

    <!-- Workshop Begin -->
    <section class="workshop-section">
        <div class="workshop-img set-bg" data-setbg="{{ asset('frontend/img/workshop.jpg') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="workshop-text">
                        <h4>Workshops</h4>
                        <h2>Learn from the most<br />talented people.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare rutrum risus a
                            semper. Duis venenatis ultrices tellus vel cursus. Nunc tristique varius justo, laoreet
                            tempus ex viverra ut. Curabitur laoreet egestas augue. </p>
                        <a href="#" class="more-info primary-btn">More Info</a>
                        <a href="{{ route('ticket') }}" class="buy-tickets primary-btn">Buy Tickets</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Workshop End -->

    <!-- Speak About Section Begin -->
    <section class="speak-about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>We will speak about</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($speakabouts as $speakabout)
                {!! Form::hidden('id', $speakabout->id , ['id' => 'id']) !!}
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('eventdetail',$speakabout->id) }}">
                        {!! Form::hidden('id', $speakabout->id , ['id' => 'id']) !!}
                    <div class="speak-text" style="box-shadow: 0px 0px 10px grey; background-image: linear-gradient(to left, pink , skyblue);">
                        <h2>{{ $speakabout->title ?? '' }}</h2>
                        <div class="speaker-name"  style="color:black; text-decoration: none;">
                            <h4>{{ $speakabout->name ?? '' }}</h4> <span>{{ $speakabout->position ?? '' }}</span></h4>
                        </div>
                    </div>
                </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Speak About Section End -->

    <!-- Subscribe Form Begin -->
    <section class="subscribe-form set-bg spad" data-setbg="{{ asset('frontend/img/subs-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="section-title">
                        <h2>Never miss another seminar</h2>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ornare rutrum risus a semper.
                        Duis venenatis ultrices tellus vel cursus. Nunc tristique varius justo, laoreet tempus ex
                        viverra ut. Curabitur laoreet egestas augue. </p>
                </div>
                {{-- <div class="col-lg-12">
                    <form action="#" class="subs-form" method="">
                        <input type="email" placeholder="Your E-main Address">
                        <button type="submit" class="submit-btn">subscribe</button>
                    </form>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- Subscribe Form End -->

    <!-- Footer Begin -->
    @include('frontend.common.footer')


    {{-- js --}}
    @include('frontend.common.js')
