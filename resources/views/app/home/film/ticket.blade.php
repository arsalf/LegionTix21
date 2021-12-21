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
                                        <option value="Jatos - XXI">Jatos - XXI</option>
                                        <option value="Bubat - XXI">Bubat - XXI</option>
                                        <option value="PVJ - CGV">PVJ - CGV</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="text-white d-flex flex-column justify-content-center col-sm-2 col-form-label">Studio</label>
                                <div class="text-white col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="radio-toolbar-input" type="radio" id="radioApple" name="studio" value="Imax" checked>
                                        <label class="radio-toolbar-label btn-ticket" for="radioApple">Imax</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="radio-toolbar-input" type="radio" id="radioBanana" name="studio" value="Regular">
                                    <label class="radio-toolbar-label btn-ticket" for="radioBanana">Regular</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="radio-toolbar-input" type="radio" id="radioOrange" name="studio" value="3D">
                                    <label class="radio-toolbar-label btn-ticket" for="radioOrange">3D</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="text-white d-flex flex-column justify-content-center col-sm-2 col-form-label">Jam Tayang</label>
                                <div class="text-white col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <input class="radio-toolbar-input" type="radio" id="jam1" name="jamTayang" value="1" checked>
                                        <label class="radio-toolbar-label btn-ticket" for="jam1">12:00</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="radio-toolbar-input" type="radio" id="jam2" name="jamTayang" value="2">
                                    <label class="radio-toolbar-label btn-ticket" for="jam2">13:30</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="radio-toolbar-input" type="radio" id="jam3" name="jamTayang" value="3">
                                    <label class="radio-toolbar-label btn-ticket" for="jam3">15:00</label>
                                    </div>
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
        