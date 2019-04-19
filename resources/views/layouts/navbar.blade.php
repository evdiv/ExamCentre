<nav class="navbar navbar-expand-lg navbar-dark" style="padding: 0.1rem 1rem; background-color: #143944;">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="img-fluid img-logo" src="/images/logo.png" alt="logo" style="max-height: 52px;">
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
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fas fa-user-plus navbar-icon"></i> 
                                @if(config('app.register_for_demo'))
                                    &nbsp;Register and get Free Exam
                                @else
                                    &nbsp;Register
                                @endif
                            </a>
                        @endif
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt navbar-icon"></i> &nbsp;Log In</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/subscriptions#subscriptions">
                            <i class="fas fa-shopping-cart navbar-icon"></i> 
                        &nbsp;Get Exams</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          <i class="fas fa-user-circle navbar-icon"></i>  
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
                    <a class="nav-link" href="/help"><i class="fas fa-question navbar-icon"></i> &nbsp;Help</a>
                </li>    
            </ul>
        </div>
    </div>
</nav>