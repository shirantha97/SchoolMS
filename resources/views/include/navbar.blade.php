<div id="app">

    <nav class="navbar navbar-expand-md ">

        <div class="row text-center container">

            <img src="{{asset('images/logogif.gif')}}" class="img-responsive img-circle logogif">


        <H1 class="text col-md-10 text-lg-center text-md-center text-sm-center pull-right" style="margin-left: 15%"> NWP/ Wickaramashila Central College <br> Giriulla </H1>


        </div>


    </nav>

    <nav class="navbar navbar-expand-md navbar-light navbar-inverse bg-dark">
        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="col-12 collapse navbar-collapse " id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="btn navbar-nav mr-auto">
                    <li class="nav-item"  style="color: white;font-family: Times New Roman; padding-top: 7px;" >
                        <a class="nav-link active text-light "
                           href="/home"> Home</a>
                    </li>
                    <li class="btn nav-item">
                        <a class="nav-link " style="color: white;font-family: Times New Roman;padding-top: 7px" href="#">
                            About WCC</a>
                    </li>
                    <li class="btn nav-item" style="color: white;">
                        <a class="nav-link text-light"  style="color: white;font-family: Times New Roman;padding-top: 7px;"
                           href="#">Student & Parents</a>
                    </li>

                    @if(Auth()->user())
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 || \Illuminate\Support\Facades\Auth::user()->role_id == 2)
                            <li class="btn nav-item dropdown pull-left">
                                <div class="dropdown"
                                     style="color: white; width: 100px; padding-top: 7px;">  {{-- 7px padding down to get the div to the same level of other nav links --}}
                                    <a class="dropbtn">Staff</a>
                                    <div class="dropdown-content">
                                        <a href="/Event">Academic Staff</a>
                                        <a href="#">Non-Academic</a>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endif

                    <li class="btn nav-item ">
                        <a class="nav-link " style="color: white;font-family: Times New Roman;padding-top: 7px"; href="#">Library</a>
                    </li>

                    <li class="btn nav-item dropdown  ">
                        <div class="dropdown"
                             style="color: white; padding-top: 7px;">  {{-- 7px padding down to get the div to the same level of other nav links --}}
                            <a class="dropbtn">Event</a>
                            <div class="dropdown-content">
                                <a href="/Event">Events</a>
                                <a href="/Sport">Sports</a>
                                <a href="/Society">Societies</a>
                            </div>
                        </div>
                    </li>

                    <li class="btn nav-item " style="color: white; padding-top: 12px;">
                        @if(Auth()->user())
                            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 || \Illuminate\Support\Facades\Auth::user()->role_id == 2)
                                <a href="/inventory" style="color: white;text-decoration: none " >Inventory</a>
                            @endif
                        @endif
                    </li>

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="col-2 navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="btn nav-item ">
                        <a class="nav-link" style="color: white;padding-top: 7px" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="btn nav-item ">
                        <a class="nav-link" style="color: white" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @else
                        <li class="btn nav-item " style="color: white; padding-top: 15px;">
                            @if(Auth()->user())
                                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 || \Illuminate\Support\Facades\Auth::user()->admin == 1)
                                    <a href="/adminDashboard" style="color: white;padding-top: 7px" >Admin Dashboard</a>
                                @endif
                            @endif
                        </li>
                        <li class="btn nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: white" href="#"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="btn dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                                 style="background-color: #343a40 !important;">
                                <a class="dropdown-item " style="color: white; background-color: #343a40 !important; "
                                   href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                </ul>
            </div>
        </div>
    </nav>


    <script>
        $(document).ready(function () {
            $('.dropdown-submenu a.test').on("click", function (e) {
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
        });
    </script>

</div>
