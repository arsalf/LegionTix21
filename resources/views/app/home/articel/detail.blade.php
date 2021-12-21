@extends('app.home.layout.layout')

@section('title')
    Detail Articel
@endsection

@section('content')
    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="blog__details__title">
                        <h6>Action, Magic <span>- March 08, 2020</span></h6>
                        <h2>Anime for Beginners: 20 Pieces of Essential Viewing</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="blog__details__pic">
                        <img src="{{asset('home/img/blog/details/blog-details-pic.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog__details__content">
                        <div class="blog__details__text">
                            <p>As a result the last couple of eps haven’t been super exciting for me, because they’ve
                                been more like settling into a familiar and comfortable routine.  We’re seeing character
                                growth here but it’s subtle (apart from Shouyou, arguably).  I mean, Tobio being an
                                asshole is nothing new – it’s kind of the foundation of his entire character arc. 
                                Confronting whether his being an asshole is a problem for the Crows this directly is a
                                bit of an evolution, and probably an overdue one at that, but the overall dynamic with
                            Kageyama is basically unchanged.</p>
                        </div>
                        <div class="blog__details__item__text">
                            <h4>Tobio-Nishinoya showdown:</h4>
                            <img src="{{asset('home/img/blog/details/bd-item-1.jpg')}}" alt="">
                            <p>In Japan the idea of a first-year speaking to a senior the way Kageyama did to Asahi is a
                                lot more shocking than it would be in the West, but Tobio calling out teammates in
                                genuinely rude fashion in the middle of a match is what got him isolated in the first
                                place.  It’s better for the Crows to sort this out in practice matches than the real
                                deal, but this is really on Tobio – he has to figure out how to co-exist with others in
                            a team environment.</p>
                        </div>
                        <div class="blog__details__item__text">
                            <h4>Nanatsu no Taizai: Kamigami No Gekirin</h4>
                            <img src="{{asset('home/img/blog/details/bd-item-2.jpg')}}" alt="">
                            <p>In Japan the idea of a first-year speaking to a senior the way Kageyama did to Asahi is a
                                lot more shocking than it would be in the West, but Tobio calling out teammates in
                                genuinely rude fashion in the middle of a match is what got him isolated in the first
                                place.  It’s better for the Crows to sort this out in practice matches than the real
                                deal, but this is really on Tobio – he has to figure out how to co-exist with others in
                            a team environment.</p>
                        </div>
                        <div class="blog__details__item__text">
                            <h4>ID:Ianvaded:</h4>
                            <img src="{{asset('home/img/blog/details/bd-item-3.jpg')}}" alt="">
                            <p>In Japan the idea of a first-year speaking to a senior the way Kageyama did to Asahi is a
                                lot more shocking than it would be in the West, but Tobio calling out teammates in
                                genuinely rude fashion in the middle of a match is what got him isolated in the first
                                place.  It’s better for the Crows to sort this out in practice matches than the real
                                deal, but this is really on Tobio – he has to figure out how to co-exist with others in
                            a team environment.</p>
                        </div>
                        <div class="blog__details__tags">
                            <a href="#">Healthfood</a>
                            <a href="#">Sport</a>
                            <a href="#">Game</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Details Section End -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            setTimeout(function(){
                alert('Koin ditambahkan 10 pada user {{Auth::user()->username}}')
                
                var url = "{{ route('dompet.edit',Auth::user()->id) }}";
                window.location.href=url;
            }, 10000);
        });
    </script>
@endsection
