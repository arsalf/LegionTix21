@extends('app.admin.layout')

@section('title')
    Create A Role
@endsection

@section('content')
<div class="container">
    <h1 class="text-center">Create A Role</h1>
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
    <form action="{{route('role.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Role Name">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection