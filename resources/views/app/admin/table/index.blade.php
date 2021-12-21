@extends('app.admin.layout.master')

@section('title')
    : Role Table
@endsection

@section('custom_css')
<style>
.table-responsive{
    background-color: white;
}
form{
    display: inline-block;
    margin-left: 1em;
}
</style>
    
@endsection

@section('content')
<div class="container">
    {{Breadcrumbs::render('category', ucfirst(strtolower($table_name)))}}
    <h2 class="text-center">{{$table_name}} TABLE</h2>
    @if (session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="">
        <a class="btn btn-primary text-light" style="text-decoration: none" href="{{route(strtolower($table_name).'.create')}}">Add</a>
    </div>
    <div class="table-responsive mt-2 border border-dark">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    @foreach ($data as $item)
                        @php
                            $json = json_decode(json_encode($item), 1);
                        @endphp
                        @foreach ($json as $key => $value)
                        <th scope="col">{{$key}}</th>
                        @endforeach
                        @break
                    @endforeach                    
                    <th class="text-center" scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>        
                @php             

                    if(Request::get('page')){
                        $no = (Request::get('page')-1) * $page + 1;
                    } else {
                        $no = 1;
                    }                    
                @endphp
                @foreach ($data as $item)
                    <tr class="align-middle">                        
                        @php                    
                            $array = json_decode(json_encode($item), true);
                        @endphp
                        <td>{{$no}}</td>
                        @php
                            $no = $no + 1;
                        @endphp
                        @foreach ($array as $ar)                            
                            <td>{{$ar}}</td>                        
                        @endforeach
                        <td>
                            <div class="d-flex justify-content-center">                                
                                @if(!is_null($item->id))
                                <a class="btn btn-warning text-light" style="text-decoration: none" href="{{route(strtolower($table_name).'.edit', $item->id)}}">edit</a>                                
                                <form action="{{route(strtolower($table_name).'.destroy', $item->id)}}" method="POST">
                                @else
                                <a class="btn btn-warning text-light" style="text-decoration: none" href="{{route(strtolower($table_name).'.edit', $item->name)}}">edit</a>
                                <form action="{{route(strtolower($table_name).'.destroy', $item->name)}}" method="POST">
                                @endif
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
    
    <div class="page mt-2">
        <div class="d-flex justify-content-center">
        {{ $data->links() }}
        </div>
    </div>
    
</div>
@endsection