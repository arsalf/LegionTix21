@extends('app.admin.layout.master')

@section('title')
    : Role Table
@endsection

@section('custom_css')
<style>
form{
    display: inline-block;
    margin-left: 1em;
}
</style>
    
@endsection

@section('content')
<div class="container">
    {{Breadcrumbs::render('category', ucfirst(strtolower($table_name)))}}
    <h1 class="text-center">{{$table_name}} TABLE</h1>
    @if (session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif
    <div class="">
        <button type="button" class="btn btn-primary"><a class="text-light" style="text-decoration: none" href="{{route(strtolower($table_name).'.create')}}">Add</a></button>
    </div>
    <table class="table">
        <thead>
            <tr>
                @foreach ($header as $head)
                <th scope="col">{{$head}}</th>    
                @endforeach
                <th class="text-center" scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr class="align-middle">
                    @php
                        $array = json_decode(json_encode($item), true);
                    @endphp
                    @foreach ($array as $ar)
                        <td>{{$ar}}</td>   
                    @endforeach
                    <td>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-warning">
                                <a class="text-light" style="text-decoration: none" href="{{route(strtolower($table_name).'.edit', $item->id)}}">edit</a>
                            </button>
                            <form action="{{route(strtolower($table_name).'.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white btn btn-danger">
                                    delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection