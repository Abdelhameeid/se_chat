<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ App::getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
    <!--<![endif]-->
    @include('dashboard.layouts.head')

    <body class="hold-transition skin-blue fixed sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <!-- logo for regular state and mobile devices -->

                    <span class="logo-mini">{{$setting->title}}</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">{{$setting->title}}</span>

                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">

                        <ul class="nav navbar-nav">
                            <!-- Website -->
                            <li class="dropdown" >
                                <a href="{{ route('dashboard') }}" target="_blank" class="dropdown-toggle">{{ __("Go to website") }}</a>
                            </li>
                            <!-- Notifications: style can be found in dropdown.less -->
                            
                            <!-- Languages -->
                            <li class="dropdown" >
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    @foreach(LaravelLocalization::getSupportedLocales(true) as $localeCode => $properties)
                                        @if($localeCode == App::getLocale())
                                            {{ $properties['native'] }}
                                        @endif
                                    @endforeach
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach(LaravelLocalization::getSupportedLocales(true) as $localeCode => $properties)
                                        @if($localeCode != App::getLocale())
                                        <li>
                                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                {{ $properties['native'] }}
                                            </a>
                                        </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu" >
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ route('image_show', Auth::user()->image)}}" class="user-image" alt="User Image">
                                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="{{ route('image_show', Auth::user()->image)}}" class="img-circle" alt="User Image">

                                        <p>
                                            {{ Auth::user()->name }}
                                            <small>{{ __("Member since") }} {{ date('Y-m-d H:i', strtotime(Auth::user()->created_at)) }}</small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">{{ __('Logout') }}</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            @if (count($errors->all()))
                <div  id="error" class="alert alert-dismissable alert-danger">
                    <button  type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span  onclick="event.preventDefault();
                                                document.getElementById('error').remove();" aria-hidden="true">&times;</span>
                    </button>
                    @foreach ($errors->all() as $error)
                        <li><strong>{!! $error !!}</strong></li>
                    @endforeach
                </div>
            @endif
            @if (session()->has('success'))
                <div id="error" class="alert alert-dismissable alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span onclick="event.preventDefault();
                                                document.getElementById('error').remove();" aria-hidden="true">&times;</span>
                    </button>
                    <strong>
                        {!! session()->get('success') !!}
                    </strong>
                </div>
            @endif
             <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar:  -->
                <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                    <img src="{{ route('image_show', Auth::user()->image)}}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ __('Online') }}</a>
                    </div>
                </div>
                <!-- sidebar menpu: -->
                <ul class="sidebar-menu">
                    <li class="treeview">
                        <a href="#"><i class="fas fa-cog"></i> <span> {{__('home.settings')}}</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                         @permission('setting-index')
                            <li><a href="{{ route('index') }}">index</a></li>
                        @endpermission
                           
                            <li><a href="{{ route('edit_setting') }}">edit setting</a></li>
                         
                        </ul>
                    </li>
                </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>@yield('title')</h1>
                    @yield('breadcrumbs')
                </section>
                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->
            </div>
            <footer class="main-footer">
                
                <strong>{{ $setting->description }}</strong>

            </footer>
        </div>
        @include('dashboard.layouts.footer')
    </body>
</html>
