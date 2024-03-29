<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/dashboard')}}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item nav-category">Profile</li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('profile.index')}}">
          <i class="menu-icon mdi mdi-account-card-details"></i>
          <span class="menu-title">My Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#myactivity">
            <i class="menu-icon mdi mdi-format-list-bulleted"></i>
            <span class="menu-title">My Activity</span>
          </a>
      </li>
      <li class="nav-item nav-category">Setting</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#account" aria-expanded="false" aria-controls="account">
          <i class="menu-icon mdi mdi-account-settings"></i>
          <span class="menu-title">Account</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="account">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('account.index')}}">account</a></li>
          </ul>
        </div>
      </li>
      @if(auth()->user()->role_name=='ADMIN')
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#app" aria-expanded="false" aria-controls="app">
          <i class="menu-icon mdi mdi-application"></i>
          <span class="menu-title">Aplikasi</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="app">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('role.index')}}">Role</a></li>            
            <li class="nav-item"> <a class="nav-link" href="{{route('day.index')}}">Day</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('artikel.index')}}">Artikel</a></li>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#location" aria-expanded="false" aria-controls="location">
          <i class="menu-icon mdi mdi-map-marker"></i>
          <span class="menu-title">Location</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="location">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('region.index')}}">Province</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('city.index')}}">City</a></li>            
            <li class="nav-item"> <a class="nav-link" href="{{route('district.index')}}">District</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('village.index')}}">Village</a></li>            
          </ul>
        </div>
      </li>  
      @endif
      @if(auth()->user()->role_name=='MANAGER' || auth()->user()->role_name=='OWNER')
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#company" aria-expanded="false" aria-controls="comapany">
          <i class="menu-icon mdi mdi-hospital-building"></i>
          <span class="menu-title">Company</span>
          <i class="menu-arrow"></i>
        </a>        
        <div class="collapse" id="company">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('bioskop.index')}}">Bioskop</a></li>              
              <li class="nav-item"> <a class="nav-link" href="{{route('studio.index')}}">Studio</a></li>              
              <li class="nav-item"><a class="nav-link" href="{{route('kursi.index')}}">Kursi</a></li>
              <li class="nav-item"><a class="nav-link" href="{{route('showtime.index')}}">Showtime</a></li>
              <li class="nav-item"><a class="nav-link" href="{{route('hargatiket.index')}}">Harga tiket</a></li>
            </ul>
        </div>        
      </li>
      @endif    
      <li class="nav-item">
        <a class="nav-link" href="{{route('film.index')}}">
          <i class="menu-icon mdi mdi-movie"></i>
          <span class="menu-title">Film</span>
        </a>
      </li>
      <li class="nav-item nav-category">Transaction</li>
      <li class="nav-item">
        <a class="nav-link" href="#topup">
          <i class="menu-icon mdi mdi-cash-usd"></i>
          <span class="menu-title">Tiket</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#topup">
          <i class="menu-icon mdi mdi-cash-multiple"></i>
          <span class="menu-title">Top Up</span>
        </a>
      </li>
      <li class="nav-item nav-category">All History</li>
      <li class="nav-item">
        <a class="nav-link" href="#history" data-bs-toggle="collapse" 
        aria-expanded="false" aria-controls="history">
          <i class="menu-icon mdi mdi mdi-history"></i>
          <span class="menu-title">History</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="history">
            <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Order Tiket</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Top Up</a></li>
            <li class="nav-item"><a class="nav-link" href="pages/tables/basic-table.html">All Activity</a></li>
            </ul>
        </div>
      </li>
      <li class="nav-item nav-category">help</li>
      <li class="nav-item">
        <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>