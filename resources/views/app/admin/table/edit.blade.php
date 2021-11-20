@extends('app.admin.layout.master')

@section('title')
    : Edit A Role
@endsection

@section('content')
<div class="container">
    <h1 class="text-center">Update A {{ucfirst(strtolower($table_name))}}</h1>
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
    <form action="{{route(strtolower($table_name).'.update', $data->id)}}" method="POST">
        @csrf
        
        @php
            $i = 0;
            $array = json_decode(json_encode($data), true);
        @endphp
        
        @foreach ($array as $arr)
            <label>{{$header[$i]}}</label>
            <input type="text" name='{{strtolower($header[$i])}}' value='{{$arr}}'>
            @php
                $i += 1;
            @endphp
        @endforeach

        @method('PUT')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection