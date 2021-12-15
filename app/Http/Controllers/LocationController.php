<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    //
    public function getFromLocation(){
        return '<div class="row mt-3">
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
                <div class="row mt-3">
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
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Nama Jalan/Daerah/Blok Rumah</label>
                        <input type="text" class="form-control" placeholder="Nama Jalan/Daerah/Blok/Rumah" name="address" value="">
                    </div>
                </div>';
    }
}