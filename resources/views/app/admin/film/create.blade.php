@extends('app.admin.layout.master')

@section('title')
    : Film
@endsection

@section('custom_css')
<style>

</style>
@endsection

@section('content')
<div class="container">
<div class="main-body">
    {{Breadcrumbs::render('category', 'film')}}
    <div id="demo">

    </div>
</div>
</div>
@endsection


@section('custom_js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{url('js/film.js')}}"></script>
@endsection