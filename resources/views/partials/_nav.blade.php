<div class="header">
    <div class="progress-container">
        <div class="progress-bar" id="myBar"></div>
    </div>
</div>
<nav class="navbar navbar-expand-lg loginContainer navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="{{Request::is('/') ? "active" : ""}}">
                <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="{{Request::is('about') ? "active" : ""}}">
                <a class="nav-link" href="{{url('about')}}">About</a>
            </li>
            <li class="{{Request::is('contact') ? "active" : ""}}">
                <a class="nav-link" href="{{url('contact')}}">Contact</a>
            </li>
        </ul>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
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
                        <div class="user_photo_block float-left ">
                            <img src="{{asset('profile_images/'.Auth::user()->user_image)}}" alt="" class="user_photo">
                        </div>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle float-left" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->role == "admin")
                                <a class="dropdown-item text-info" href="{{url('posts')}}">Posts</a>
                                <a class="dropdown-item text-info" href="{{url('category')}}">Category</a>
                                <a class="dropdown-item text-info" href="{{url('tags')}}">Tags</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endif
                                @if(Auth::user()->role == "user")
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                @endif
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>

</nav>
