@extends('app.home.layout.layout')

@section('title')
    Detail Film
@endsection

@section('custom_css')
<style>
    #selecthari{
        display: block!important;
    }
    .nice-select{
        display: none;
    }
    h1, h2, h3, h4, h5, h6 {
    margin: 0;
    color: #ffffff;
    font-weight: 400;
    font-family: "Mulish", sans-serif;
}
</style>
@endsection

@section('content')
    <!-- Login Section Begin -->
    <section class="p-5">
        <div class="container">
            <div class="text-white">                    
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">TANGGAL : </label>
                            <select class="form-control" id="selecthari">
                              <option>SENIN</option>
                              <option>SELASA</option>
                              <option>RABU</option>
                              <option>KAMIS</option>
                              <option>JUMAT</option>
                            </select>
                        </div>
                    </div>
                </div>  
                <div class="row text-white">
                    <div class="col">
                        <?php
                            $bioskop_temp = '';
                            $studio_temp = '';
                            $bioskop = '';
                            $studio = '';
                            $showtime='';
                            $str = '';
                        ?>
                        @foreach($cinemas as $cinema)
                            <?php                            
                                if($bioskop!=$cinema->bioskop_name){
                                    $bioskop = $cinema->bioskop_name;
                                    $str = $str.$bioskop_temp.'<div class="box">
                                                    <div class="bioskop-name">
                                                        <h3>'.$bioskop.'</h3>
                                                    </div>';                                                  
                                    $bioskop_temp = '</div>';
                                }          
                                if($studio!=$cinema->studio_type){     
                                    $studio = $cinema->studio_type;
                                    $str = $str.$studio_temp.'<div class="row">
                                                    <div class="col-sm-4">
                                                        <h4>'.$studio.'</h4>
                                                    </div>
                                                    <div class="col-sm-8">';
                                    $studio_temp = '</div></div>';
                                }
                                $showtime ='<button class="btn btn-primary m-2">'.(date('H:i', strtotime($cinema->waktu))).'</button>';
                                $str = $str.$showtime;
                            ?>  
                        @endforeach
                                </div>
                            </div>                            
                        </div>  
                        <?php
                            $str = $str.'
                                        </div>
                                    </div>                            
                                </div>  
                            ';
                            echo $str;
                        ?>
                        {{-- <div class="box">
                            <div class="bioskop-name">
                                <h3>JATOS XXI</h3>
                            </div>
                            <div class="row">                                                        
                                <div class="col-sm-4">
                                    <h4>regular</h4>
                                </div>
                                <div class="col-sm-8">
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                </div>
                            </div>                                                
                            <div class="row">                                                        
                                <div class="col-sm-4">
                                    <h4>FAMILY</h4>
                                </div>
                                <div class="col-sm-8">
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                </div>
                            </div>                                                
                        </div>
                        <div class="box">
                            <h3>KINGS CGV</h3>
                            <div class="row">                                                        
                                <div class="col-sm-4">
                                    <h4>3D</h4>
                                </div>
                                <div class="col-sm-8">
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                </div>
                            </div>                                                
                        </div>
                        <div class="box">
                            <h3>PVJ XXI</h3>
                            <div class="row">                                                        
                                <div class="col-sm-4">
                                    <h4>3D</h4>
                                </div>
                                <div class="col-sm-8">
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                    <button class="btn btn-primary m-2">12:30</button>
                                </div>
                            </div>                                                
                        </div> --}}
                    </div>
                </div>               
            </div>
        </div>
    </section>
        <!-- Login Section End -->
@endsection