<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="The Summit Conference Template">
    <meta name="keywords" content="The Summit Conference, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Summit Confference</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css">

    <!--favicon-->
    <link href="{{ asset('backend/img/favicon.png') }}" rel="icon" type="image/png">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

        <!-- Header Section Begin -->
        <header class="header-section">
            <div class="container-fluid">
                <div class="row bg-overlay">
                    <div class="header">
                        <div class="col-lg-12">
                            <div class="logo">
                                <a href="/"><img src="{{ asset('frontend/img/logo.png') }}" alt=""></a>
                            </div>
                            <div class="navigation mobile-menu">
                                <div class="main-menu">
                                    <nav>
                                        <ul>
                                            <li {{ Request::is('dashboard') ? 'active' : '' }}><a href="{{ route('dashboard') }}">Home</a></li>
                                            <li><a href="{{ route('speacker') }}">Speakers</a></li>
                                            <li><a href="{{ route('ticket') }}">Tickets</a></li>
                                            <li><a href="{{ route('blog') }}">Blog</a></li>
                                            <li><a href="{{ route('contact') }}">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="top-social">
                                    {{-- <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-dribbble"></i></a>
                                    <a href="#"><i class="fa fa-behance"></i></a>--}}
                                    <a href="#" class="search-btn search-trigger"><i class="fa fa-search"></i></a> 
                                </div>
                            </div>
                            <div id="mobile-menu-wrap"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->
        
    <!-- Search Bar Begin -->
    <section class="search-bar-wrap">
        <span class="search-close"><i class="fa fa-close"></i></span>
        <div class="search-bar-table">
            <div class="search-bar-tablecell">
                <div class="search-bar-inner">
                    <h2>Search</h2>
                    <form action="#">
                        <input type="search" placeholder="Type Keywords">
                        <button type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Search Bar End -->