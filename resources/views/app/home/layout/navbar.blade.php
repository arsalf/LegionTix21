<!-- Header Section Begin -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="{{url('app/home')}}">
                        <img src="{{ asset('/img/logo-baru2.png') }}" alt="" class="nav-film" style="transform: scale(2)">
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
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
            <div class="col-lg-2">
                <div class="header__right">
                    <a class="ml-3" href="{{url('login')}}"><span class="icon_profile"></span></a>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Header End -->