<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('chunks.head')
<body class="front">
<div id="app">


    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
{{--                {{ config('app.name', 'Laravel') }}--}}
                <img class="nav-item__logo" src="/images/logo.svg">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                        <li class="nav-item">
                            <a href="{{route('profile.index')}}">
                                <svg data-name="" class="i-svg i-svg__sm i-svg__bgGrey">
                                    <use xlink:href="/images/icons.svg#icon-user"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('profile.index')}}">
                                <svg data-name="" class="i-svg i-svg__sm i-svg__bgGrey">
                                    <use xlink:href="/images/icons.svg#icon-msg"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name ?? Auth::user()->email}} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @can('is_admin')
                                <a class="dropdown-item" href="{{ route('admin.index') }}">
                                    ?????????? ????????????
                                </a>
                                @endcan
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    ??????????
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    <li class="nav-item favorites-block">
                            @include('chunks.favorites')
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
</div>
@include('chunks.footer')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/modal.js') }}"></script>
<script src="{{ asset('js/main.js')}}"></script>
@yield('page-script')
</body>
</html>
