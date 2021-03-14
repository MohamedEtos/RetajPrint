<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Retaj</title>

    {{-- scripting --}}
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/CustomJs.js')}}"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/CustomeCss.css')}}">

</head>

<body>



    <nav class="navbar navbar-expand-lg   navbar-dark bg-dark " >
        <div class="container">
      <a class="navbar-brand" href="{{url('home')}}">Dashboard</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{url('Orders/AddView')}}">Add Order <i class="fa fa-plus"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('Orders/All')}}">All Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('Orders/RecycleBin')}}">RecycleBin <i class="fa fa-trash"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('Comment/NewComment')}}">Add Comment <i class="far fa-sticky-note"></i></a>
            </li>

        </ul>
        <div class="form-inline my-2 my-lg-0">

          <ul class="navbar-nav ml-auto">
            @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt"></i>
                        {{ __('Logout') }}
                    </a>

                    <a href="{{url('/')}}" class="dropdown-item"><i class="fas fa-globe"></i> VistWebSite </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
        </ul>
    </div>

      </div>

        </div>
    </nav>

    <div class="space mt-5 w-100"></div>


    @yield('content')
    @yield('welcome')
    @yield('addOrder')
    @yield('viewAllData')
    @yield('edit')
    @yield('orderDeleted')
    @yield('TotalMeter')
    @yield('Comment')
    @yield('index')
    @yield('AddCommentScript')
    @yield('AddOrderScript')
    @yield('AdminScripts')
    @yield('test')
</body>
</html>
