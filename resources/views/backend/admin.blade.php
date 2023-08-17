@extends('backend.layouts.master')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row" >
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <a href="{{ route('users.index') }}" style="text-decoration:none;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        All Users</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user}}</div>
                                </div>
                                <div class="col-auto">
                                    
                                    <i class="fas fa-user fa-2x text-gray"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                <a href="{{ route('country.index') }}" style="text-decoration:none;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    All Countrys</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$country}}</div>
                            </div>
                            <div class="col-auto">
                                
                                <i class="fas fa-globe fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <a href="{{ route('state.index') }}" style="text-decoration:none;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        All States</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$state}}</div>
                                </div>
                                <div class="col-auto">
                                    
                                    <i class="fas fa-flag-usa fa-2x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <a href="{{ route('city.index') }}" style="text-decoration:none;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        All Citys</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$city}}</div>
                                </div>
                                <div class="col-auto">
                                    
                                    <i class="fas fa-city fa-2x text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <a href="{{ route('city.index') }}" style="text-decoration:none;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        All Slider</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$slider}}</div>
                                </div>
                                <div class="col-auto">
                                    
                                    <i class="fas fa-images fa-2x text-success"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <a href="{{ route('speacker.index') }}" style="text-decoration:none;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        All Speackers</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$speacker}}</div>
                                </div>
                                <div class="col-auto">
                                    
                                    <i class="fas fa-users fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <a href="{{ route('tiket.index') }}" style="text-decoration:none;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        All Tikets</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$tiket}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-ticket-alt fa-2x text-info"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <a href="{{ route('feature.index') }}" style="text-decoration:none;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        All Features</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$feature}}</div>
                                </div>
                                <div class="col-auto">
                                    
                                    <i class="fa fa-bars fa-2x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <a href="{{ route('blog.index') }}" style="text-decoration:none;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        All Blogs</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$blog}}</div>
                                </div>
                                <div class="col-auto">
                                    
                                    <i class="fa fa-rss fa-2x text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <a href="{{ route('aboutspeack.index') }}" style="text-decoration:none;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        All About Speck</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$aboutspeack}}</div>
                                </div>
                                <div class="col-auto">
                                    
                                    <i class="fa fa-lightbulb fa-2x text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

    </div>   
</div>
@endsection