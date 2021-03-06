<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="path/to/lightbox.css" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mainUser.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8b808e29d0.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @can('haveaccess', 'rol.index')
                            <li class="nav-item"><a href="{{ route('role.index') }}" class="nav-link">Roles</a></li>
                        @endcan
                        @can('haveaccess', 'user.index')
                            <li class="nav-item"><a href="{{ route('user.index') }}" class="nav-link">Users</a></li>
                        @endcan
                        @can('haveaccess', 'user.index')
                            <li class="nav-item"><a href="{{ route('place.index') }}" class="nav-link">Places</a></li>
                        @endcan
                        @can('haveaccess', 'user.index')
                            <li class="nav-item"><a href="{{ route('post.index') }}" class="nav-link">Posts</a></li>
                        @endcan
                        @can('haveaccess', 'user.index')
                            <li class="nav-item"><a href="{{ route('category.index') }}" class="nav-link">Categories</a>
                            </li>
                        @endcan
                        @can('haveaccess', 'user.index')
                            <li class="nav-item"><a href="{{ route('timeline.index') }}" class="nav-link">Timelines</a>
                            </li>
                        @endcan
                        @can('haveaccess', 'user.index')
                            <li class="nav-item"><a href="{{ route('comment.index') }}" class="nav-link">Comments</a>
                            </li>
                        @endcan
                        <li class="nav-item"><a href="{{ route('userRegistered.index') }}" class="nav-link">Ver
                                posts</a></li>
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            @yield('content')
        </main>
    </div>
    <script src="path/to/lightbox.js"></script>
</body>

</html>
