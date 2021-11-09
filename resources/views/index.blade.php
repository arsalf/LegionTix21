@extends('app.layout')

@section('title')
    Welcome to Home
@endsection

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <a href="#" class="hero-logo" data-aos="zoom-in"><img src="{{ asset('img/hero-logo2.png') }}" style="transform: scale(1.5)" alt=""></a>
      <h1 data-aos="zoom-in">Welcome To Knight Studios</h1>
      <h2 data-aos="fade-up">We are team of talented designers making websites with Bootstrap</h2>
      <a data-aos="fade-up" data-aos-delay="200" href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <section id="about" class="about">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>About Us</h2>
        <p>Magnam dolores commodi suscipit eius consequatur</p>
      </div>

      <div class="row">
        <div class="col-lg-6" data-aos="fade-right">
          <div class="image">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left">
          <div class="pt-4 pl-0 content pt-lg-0 pl-lg-3 ">
            <h3>Voluptatem dignissimos provident quasi corporis</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="bx bx-check-double"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="bx bx-check-double"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum
            </p>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End About Us Section -->
@endsection
