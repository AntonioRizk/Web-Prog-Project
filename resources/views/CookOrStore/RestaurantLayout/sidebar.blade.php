<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="#">
                        <img class="brand-logo" alt="modern admin logo" src="{{ asset('cms/app-assets/images/logo/weblogo.png') }}">
                        <h3 class="brand-text">Food-delivery</h3>
                    </a>
                </li>
                <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="`#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">

                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">Hello,
                  <span class="user-name text-bold-700">{{Auth::user()->name}}</span>
                </span>
                            <span class="avatar avatar-online">
                     <img src="{{ asset('cms/app-assets/images/logo/weblogo.png') }}" alt="avatar"><i></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="{{route('logout')}}"><i class="ft-power"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"> 
        <li id="settings" class=" nav-item"><a href="{{ route('restaurantDashboard')}}"><i class="la la-cog"></i><span class="menu-title" data-i18n="nav.dash.main">Settings</span></a>
            </li>
            <li id="foods" class=" nav-item"><a href="{{ route('displayfood')}}"><i class="la la-pagelines"></i><span class="menu-title" data-i18n="nav.dash.main">Foods</span></a>
            </li>
            <li id="offers" class=" nav-item"><a href="{{ route('displayoffer')}}"><i class="la la-tag"></i><span class="menu-title" data-i18n="nav.dash.main">Offers</span></a>
            </li>
            <li id="orders" class=" nav-item"><a href="{{ route('displayOrders')}}"><i class="la la-truck"></i><span class="menu-title" data-i18n="nav.dash.main">Orders</span></a>
            </li>
            <li id="reviews" class=" nav-item"><a href="{{ route('displayreviews')}}"><i class="la la-eye"></i><span class="menu-title" data-i18n="nav.dash.main">Reviews</span></a>
            </li>
            <li id="categories" class=" nav-item"><a href="{{ route('displaycategories')}}"><i class="la la-align-justify"></i><span class="menu-title" data-i18n="nav.dash.main">Categories</span></a>
            </li>
            <li  class=" nav-item"><a href="{{route('logout')}}"><i class="la la-sign-out"></i><span class="menu-title" data-i18n="nav.dash.main">Logout</span></a>
            </li>
 
        </ul>
    </div>  
</div> 

