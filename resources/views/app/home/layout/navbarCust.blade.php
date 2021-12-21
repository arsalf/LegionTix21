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
                    <a data-toggle="modal" data-target="#exampleModalCenter" style="cursor: pointer">
                        Rp. <span>{{ auth()->user()->balance }}
                        </span>
                    </a>
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

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Dompet Account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('dompet.store') }}">
            @csrf
            <div class="modal-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2"><b> Balance </b></label>
                    <div class="col-sm-10">
                        <span>Rp. {{ Auth::user()->balance }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="formControlRange" class="col-sm-2">Top Up</label>
                    <div class="col-sm-7">
                        <input type="range" name="nominal" class="form-control-range" min="25000" max="500000" step="25000" id="formControlRange" onInput="$('#rangeval').html('Rp.'+$(this).val())">
                    </div>
                    <span class="col-sm-3" id="rangeval">Rp. 275000</span>
                    <input type="hidden" name="dompet_id" value="{{ Auth::user()->id }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Top Up!</button>
            </div>
        </form>
      </div>
    </div>
</div>


@if (\Session::has('status'))
    <div class="container mt-5" style="position: relative;">
        <div class="alert alert-success alert-dismissible fade show" role="alert" 
             style="
                    position: absolute;
                    right: 0;
                    left: 0;"
        >
            <strong>Kode Pembayaran :</strong>  {!! \Session::get('status') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif
<!-- Header End -->