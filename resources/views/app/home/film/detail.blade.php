@extends('app.home.layout.layout')

@section('title')
    Detail Film
@endsection

@section('content')
         <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ url('app')}}"><i class="fa fa-home"></i> Home</a>
                        <span>{{ $data->title }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="{{ $data->image }}">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{$data->title}}</h3>
                                <span>{{$data->language}}</span>
                            </div>
                            <p>Every human inhabiting the world of Alcia is branded by a “Count” or a number written on
                                their body. For Hina’s mother, her total drops to 0 and she’s pulled into the Abyss,
                                never to be seen again. But her mother’s last words send Hina on a quest to find a
                            legendary hero from the Waste War - the fabled Ace!</p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <ul>
                                            <li><span>Director:</span> {{$data->director}}</li>
                                            <li><span>Genre:</span> {{$data->genre}}</li>
                                            <li><span>Date Release:</span> {{$data->release_date}}</li>
                                            <li><span>Language:</span> {{$data->language}}</li>
                                            <li><span>Rating:</span> {{$data->rating}}</li>
                                            <li>
                                                <span><b>Cast</b></span>
                                            </li>
                                            <span class="text-white">
                                                <a href="#">coba</a>,
                                                <a href="#">coba</a>,
                                                <a href="#">coba</a>,
                                                <a href="#">coba</a>,
                                                <a href="#">coba</a>
                                            </span>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                <a href="#" class="follow-btn">
                                    <i class="fa fa-heart-o"></i> Add to WishList
                                </a>
                                <a href="#" data-toggle="modal" data-target=".bd-example-modal-xl" class="follow-btn">
                                    <i class="fa fa-film"></i><span> Trailers</span>
                                </a>
                                <a href="{{ route('tiket.index') }}" class="watch-btn"><span>Buy Ticket</span> <i
                                    class="fa fa-angle-right"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="anime__details__review">
                            <div class="section-title">
                                <h5>Reviews</h5>
                            </div>
                            <div class="anime__review__item">
                                <div class="anime__review__item__pic">
                                    <img src="{{ asset('home/img/anime/review-1.jpg')}}" alt="">
                                </div>
                                <div class="anime__review__item__text">
                                    <h6>Chris Curry - <span>1 Hour ago</span></h6>
                                    <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                    "demons" LOL</p>
                                </div>
                            </div>
                            <div class="anime__review__item">
                                <div class="anime__review__item__pic">
                                    <img src="{{ asset('home/img/anime/review-2.jpg')}}" alt="">
                                </div>
                                <div class="anime__review__item__text">
                                    <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                                    <p>Finally it came out ages ago</p>
                                </div>
                            </div>
                            <div class="anime__review__item">
                                <div class="anime__review__item__pic">
                                    <img src="{{ asset('home/img/anime/review-3.jpg')}}" alt="">
                                </div>
                                <div class="anime__review__item__text">
                                    <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                                    <p>Where is the episode 15 ? Slow update! Tch</p>
                                </div>
                            </div>
                            <div class="anime__review__item">
                                <div class="anime__review__item__pic">
                                    <img src="{{ asset('home/img/anime/review-4.jpg')}}" alt="">
                                </div>
                                <div class="anime__review__item__text">
                                    <h6>Chris Curry - <span>1 Hour ago</span></h6>
                                    <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                    "demons" LOL</p>
                                </div>
                            </div>
                            <div class="anime__review__item">
                                <div class="anime__review__item__pic">
                                    <img src="{{ asset('home/img/anime/review-5.jpg')}}" alt="">
                                </div>
                                <div class="anime__review__item__text">
                                    <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                                    <p>Finally it came out ages ago</p>
                                </div>
                            </div>
                            <div class="anime__review__item">
                                <div class="anime__review__item__pic">
                                    <img src="{{ asset('home/img/anime/review-6.jpg')}}" alt="">
                                </div>
                                <div class="anime__review__item__text">
                                    <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                                    <p>Where is the episode 15 ? Slow update! Tch</p>
                                </div>
                            </div>
                        </div>
                        <div class="anime__details__form">
                            <div class="section-title">
                                <h5>Your Comment</h5>
                            </div>
                            <form action="#">
                                <textarea placeholder="Your Comment"></textarea>
                                <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade bd-example-modal-xl modal-film" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content modal-film-content">
                    <iframe src="https://www.imdb.com/video/imdb/vi2959588889/imdb/embed" width="900" height="500" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true" frameborder="no" scrolling="no"></iframe>
              </div>
            </div>
          </div>
        <!-- End Modal -->

        
        <!-- Anime Section End -->
@endsection
