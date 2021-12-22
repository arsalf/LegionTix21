@extends('app.admin.layout.master')

@section('title')
    : Create A Role
@endsection

@section('content')
<div class="container">
    <h1 class="text-center">Create {{strtolower($table_name)}}</h1>
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

    <form action="{{route(strtolower($table_name).'.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @foreach ($header as $head)
            @if ($head != 'ID')
                @if($head == 'VILLAGE_ID')                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="labels">Provinsi</label>
                            <select id="provinsi" class="form-select form-select-sm" name="provinsi">
                                <option selected>--- Pilih Provinsi ---</option>
                            </select> 
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Kabupaten/Kota</label>
                            <select id="city" class="form-select form-select-sm" name="city">
                                <option selected>--- Pilih Kabupaten/Kota ---</option>
                            </select>
                        </div>                        
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="labels">Kecamatan</label>
                            <select id="kecamatan" class="form-select form-select-sm" name="kecamatan">
                                <option selected>--- Pilih Kecamatan ---</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Kelurahan</label>
                            <select id="kelurahan" class="form-select form-select-sm" name="kelurahan">
                                <option selected>--- Pilih Kelurahan ---</option>
                            </select>
                        </div>
                    </div>
                @elseif($head == 'WAKTU')   
                    <div class="mb-3">
                        <label class="form-label">{{$head}}</label>
                        <input type="datetime-local" name="{{strtolower($head)}}" class="form-control" placeholder="{{strtolower($table_name)}} {{strtolower($head)}}">            
                    </div>
                @elseif($head=='GAMBAR')
                <div class="mb-3">
                    <label class="form-label">{{$head}}</label>
                    <input type="file" name="{{strtolower($head)}}" class="form-control" placeholder="{{strtolower($table_name)}} {{strtolower($head)}}">            
                </div>
                @else
                    <div class="mb-3">
                        <label class="form-label">{{$head}}</label>
                        <input type="text" name="{{strtolower($head)}}" class="form-control" placeholder="{{strtolower($table_name)}} {{strtolower($head)}}">            
                    </div>               
                @endif            
            @endif    

        @endforeach
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection


@section('custom_js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
{{-- <script src="http://api.iksgroup.co.id/apijs/lokasiapi.js"></script>
<script>
var render=createwidgetlokasi("provinsi","kabupaten","kecamatan","kelurahan");
</script> --}}
<script src="{{url('js/location.js')}}"></script>
@endsection