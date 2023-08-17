@include('frontend.common.header')



<!-- Hero Area Begin -->
<div class="hero-area set-bg" data-setbg="{{ asset('frontend/img/blog/blog-hero-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-text">
                    <h2>Blog</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Area End -->

<!-- Blog Area Begin -->
<section class="blog-section spad">
    <div class="blog-items">
        <div class="container">
            <div class="row">
                @foreach ($blogiteams as $blogiteam)
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog">
                            <div class="blog-img">
                                <img src="{{ asset('images') }}/{{ $blogiteam->image }}" alt="">
                            </div>
                            <div class="blog-details">
                                {{-- <span>{{ $blogiteam->created_at ?? '' }}</span> --}}
                                <h4>{{ $blogiteam->title ?? '' }}</h4>
                                <p>{{ $blogiteam->discription ?? '' }}</p>
                                <a href="#" class="read-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                
            </div>
            <div>
                {!! $blogiteams->links() !!}

            </div>
        </div>
    </div>

</section>
<!-- Blog Area End -->

    <!-- Footer Begin -->
@include('frontend.common.footer')

    {{-- js file include--}}
@include('frontend.common.js')