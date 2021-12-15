<!-- Header Section Begin -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{url('app')}}">
                        <img src="{{ asset('/img/logo-baru2.png') }}" alt="" class="nav-film" style="transform: scale(2)">
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="{{url('app')}}">Homepage</a></li>
                            <li><a href="{{url('app/articel')}}">Articel</a></li>
                            <li><a href="{{url('/')}}">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="text-white header__right">
                    <a href="#" class="search-switch"><span class="icon_search"></span></a>
                    <button class="rounded-circle"><span class="icon_profile"></span></button>
                    <div class="d-inline-block">
                        <span>{{Auth::user()->username}}</span>
                    </div>
                    <div class="ml-3 d-inline-block">
                        <a href="#"><b> Logout </b></a>
                    </div>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Header End -->