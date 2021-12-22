@extends('app.home.layout.layout')

@section('title')
    Legion Tix
@endsection

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel">
                @foreach($data as $film)
                    <div class="hero__items set-bg" data-setbg="{{ $film->image }}">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="hero__text">
                                    @foreach(explode(',',$film->genre) as $genre)
                                        <div class="label">{{ $genre }}</div>
                                    @endforeach
                                    <h2>{{$film->title}}</h2>
                                    <p>{{$film->language}}</p>
                                    <a href="{{ route('films.show',$film->id)}}"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <!-- Hero Section End -->
        {{-- <div class="text-white">
            @foreach ($data as $item)
                <p>{{$item->id}}</p>
                <p>{{$item->title}}</p>
                <p>{{$item->type}}</p>    
                <p>{{$item->waktu}}</p>
            @endforeach
        </div> --}}
        <!-- Product Section Begin -->
        <section class="product spad">
            <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Trending Now</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($filmOnGoing as $film)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{ $film->image }}">
                                            <div class="ep">{{ $film->rating }}</div>
                                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                            <div class="view"><i class="fa fa-time"></i>{{ $film->duration }}</div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                @foreach(explode(',',$film->genre) as $genre)
                                                    <li>{{ $genre }}</li>
                                                @endforeach
                                            </ul>
                                            <h5><a href="{{ route('films.show',$film->id)}}"> {{ $film->title }} </a></h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="popular__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Popular Shows</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($filmComingSoon as $film)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{ $film->image }}">
                                            <div class="ep">{{ $film->rating }}</div>
                                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                            <div class="view"><i class="fa fa-time"></i>{{ $film->duration }}</div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                @foreach(explode(',',$film->genre) as $genre)
                                                    <li>{{ $genre }}</li>
                                                @endforeach
                                            </ul>
                                            <h5><a href="{{ route('films.show',$film->id)}}"> {{ $film->title }} </a></h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                            <div class="section-title">
                                <h5>Top Views</h5>
                            </div>
                            <ul class="filter__controls">
                                <li class="active" data-filter="*">Day</li>
                                <li data-filter=".week">Week</li>
                                <li data-filter=".month">Month</li>
                                <li data-filter=".years">Years</li>
                            </ul>
                            <div class="filter__gallery">
                                <div class="product__sidebar__view__item set-bg mix day years"
                                data-setbg="{{ asset('home/img/sidebar/tv-1.jpg') }}">
                                <div class="ep">18 / ?</div>
                                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                <h5><a href="#">Boruto: Naruto next generations</a></h5>
                            </div>
                            <div class="product__sidebar__view__item set-bg mix month week"
                            data-setbg="{{ asset('home/img/sidebar/tv-2.jpg') }}">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg mix week years"
                        data-setbg="{{ asset('home/img/sidebar/tv-3.jpg') }}">
                        <div class="ep">18 / ?</div>
                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        <h5><a href="#">Sword art online alicization war of underworld</a></h5>
                    </div>
                    <div class="product__sidebar__view__item set-bg mix years month"
                    data-setbg="{{ asset('home/img/sidebar/tv-4.jpg') }}">
                    <div class="ep">18 / ?</div>
                    <div class="view"><i class="fa fa-eye"></i> 9141</div>
                    <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
                </div>
                <div class="product__sidebar__view__item set-bg mix day"
                data-setbg="{{ asset('home/img/sidebar/tv-5.jpg') }}">
                <div class="ep">18 / ?</div>
                <div class="view"><i class="fa fa-eye"></i> 9141</div>
                <h5><a href="#">Fate stay night unlimited blade works</a></h5>
            </div>
        </div>
    </section>
<!-- Product Section End -->
@endsection
