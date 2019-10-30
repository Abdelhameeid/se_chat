<!DOCTYPE html>
<html>    
    <head>
        <title>chat</title>
        <link rel="stylesheet" href="{{ asset('dest/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('dest/css/app.css') }}">
    </head>
    <body>
    
        <header>
            <div class="container">
                    <a href="{{ route('home') }}"><h2 class="logo"><span class="letter">s</span>chat</h1></a>
                    <input class="search" type="text" placeholder="search"  >
                <nav>
                    <ul>
                        @if(auth()->check())
                        <li><a  href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">logout</a></li>
                        @endif
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <li><a href="">the nearest</a></li>
                        <li><a href="{{ route('messages') }}">message</a></li>
                        @if(auth()->check())
                        <li><a href="#">{{ Auth::user()->name }}</a> <img class="img_user" src="{{ route('image_show', Auth::user()->image) }}" ></li>
                        @else
                        <li><a href="{{ route('registeruser') }}">register</a></li>
                        <li><a href="{{ route('login') }}">login</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
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
        @yield('content')
       
    </body>
</html>