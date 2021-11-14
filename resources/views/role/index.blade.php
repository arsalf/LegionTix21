@extends('app.admin.layout')

@section('title')
    Role Table
@endsection

@section('style')
<style>
form{
    display: inline-block;
    margin-left: 1em;
}
</style>
    
@endsection

@section('content')
<div class="container">
    <h1 class="text-center">Role Table</h1>
    @if (session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif
    <div class="">
        <button type="button" class="btn btn-primary"><a class="text-light" style="text-decoration: none" href="{{url('admin/manage/role/create')}}">Add</a></button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
                <th class="text-center" scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr class="align-middle">
                    <th>{{$item->id}}</th>
                    <th>{{$item->name}}</th>
                    <th>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-warning">
                                <a class="text-dark" style="text-decoration: none" href="{{url('admin/manage/role/'.strval($item->id).'/edit')}}">edit</a>
                            </button>
                            <form action="{{route('role.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white btn btn-danger">
                                    delete
                                </button>
                            </form>
                        </div>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection