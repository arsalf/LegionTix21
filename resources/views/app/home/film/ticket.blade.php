@extends('app.home.layout.layout')

@section('title')
    Detail Film
@endsection

@section('content')
    <!-- Login Section Begin -->
    <section class="p-5" style="height: 563px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form method="POST" action="{{ route('kursis.store') }}">
                        @csrf
                            <input type="hidden" name="idFilm" value="{{$id}}">
                            <div class="form-group row">
                                <label for="bioskop" class="text-white col-sm-2 col-form-label">Bioskop</label>
                                <div class="text-dark col-sm-10">
                                    <select id="bioskop" name="bioskop" class="selectFilm">
                                        @foreach ($data as $item)
                                            <option value="{{$item->bioskop_name}} - {{$item->bioskop_type}}">{{$item->bioskop_name}} - {{$item->bioskop_type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="text-white d-flex flex-column justify-content-center col-sm-2 col-form-label">Studio</label>
                                <div class="text-white col-sm-10">
                                    @foreach ($data as $item)
                                        <div class="form-check form-check-inline">
                                            <input class="radio-toolbar-input" type="radio" id="radio{{$item->studio_type}}" name="studio" value="{{$item->studio_type}}">
                                            <label class="radio-toolbar-label btn-ticket" for="radio{{$item->studio_type}}">{{$item->studio_type}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="text-white d-flex flex-column justify-content-center col-sm-2 col-form-label">Jam Tayang</label>
                                <div class="text-white col-sm-10">
                                    @foreach ($data as $item)
                                        <div class="form-check form-check-inline">
                                            <input class="radio-toolbar-input" type="radio" id="jam{{$item->waktu}}" name="jamTayang" value="{{$item->waktu}}">
                                            <label class="radio-toolbar-label btn-ticket" for="jam{{$item->waktu}}">{{$item->waktu}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" class="mt-5 btn btn-success">Buy Ticket</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Login Section End -->
        @endsection
        