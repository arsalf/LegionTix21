@extends('app.admin.layout.master')

@section('title')
    : My Profile
@endsection

@section('custom_css')
<style>
.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
#kelurahan {
    background-color: #e9ecef;
    cursor: no-drop;
    pointer-events: none;
}
</style>
@endsection

@section('content')
<div class="container">
<div class="main-body">
    {{Breadcrumbs::render('profile')}}
    <div class="container rounded bg-white">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="img-fluid rounded-circle mt-5" src="{{url('/admin/images/faces/face8.jpg')}}"><span class="font-weight-bold">{{Auth::user()->username}}</span><span class="text-black-50">{{Auth::user()->email}}</span><span> </span></div>
            </div>
            <div class="col-md-8 border-right">
                <div class="p-3 py-5">
                    @php
                        $prov = 0;
                    @endphp
                    @foreach ($profiles as $item)
                        <form action="{{route('profile.update', $item->account_id)}}" method="POST">
                            @csrf
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Profile Settings</h4>
                            </div>
                            
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label class="labels">First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{$item->first_name}}">
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" value="{{$item->last_name}}" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="labels">Nomor Telepon</label>
                                    <input type="text" class="form-control" placeholder="Phone Number" name="no_telp" value="{{$item->no_hp}}">
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Tanggal Lahir</label>    
                                    <input class="form-control" type="date" id="birthday" name="birth_date" value="{{date_format(date_create($item->birth_date), 'Y-m-d')}}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="labels">Provinsi</label>
                                    <select id="provinsi" class="form-select form-select-sm" name="provinsi">
                                        <option>--- Pilih Provinsi ---</option>
                                        <option value="{{$item->prov_id}}" selected>{{$item->prov_name}}</option>                                    
                                    </select> 
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Kabupaten/Kota</label>
                                    <select id="city" class="form-select form-select-sm" name="city">
                                        <option>--- Pilih Kabupaten/Kota ---</option>
                                        <option value="{{$item->city_id}}" selected>{{$item->city_name}}</option>                                    
                                    </select>
                                </div>                        
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="labels">Kecamatan</label>
                                    <select id="kecamatan" class="form-select form-select-sm" name="kecamatan">
                                        <option>--- Pilih Kecamatan ---</option>
                                        <option value="{{$item->kec_id}}" selected>{{$item->kec_name}}</option>                                        
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="labels">Kelurahan</label>
                                    <select id="kelurahan" class="form-select form-select-sm" name="kelurahan">
                                        <option>--- Pilih Kelurahan ---</option>                                
                                        <option value="{{$item->kel_id}}" selected>{{ $item->kel_name}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label class="labels">Nama Jalan/Daerah/Blok Rumah</label>
                                    <input type="text" class="form-control" placeholder="Nama Jalan/Daerah/Blok/Rumah" name="address" value="{{$item->address}}">
                                </div>
                            </div>                                 
                            
                            <div class="mt-5 text-center">
                                @method('PUT')        
                                <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection


@section('custom_js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
{{-- <script src="http://api.iksgroup.co.id/apijs/lokasiapi.js"></script>
<script>
var render=createwidgetlokasi("provinsi","kabupaten","kecamatan","kelurahan");
</script> --}}
<script src="{{url('js/location.js')}}"></script>
<script>
    $(document).ready(function()
    {
        $("#kelurahan").prop('disabled', false); //enable
    })
</script>
@endsection