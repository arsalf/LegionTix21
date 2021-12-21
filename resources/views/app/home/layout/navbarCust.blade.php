<!-- Header Section Begin -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="header__logo">
                    <a href="{{url('app/home')}}">
                        <img src="{{ asset('/img/logo-baru2.png') }}" alt="" class="nav-film" style="transform: scale(2)">
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="{{url('app/home')}}">Homepage</a></li>
                            <li><a href="{{ route('artikel.index') }}">Articel</a></li>
                            <li><a href="{{ url('/') }}">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="text-white header__right">
                    <a href="{{ route('home.show',auth()->user()->id) }}">
                        <button class="rounded-circle"><span class="icon_profile"></span></button>
                    </a>
                    <div class="d-inline-block">
                        <span>{{ auth()->user()->username }}</span>
                    </div>
                    <div class="ml-5 d-inline-block">
                        <a href="{{ route('logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>{{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>