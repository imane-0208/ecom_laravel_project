<div class="top-bar-header">
    <div class="first" >
        <p class="text-white pr-2">{{ $pages->where('name_en','email')->first()->{'value_'.app()->getLocale() }??'  exemple@exemple.com' }}</p>
        <p class="text-white">{{ $pages->where('name_en','phone')->first()->{'value_'.app()->getLocale() }?? '+1 123 456 789' }}</p>
    </div>
    <div class="login-re">

        <div class="lang-prof-header" >
            <div class="nav-item dropdown" style="margin-right: 20px">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    @if (App::getLocale()=='en') English  @endif
                    @if (App::getLocale()=='fr') français  @endif
                    @if (App::getLocale()=='ar') عربي  @endif
                     <i class="bi bi-chevron-down"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right" style="min-width: 50px;" aria-labelledby="navbarDropdown">
                    <div class="list-dropdown">
                        <a href="{{ route('ar')}}" class="dropdown-item">عربي</a>
                        <a href="{{ route('en')}}" class="dropdown-item">English</a>
                        <a href="{{ route('fr')}}" class="dropdown-item">français</a>
                    </div>
                </div>
            </div>
            @guest
                <span>
                    <a href="{{ route('register')}}">@lang('Register')</a> /
                    <a href="{{ route('login')}}">@lang('Log in')</a>
                </span>
            @endguest
            @auth
                <div class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        @lang('welcome') {{ Auth::user()->name }} <i class="bi bi-chevron-down"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <div class="list-dropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right" style="margin-right: 5px"></i> {{ __('Logout') }}
                            </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </div>
                    </div>
                </div>
            @endauth
        </div>


    </div>




</div>
<header class="">


    <div class="container padd-80">
        <div class="logo">
            <a href="{{route('index')}}">
                Acerola
            </a>
        </div>
        <div class="nav-menu-icon">
            <a href="#"><i></i></a>
        </div>
        <nav class="menu">
            <ul>
                <li>
                    <a href="{{route('index')}}">@lang('home')</a>
                </li>
                <li>
                    <a href="{{route('catalog')}}">@lang('catalog')</a>
                </li>

                <li>
                    <a href="{{route('contact')}}" class="submenu">@lang('contact')</a>
                </li>
                <li>
                    <a href="{{route('about')}}">@lang('about')</a>
                </li>

                @auth
                <li>
                    <a href="{{route('cart')}}" class=" position-relative">
                        <i class="bi bi-cart"></i>
                        <span class="badge">
                            {{ $cartCount->count() }}
                        </span>
                    </a>
                </li>
                @endauth


            </ul>

        </nav>
    </div>
</header>