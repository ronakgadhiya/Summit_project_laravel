<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar"  style="box-shadow:0px 0px 10px grey">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-music"></i>
            
        </div>
        <div class="sidebar-brand-text mx-2">Summit Admin </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" >
        <a class="nav-link"  href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    
  

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-user"></i>
            <span>User</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('country.index') }}">
            <i class="fas fa-globe"></i>
            <span>Country</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('state.index') }}">
            <i class="fas fa-flag-usa"></i>
            <span>State</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('city.index') }}">
            <i class="fas fa-city"></i>
            <span>City</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('slider.index') }}">
            <i class="fas fa-images"></i>
            <span>Slider</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('speacker.index') }}">
            <i class="fa fa-users"></i>
            <span>Speacker</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('tiket.index') }}">
            <i class="fas fa-ticket-alt"></i>
            <span>Tiket</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('feature.index') }}">
            <i class="fa fa-bars"></i>
            <span>Featured</span></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('blog.index') }}">
            <i class="fa fa-rss"></i>
            <span>Blog</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('aboutspeack.index') }}">
            <i class="fa fa-lightbulb"></i>
            <span>Aboutspeacker</span></a>
    </li>
    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    

</ul>