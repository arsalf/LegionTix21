@extends('app.admin.layout.master')

@section('title')
    : My Profile
@endsection

@section('custom_css')
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script src="http://api.iksgroup.co.id/apijs/lokasiapi.js"></script>
<script>
var render=createwidgetlokasi("provinsi","kabupaten","kecamatan","kelurahan");
</script>
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
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQF2psCzfbB611rnUhxgMi-lc2oB78ykqDGYb4v83xQ1pAbhPiB&usqp=CAU"><span class="font-weight-bold">Amelly</span><span class="text-black-50">amelly12@bbb.com</span><span> </span></div>
            </div>
            <div class="col-md-8 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">First Name</label>
                            <input type="text" class="form-control" placeholder="First Name" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Last Name</label>
                            <input type="text" class="form-control" value="" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Phone Number</label>
                            <input type="text" class="form-control" placeholder="Phone Number" value="">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Date Birth</label>    
                            <input class="form-control" type="date" id="birthday" name="birthday">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="labels">Rt</label>
                            <input type="text" class="form-control" placeholder="Rt" value="">
                        </div>
                        <div class="col-md-4">
                            <label class="labels">Rw</label>
                            <input type="text" class="form-control" value="" placeholder="Rw">
                        </div>
                        <div class="col-md-4">
                            <label class="labels">Kelurahan</label>
                            <input type="text" class="form-control" value="" placeholder="Kelurahan">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Kecamatan</label>
                            <input type="text" class="form-control" placeholder="Kecamatan" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Kode Pos</label>
                            <input type="text" class="form-control" value="" placeholder="Kode Pos">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">City</label>
                            <input type="text" class="form-control" placeholder="City" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Province</label>
                            <select id="provinsi" class="form-control">
                                <option></option>
                            </select>
                            <select id="kabupaten" class="form-control">
                                <option></option>
                            </select>
                            <select id="kecamatan" class="form-control">
                                <option></option>
                            </select>
                            <select id="kelurahan" class="form-control">
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection


@section('custom_js')


<script>
    $(document).ready(function(){
                $("#show").click(function(){
                    $("#output").html(trackdatalokasi);
                });            
            });   
</script>
@endsection