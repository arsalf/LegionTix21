@extends('app.home.layout.layout')

@section('title')
    Legion Tix
@endsection

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel">
                @foreach($filmOnGoing as $film)
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
        </div>
        <div class="product spad">
            <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Sedang Tayang</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    {{-- <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a> --}}
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
                                            <div class="view"><i class="fa fa-time"></i>{{ date('H:i:s', strtotime($film->duration)) }}</div>
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
                                    <h4>Coming Soon</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    {{-- <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a> --}}
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
            </div>
        </div>
    </section>
<!-- Product Section End -->
@endsection
