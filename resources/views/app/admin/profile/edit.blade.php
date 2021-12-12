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
                        @php
                            $prov = $item->prov_id;
                        @endphp
                    <form action="{{route('profile.update', $item->id)}}" method="POST">
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
                                <input type="text" class="form-control" placeholder="Phone Number" name="no_telp" value="{{Auth::user()->no_telp}}">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Tanggal Lahir</label>    
                                <input class="form-control" type="date" id="birthday" name="birth_date" value="{{$item->birth_date}}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels">Provinsi</label>
                                <select id="provinsi" class="form-select form-select-sm" name="provinsi">
                                    <option>--- Pilih Provinsi ---</option>
                                </select> 
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Kabupaten/Kota</label>
                                <select id="city" class="form-select form-select-sm" name="city">
                                    <option>--- Pilih Kabupaten/Kota ---</option>
                                    @foreach ($cities as $city)
                                        @if ($city->id ==  $item->city_id)
                                            <option value="{{$city->id}}" selected>{{$city->name}}</option>
                                        @else
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>                        
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels">Kecamatan</label>
                                <select id="kecamatan" class="form-select form-select-sm" name="kecamatan">
                                    <option>--- Pilih Kecamatan ---</option>
                                    @foreach ($kecs as $kec)
                                        @if ($kec->id ==  $item->kec_id)
                                            <option value="{{$kec->id}}" selected>{{$kec->name}}</option>
                                        @else
                                            <option value="{{$kec->id}}">{{$kec->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Kelurahan</label>
                                <select id="kelurahan" class="form-select form-select-sm" name="kelurahan">
                                    <option>--- Pilih Kelurahan ---</option>                                
                                    @foreach ($kels as $kel)
                                        @if ($kel->id ==  $item->kel_id)
                                            <option value="{{$kel->id}}" selected>{{$kel->name}}</option>
                                        @else
                                            <option value="{{$kel->id}}">{{$kel->name}}</option>
                                        @endif
                                    @endforeach
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
function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

async function demo() {
  await sleep(4000);
  $("#provinsi").val({{$prov}});
  $("#city").prop('disabled', false); //disable
  $("#kecamatan").prop('disabled', false); //disable
  $("#kelurahan").prop('disabled', false); //disable

  if($('#provinsi').val()!='{{$prov}}'){
      console.log("belum");
  }else{
    console.log("sama");
  }
  
//   // Sleep in loop
//   for (let i = 0; i < 5; i++) {
//     if (i === 3)
//       await sleep(2000);
    
//   }
}

demo();
</script>
@endsection