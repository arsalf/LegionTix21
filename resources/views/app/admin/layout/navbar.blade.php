<nav class="flex-row p-0 navbar default-layout col-lg-12 col-12 fixed-top d-flex align-items-top">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      <div class="me-3">
        <button class="navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
      </div>
      <div>
        <a class="navbar-brand brand-logo" href="{{url('admin/dashboard')}}">
          <img src="{{url('admin/images/logo.svg')}}" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{url('admin/dashboard')}}">
          <img src="{{url('admin/images/logo-mini.svg')}}" alt="logo" />
        </a>
      </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top"> 
      <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
          <h1 class="welcome-text">
            @if (date('H:i:s') < '04:00:00' )
              Good Night,
            @elseif (date('H:i:s') < '14:00:00' )
              Good Morning,
            @elseif (date('H:i:s') < '18:00:00' )
              Good Afternoon,
            @else
              Good Night,
            @endif
            <span class="text-black fw-bold">{{Auth::user()->username}}</span></h1>
          <h3 class="welcome-sub-text">Your performance summary this week </h3>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item d-none d-lg-block">
            <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
              <span class="input-group-addon input-group-prepend border-right">
                <span class="icon-calendar input-group-text calendar-icon"></span>
              </span>
              <input type="text"  class="bg-white form-control" disabled>
            </div>
        </li>
        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
          <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="img-xs rounded-circle" src="{{url('admin/images/faces/face8.jpg')}}" alt="Profile image"> </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="text-center dropdown-header">
              <img class="img-md rounded-circle" src="{{url('admin/images/faces/face8.jpg')}}" alt="Profile image">
              <p class="mt-3 mb-1 font-weight-semibold">Allen Moreno</p>
              <p class="mb-0 fw-light text-muted">allenmoreno@gmail.com</p>
            </div>
            <a class="dropdown-item" href="{{route('profile.index')}}"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
            <a class="dropdown-item" 
                                href="{{ route('logout')}}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>{{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>  
