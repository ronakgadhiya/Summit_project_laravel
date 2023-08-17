@include('frontend.common.header')


    <!-- Hero Area Begin -->
    <div class="hero-area set-bg" data-setbg="{{ asset('frontend/img/tickets-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-text">
                        <h2>Tickets</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End -->

    <!-- Tickets Price Area Begin -->
    <section class="tickets-table-price spad">
        <div class="container">
            <div class="row">
                @foreach ($packages as $package)
                {!! Form::hidden('id', $package->id , ['id' => 'id']) !!}
                <div class="col-lg-4 col-md-6">
                        <div class="tickets-table">
                            <div class="table-price text-center">
                                <span>{{ $package->title ?? '' }}</span>
                                <h2 class="table-title">{{ $package->subtitle ?? '' }}</h2>
                                <h2 class="price">{{ $package->price ?? '' }}</h2>
                            </div>
                            <div class="table-features">
                                <ul>
                                    @if($package->feature !="")
                                        @php
                                            $feature_data=explode(',',$package->feature);
                                        @endphp
                                        @foreach($feature_data as $fs)
                                           <li><img src="{{ asset('frontend/img/check.png') }}" alt="">{{  $feature_list[$fs]  }}</li>
                                        @endforeach
                                    @endif
                                    {{-- <li><img src="{{ asset('frontend/img/check.png') }}" alt=""> 100+ Speakers</li>
                                    <li><img src="{{ asset('frontend/img/check.png') }}" alt=""> Breakfast</li>
                                    <li><img src="{{ asset('frontend/img/check.png') }}" alt=""> Access to workshops</li>
                                    <li><img src="{{ asset('frontend/img/check.png') }}" alt=""> Access to investors and mentors</li>
                                    <li><img src="{{ asset('frontend/img/close.png') }}" alt=""> Networking Database</li>
                                    <li><img src="{{ asset('frontend/img/close.png') }}" alt=""> After Party</li>
                                    <li><img src="{{ asset('frontend/img/close.png') }}" alt=""> Private Mentoring Sessions</li> --}}
                                </ul>
                                <a href="{{ route('booktiket', $package->id) }}" class="primary-btn buy-tickets">Buy Tickets</a>
                            </div>
                        </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!-- Tickets Price Area End -->

    <!-- Hurry Up Begin -->
    {{-- <section class="hurry-up set-bg spad" data-setbg="{{ asset('frontend/img/hurry-up-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Hurry up, save your spot!</h2>
                    <div class="countdown-timer" id="countdown-2">
                        <div class="cd-time">
                            <span>00</span>
                            <p>Weeks</p>
                        </div>
                        <div class="cd-time">
                            <span>00</span>
                            <p>Days</p>
                        </div>
                        <div class="cd-time">
                            <span>00</span>
                            <p>Hours</p>
                        </div>
                        <div class="cd-time">
                            <span>00</span>
                            <p>Minutes</p>
                        </div>
                        <div class="cd-time">
                            <span>00</span>
                            <p>Seconds</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Hurry Up End -->

    <!-- Footer Begin -->
@include('frontend.common.footer')

    {{-- js file include--}}
@include('frontend.common.js')