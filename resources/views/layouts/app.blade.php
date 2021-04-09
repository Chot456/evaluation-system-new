<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Evaluation System</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="images/sansebastiancollege.png" style="margin-rigth: 20px" alt="Logo" height="50px">  Evaluation System
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
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('showChangePassword') }}">Change Password</a>
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
            <div class="container-fluid">
                <div class="row justify-content-center">
                    @if (auth()->check()) 
                        @if(Auth::user()->role === 'Admin')  
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header" style="color: #eeeeee; background-color: #343A40">Sidebar</div>
                                    <div class="card-body">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <a href="{{ url('/home') }}" id="btnGroupDrop1" style="color: #343A40">Dashboard</a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="#" id="btnGroupDrop6"  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #343A40">Evaluations</a>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop6">
                                                    <a class="dropdown-item" href="{{ url('/evaluation') }}">Evaluation</a>
                                                    <a class="dropdown-item" href="{{ url('/evaluationSummary') }}">Evaluation Summary</a>
                                                    <a class="dropdown-item" href="{{ url('/activityLogs') }}">Activity Logs</a>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="#" id="btnGroupDrop2"  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #343A40">Question Management</a>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
                                                    <a class="dropdown-item" href="{{ url('/questionaire') }}">Question</a>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="#" id="btnGroupDrop7"  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #343A40">Account Management</a>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop7">
                                                    <a class="dropdown-item" href="{{ url('/user') }}">Manage Account</a>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="#" id="btnGroupDrop1"  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #343A40">Information management</a>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <a class="dropdown-item" href="#">Subject</a>
                                                    <a class="dropdown-item" href="#">Course</a>
                                                    <a class="dropdown-item" href="#">Department</a>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="#" id="btnGroupDrop4"  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #343A40">Settings</a>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop4">
                                                    <a class="dropdown-item" href="#">Site Settings</a>
                                                </div>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                    <div class="col-md-8">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
