@extends('app.home.layout.layout')

@section('title')
    Detail Film
@endsection

@section('content')
    <!-- Login Section Begin -->
    <section class="p-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form >
                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="text-white col-sm-2 col-form-label">Bioskop</label>
                            <div class="text-dark col-sm-10">
                                <select>
                                    <option>Jatos - XXI</option>
                                    <option>Bubat - XXI</option>
                                    <option>PVJ - CGV</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="text-white col-sm-2 col-form-label">Studio</label>
                            <div class="text-white col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="radio-toolbar-input" type="radio" id="radioApple" name="studio" value="apple" checked>
                                    <label class="radio-toolbar-label btn-ticket" for="radioApple">Imax</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="radio-toolbar-input" type="radio" id="radioBanana" name="studio" value="banana">
                                <label class="radio-toolbar-label btn-ticket" for="radioBanana">Regular</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="radio-toolbar-input" type="radio" id="radioOrange" name="studio" value="orange">
                                <label class="radio-toolbar-label btn-ticket" for="radioOrange">3d</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="text-white col-sm-2 col-form-label">Jam Tayang</label>
                            <div class="text-white col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="radio-toolbar-input" type="radio" id="jam1" name="jamTayang" value="apple" checked>
                                    <label class="radio-toolbar-label btn-ticket" for="jam1">12:00</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="radio-toolbar-input" type="radio" id="jam2" name="jamTayang" value="banana">
                                <label class="radio-toolbar-label btn-ticket" for="jam2">13:30</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="radio-toolbar-input" type="radio" id="jam3" name="jamTayang" value="orange">
                                <label class="radio-toolbar-label btn-ticket" for="jam3">15:00</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <a href="{{url('app/kursi')}}" class="mt-5 btn btn-success">Buy Ticket</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Login Section End -->
        @endsection
        