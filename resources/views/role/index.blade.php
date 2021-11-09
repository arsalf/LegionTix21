@extends('app.layout')

@section('title')
    Role Table
@endsection

@section('content')
<div class="container">
    <h1 class="text-center">Role Table</h1>
    <div class="">
        <button type="button" class="btn btn-primary"><a class="text-light" style="text-decoration: none" href="{{url('admin/manage/role/create')}}">Add</a></button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr class="align-middle">
                    <th>{{$item->id}}</th>
                    <th>{{$item->name}}</th>
                    <th>
                        <button class="btn btn-dark">
                            <a class="text-light" style="text-decoration: none" href="{{url('admin/manage/role/'.strval($item->id).'/edit')}}">edit</a>
                        </button>
                        <button class="btn btn-danger text-white">
                            <a class="text-light" style="text-decoration: none" href="{{url('admin/manage/role/'.strval($item->id))}}">delete</a>
                        </button>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection