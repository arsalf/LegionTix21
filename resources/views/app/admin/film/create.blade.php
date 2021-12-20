@extends('app.admin.layout.master')

@section('title')
    : Film
@endsection

@section('custom_css')
<style>
.search {
    width: 100%;
    margin-bottom: auto;
    margin-top: 20px;
    height: 50px;
    background-color: #fff;
    padding: 10px;
    border-radius: 5px
}

.search-input {
    color: white;
    border: 0;
    outline: 0;
    background: none;
    width: 0;
    margin-top: 5px;
    caret-color: transparent;
    line-height: 20px;
    transition: width 0.4s linear
}

.search .search-input {
    padding: 0 10px;
    width: 100%;
    caret-color: #536bf6;
    font-size: 19px;
    font-weight: 300;
    color: black;
    transition: width 0.4s linear
}

.search-icon {
    height: 34px;
    width: 34px;
    float: right;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    background-color: #536bf6;
    font-size: 10px;
    bottom: 30px;
    position: relative;
    border-radius: 5px
}
.manual{
    display:none;
}
</style>
@endsection

@section('content')
<div class="container">
<div class="main-body">
    {{Breadcrumbs::render('category', 'film')}}
    <h1 class="text-center"> Add Movies </h1>
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

@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
    <div class="container">
        <div class="row">            
            <div class="col-sm-6">
                <div class="wrap">
                    <div class="d-flex justify-content-center align-items-center">
                        <form action="{{route('film.search')}}" method="GET">
                            <div class="form-group">
                                <div class="input-group">                                    
                                    <input id="search" type="text" class="form-control" placeholder="Search Film From IMDB-API" aria-label="Search Film From IMDB-API" name="search">                                    
                                    <div class="input-group-append">
                                        <input id="submit" class="btn btn-sm btn-primary" type="submit" value="Search"/>
                                    </div>
                                </div>
                            </div> 
                        </form>                
                    </div>                        
                </div>
            </div>
            <div class="col-sm-6">
                <div class="d-flex justify-content-center">                
                    <button id="manual-btn" type="button" class="btn btn-primary">Manual</button>                
                </div>
            </div>
        </div>  
        <div class="row mb-3">    
            <div class="manual">
                <form action="{{route('film.store')}}" method="POST">
                    @csrf
                    @foreach ($header as $head)
                        @if ($head != 'ID' and $head != 'IMDB_ID')
                            @if ($head == 'DURATION')
                                <div class="mb-3">
                                    <label class="form-label">{{$head}}</label>
                                    <input type="time" name="{{strtolower($head)}}" class="form-control" placeholder="{{strtolower($table_name)}} {{strtolower($head)}}" step="1">            
                                </div>          
                            @elseif ($head == 'RELEASE_DATE')                          
                            <div class="mb-3">
                                <label class="form-label">{{$head}}</label>
                                <input type="date" name="{{strtolower($head)}}" class="form-control" placeholder="{{strtolower($table_name)}} {{strtolower($head)}}" step="1">            
                            </div>          
                            @else
                                <div class="mb-3">
                                    <label class="form-label">{{$head}}</label>
                                    <input type="text" name="{{strtolower($head)}}" class="form-control" placeholder="{{strtolower($table_name)}} {{strtolower($head)}}">                                                
                                </div>                                       
                            @endif                                 
                        @endif     
                    @endforeach
                    <input type="hidden" name="jenis"  value="manual">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>        
        <div class="row">
            <div class="show-result">
                @if(!is_null($results))         
                <h2>Results : </h2>
                    @foreach($results as $data)    
                        @php
                        $data = json_decode(json_encode($data));
                        @endphp                   
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <img class="img-fluid" src="{{$data->image}}">
                            </div>
                            <div class="col-sm-9">
                                <form action="{{route('film.store')}}" method="POST">  
                                    @csrf                          
                                    <label>Title : </label>
                                    <input type="text" class="form-control" name="title" value="{{$data->title}}" readonly>
                                    <label>Description : </label>
                                    <input type="text" class="form-control" name="description" value="{{$data->description}}" readonly>                                    
                                    <input type="hidden" class="form-control" name="id_imdb" value="{{$data->id}}">
                                    <input type="hidden" name="jenis"  value="search">
                                    <button type="submit" class="btn btn-primary mt-3">Add</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>    
    </div>
</div>
</div>
@endsection


@section('custom_js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{url('js/film.js')}}"></script>
@endsection