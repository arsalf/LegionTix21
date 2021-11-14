@extends('app.admin.layout')

@section('title')
    Edit A Role
@endsection

@section('content')
<div class="container">
    <h1 class="text-center">Update A Role</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif
    <form action="{{route('role.update', $role->id)}}" method="POST">
        @csrf
        <input type="text" name="name" value="{{$role->name}}">
        @method('PUT')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection