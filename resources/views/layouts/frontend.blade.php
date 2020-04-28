<!DOCTYPE html>
<html lang="pl">
{{-- {{ str_replace('_', '-', app()->getLocale()) }} --}}
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{url('/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{url('js/plugins/bootstrap-4.3.1/bootstrap.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/10401302b2.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" >

    <!-- Styles -->
    <link href="{{url('css/plugins/bootstrap-4.3.1/bootstrap.min.css') }}" rel="stylesheet" />


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   Pizzeria
                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('cart') }}" ><span class="caret"> Koszyk </span>
                        @if(session('cart'))
                          <span class="badge badge-danger"> {{ count(session('cart')) }}</span>
                        @endif
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}" ><span class="caret"> Login </span></a>
                    </li>
                  </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
        </main>
        @section('scripts')
        @show
    </div>
</body>
</html>
