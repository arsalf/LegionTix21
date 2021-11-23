@extends('app.landing.layout')

@section('title')
    Legion Tix
@endsection

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <a href="#" class="hero-logo" data-aos="zoom-in"><img src="{{ asset('img/hero-logo2.png') }}" style="transform: scale(1.5)" alt=""></a>
      <h1 data-aos="zoom-in">Welcome To Legion Tix</h1>
      <h2 data-aos="fade-up">Legion for honnor</h2>
      <a data-aos="fade-up" data-aos-delay="200" href="{{url('app')}}" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section>
  <!-- End Hero -->

  <section id="about" class="about">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>About Us</h2>
        <p>Legion Tix</p>
      </div>

      <div class="row">
        <div class="col-lg-6" data-aos="fade-right">
          <div class="image">
            <img src="{{ asset('img/logo2.png') }}" class="img-fluid" alt="">
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

  			<!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
          <div class="container" data-aos="zoom-in">
            <div class="quote-icon">
              <i class="bx bxs-quote-right"></i>
            </div>
  
            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <p>
                      Proin iaculis purus consequat sem cure
                      digni ssim donec porttitora entum
                      suscipit rhoncus. Accusantium quam,
                      ultricies eget id, aliquam eget nibh et.
                      Maecen aliquam, risus at semper.
                    </p>
                    <img
                      src="{{ asset('/img/testimonials/testimonials-1.jpg') }}"
                      class="testimonial-img"
                      alt=""
                    />
                    <h3>Saul Goodman</h3>
                    <h4>Ceo &amp; Founder</h4>
                  </div>
                </div>
                <!-- End testimonial item -->
  
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <p>
                      Export tempor illum tamen malis malis
                      eram quae irure esse labore quem cillum
                      quid cillum eram malis quorum velit fore
                      eram velit sunt aliqua noster fugiat
                      irure amet legam anim culpa.
                    </p>
                    <img
                      src="{{ asset('/img/testimonials/testimonials-2.jpg') }}"
                      class="testimonial-img"
                      alt=""
                    />
                    <h3>Sara Wilsson</h3>
                    <h4>Designer</h4>
                  </div>
                </div>
                <!-- End testimonial item -->
  
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <p>
                      Enim nisi quem export duis labore cillum
                      quae magna enim sint quorum nulla quem
                      veniam duis minim tempor labore quem
                      eram duis noster aute amet eram fore
                      quis sint minim.
                    </p>
                    <img
                      src="{{ asset('/img/testimonials/testimonials-3.jpg') }}"
                      class="testimonial-img"
                      alt=""
                    />
                    <h3>Jena Karlis</h3>
                    <h4>Store Owner</h4>
                  </div>
                </div>
                <!-- End testimonial item -->
  
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <p>
                      Fugiat enim eram quae cillum dolore
                      dolor amet nulla culpa multos export
                      minim fugiat minim velit minim dolor
                      enim duis veniam ipsum anim magna sunt
                      elit fore quem dolore labore illum
                      veniam.
                    </p>
                    <img
                      src="{{ asset('/img/testimonials/testimonials-4.jpg') }}"
                      class="testimonial-img"
                      alt=""
                    />
                    <h3>Matt Brandon</h3>
                    <h4>Freelancer</h4>
                  </div>
                </div>
                <!-- End testimonial item -->
  
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <p>
                      Quis quorum aliqua sint quem legam fore
                      sunt eram irure aliqua veniam tempor
                      noster veniam enim culpa labore duis
                      sunt culpa nulla illum cillum fugiat
                      legam esse veniam culpa fore nisi cillum
                      quid.
                    </p>
                    <img
                      src="{{ asset('/img/testimonials/testimonials-5.jpg') }}"
                      class="testimonial-img"
                      alt=""
                    />
                    <h3>John Larson</h3>
                    <h4>Entrepreneur</h4>
                  </div>
                </div>
                <!-- End testimonial item -->
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </section>
        <!-- End Testimonials Section -->

        <!-- ======= Team Section ======= -->
			<section id="team" class="team">
				<div class="container">
					<div class="section-title" data-aos="fade-up">
						<h2>Team</h2>
						<p>Magnam dolores commodi suscipit eius consequatur ex aliquid fuga eum quidem</p>
					</div>

					<div class="row">
						<div class="col-lg-4 col-md-6 d-flex align-items-stretch">
							<div class="member" data-aos="zoom-in">
								<div class="member-img">
									<img
										src="{{ asset('img/team/team-1.jpg') }}"
										class="img-fluid"
										alt=""
									/>
									<div class="social">
										<a href=""
											><i
												class=" bi bi-facebook"
											></i
										></a>
										<a href=""
											><i
												class=" bi bi-instagram"
											></i
										></a>
										<a href=""
											><i
												class=" bi bi-linkedin"
											></i
										></a>
									</div>
								</div>
								<div class="member-info">
									<h4>Arsal Fadillah</h4>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-6 d-flex align-items-stretch">
							<div class="member" data-aos="zoom-in" data-aos-delay="100">
								<div class="member-img">
									<img
                    src="{{ asset('img/team/team-2.jpg') }}"
										class="img-fluid"
										alt=""
									/>
									<div class="social">
										<a href=""
											><i
												class=" bi bi-facebook"
											></i
										></a>
										<a href=""
											><i
												class=" bi bi-instagram"
											></i
										></a>
										<a href=""
											><i
												class=" bi bi-linkedin"
											></i
										></a>
									</div>
								</div>
								<div class="member-info">
									<h4>M Zidan A B</h4>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-6 d-flex align-items-stretch">
							<div class="member" data-aos="zoom-in" data-aos-delay="200">
								<div class="member-img">
									<img
                    src="{{ asset('img/team/team-3.jpg') }}"
										class="img-fluid"
										alt=""
									/>
									<div class="social">
										<a href=""
											><i
												class=" bi bi-facebook"
											></i
										></a>
										<a href=""
											><i
												class=" bi bi-instagram"
											></i
										></a>
										<a href=""
											><i
												class=" bi bi-linkedin"
											></i
										></a>
									</div>
								</div>
								<div class="member-info">
									<h4>Nuno Alwi A</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Team Section -->

      <!-- ======= Frequently Asked Questions Section ======= -->
			<section id="faq" class="faq">
				<div class="container">
					<div class="section-title" data-aos="fade-up">
						<h2>Frequently Asked Questions</h2>
					</div>

					<ul class="faq-list">
						<li data-aos="fade-up">
							<a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq1"
								>Non consectetur a erat nam at lectus urna duis?
								<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i
							></a>
							<div id="faq1" class="collapse" data-bs-parent=".faq-list">
								<p>
									Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id
									volutpat lacus laoreet non curabitur gravida. Venenatis
									lectus magna fringilla urna porttitor rhoncus dolor purus
									non.
								</p>
							</div>
						</li>

						<li data-aos="fade-up" data-aos-delay="100">
							<a data-bs-toggle="collapse" data-bs-target="#faq2" class="collapsed"
								>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?
								<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i
							></a>
							<div id="faq2" class="collapse" data-bs-parent=".faq-list">
								<p>
									Dolor sit amet consectetur adipiscing elit pellentesque
									habitant morbi. Id interdum velit laoreet id donec ultrices.
									Fringilla phasellus faucibus scelerisque eleifend donec
									pretium. Est pellentesque elit ullamcorper dignissim. Mauris
									ultrices eros in cursus turpis massa tincidunt dui.
								</p>
							</div>
						</li>

						<li data-aos="fade-up" data-aos-delay="200">
							<a data-bs-toggle="collapse" data-bs-target="#faq3" class="collapsed"
								>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?
								<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i
							></a>
							<div id="faq3" class="collapse" data-bs-parent=".faq-list">
								<p>
									Eleifend mi in nulla posuere sollicitudin aliquam ultrices
									sagittis orci. Faucibus pulvinar elementum integer enim. Sem
									nulla pharetra diam sit amet nisl suscipit. Rutrum tellus
									pellentesque eu tincidunt. Lectus urna duis convallis
									convallis tellus. Urna molestie at elementum eu facilisis
									sed odio morbi quis
								</p>
							</div>
						</li>

						<li data-aos="fade-up" data-aos-delay="300">
							<a data-bs-toggle="collapse" data-bs-target="#faq4" class="collapsed"
								>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?
								<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i
							></a>
							<div id="faq4" class="collapse" data-bs-parent=".faq-list">
								<p>
									Dolor sit amet consectetur adipiscing elit pellentesque
									habitant morbi. Id interdum velit laoreet id donec ultrices.
									Fringilla phasellus faucibus scelerisque eleifend donec
									pretium. Est pellentesque elit ullamcorper dignissim. Mauris
									ultrices eros in cursus turpis massa tincidunt dui.
								</p>
							</div>
						</li>

						<li data-aos="fade-up" data-aos-delay="400">
							<a data-bs-toggle="collapse" data-bs-target="#faq5" class="collapsed"
								>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?
								<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i
							></a>
							<div id="faq5" class="collapse" data-bs-parent=".faq-list">
								<p>
									Molestie a iaculis at erat pellentesque adipiscing commodo.
									Dignissim suspendisse in est ante in. Nunc vel risus commodo
									viverra maecenas accumsan. Sit amet nisl suscipit adipiscing
									bibendum est. Purus gravida quis blandit turpis cursus in
								</p>
							</div>
						</li>

						<li data-aos="fade-up" data-aos-delay="500">
							<a data-bs-toggle="collapse" data-bs-target="#faq6" class="collapsed"
								>Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget
								lorem dolor? <i class="bx bx-chevron-down icon-show"></i
								><i class="bx bx-x icon-close"></i
							></a>
							<div id="faq6" class="collapse" data-bs-parent=".faq-list">
								<p>
									Laoreet sit amet cursus sit amet dictum sit amet justo.
									Mauris vitae ultricies leo integer malesuada nunc vel.
									Tincidunt eget nullam non nisi est sit amet. Turpis nunc
									eget lorem dolor sed. Ut venenatis tellus in metus vulputate
									eu scelerisque. Pellentesque diam volutpat commodo sed
									egestas egestas fringilla phasellus faucibus. Nibh tellus
									molestie nunc non blandit massa enim nec.
								</p>
							</div>
						</li>
					</ul>
				</div>
			</section>
			<!-- End Frequently Asked Questions Section -->
@endsection
