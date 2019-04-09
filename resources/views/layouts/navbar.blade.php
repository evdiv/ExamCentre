<nav class="navbar navbar-expand-md navbar-dark" style="padding: 0.1rem 1rem; background-color: #143944;">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="img-fluid" src="/images/logo.png" alt="logo" style="max-height: 52px;">
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
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">Register and get Free Exam</a>
                        @endif
                    </li>
                
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i style="color: #e31837;" class="fas fa-user"></i> &nbsp;Log In</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/subscriptions#subscriptions">
                            <i style="color: #e31837;" class="fas fa-shopping-cart"></i> 
                        &nbsp;Buy Exams</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          <i style="color: #e31837;" class="fas fa-user-circle"></i>  
                          {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="/lessons/">My Exams</a>
                            <a class="dropdown-item" href="/account/">Settings</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <li class="nav-item">
                    <a class="nav-link" href="/help"><i style="color: #e31837;" class="fas fa-question"></i> &nbsp;Help</a>
                </li>    
            </ul>
        </div>
    </div>
</nav>