<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--Bootswatch-->
    <link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/3a35c19d1d.js" crossorigin="anonymous"></script>
    @yield('css')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                                <img width="40px" height="40px" style="border-radius:50%" src="{{ Gravatar::src(Auth::user()->image) }}" alt="">
                                {{ Auth::user()->name }} <span class="caret"></span>

                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('users.edit-profile') }}">
                                    <i class="fas fa-users-cog"></i> &nbsp; Mon Profil
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{--                                    {{ __('Logout') }}--}}<i class="fas fa-power-off"></i>  &nbsp; Se Déconnecter
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">

        @auth
            <div class="container">
                @if(session()->has('success'))

                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session()->get('success') }}
                    </div>
                @endif
                    @if(session()->has('error'))

                        <div class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session()->get('error') }}
                        </div>
                    @endif
                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-group">
                            @if(auth()->user()->isAdmin())
                                <li class="list-group-item">
                                    <a href="{{route('users.index')}}">Users</a>
                                </li>
                            @endif
                            <li class="list-group-item">
                                <a href="{{route('posts.index')}}">Articles</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('categories.index')}}">Catégories</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('tags.index')}}">Tags</a>
                            </li>
                        </ul>

                        <ul class="list-group mt-5">
                            <li class="list-group-item">
                                <a href="{{route('trashed-posts.index')}}">Articles archivés</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        @yield('content')
                    </div>
                </div>
            </div>
        @else
            @yield('content')
        @endauth

    </main>
</div>


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>

</html>
