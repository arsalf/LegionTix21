@extends('app.admin.layout.master')

@section('title')
    : Edit A Role
@endsection

@section('custom_css')
<style>
#kelurahan, #id {
    background-color: #e9ecef;
    pointer-events: none;
}
</style>
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
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{route(strtolower($table_name).'.update', $id)}}" method="POST">
        @csrf
        
        @php        
            $array = json_decode(json_encode($data), true);            
        @endphp

        @foreach($array as $key => $value)
                @if(strtolower($key) == 'village_id')
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
                                <option value="{{$data->city_id}}" selected>{{$data->city_name}}</option>
                            </select>
                        </div>                        
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="labels">Kecamatan</label>
                            <select id="kecamatan" class="form-select form-select-sm" name="kecamatan">
                                <option selected>--- Pilih Kecamatan ---</option>
                                <option value="{{$data->kec_id}}" selected>{{$data->kec_name}}</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Kelurahan</label>
                            <select id="kelurahan" class="form-select form-select-sm" name="kelurahan">
                                <option selected>--- Pilih Kelurahan ---</option>
                                <option value="{{$data->village_id}}" selected>{{$data->kel_name}}</option>
                            </select>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $("#kelurahan").prop('disabled', false); //enable
                            var id = {{$data->prov_id}};
                            $('#provinsi option:nth-child(2)').remove();
                            var skip = true;
                            function checkFlag() {
                                if($('#provinsi').val() == id || skip) {                
                                    window.setTimeout(checkFlag, 1000); /* this checks the flag every 100 milliseconds*/
                                    skip = false;
                                    $('#provinsi').val(id);    
                                } else {
                                    $('#provinsi').val(id);                                
                                }
                            }
                            checkFlag();
                        });
                    </script>
                    @break
                @elseif(strtolower($key) == 'waktu')
                <div class="mb-3">
                    <label class="form-label">{{$key}}</label>
                    <input type="datetime-local" name="{{strtolower($key)}}" class="form-control" placeholder=" " value="{{ date('Y-m-d\TH:i:s', strtotime($value))}}">            
                </div>  
                @else
                    <div class="mb-3">
                        <label class="form-label">{{$key}}</label>
                        <input type="text"  id="{{strtolower($key)}}" name='{{strtolower($key)}}' class="form-control" value='{{$value}}'>            
                    </div>
                @endif            
        @endforeach

        @method('PUT')
        <button type="submit" class="btn btn-primary">Update</button>
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