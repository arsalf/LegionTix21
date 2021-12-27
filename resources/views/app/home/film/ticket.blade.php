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
        <div class="container" style="margin-bottom:200px">
            <div class="">                    
                <div class="row">
                    <div class="col bg-white">
                        <legend class="text-center">Day</legend>
                        <form action="" method="GET">
                            <div class="d-flex justify-content-center">
                                @foreach($days as $day)
                                <?php 
                                    date_default_timezone_set("Asia/Jakarta");
                                    if(isset($_GET['day'])){
                                        if($_GET['day']==$day->tanggal){
                                            echo '<button name="day" class="btn btn-sm btn-success m-2" value="'.$day->tanggal.'">'.$day->tanggal.'<br>'.$day->name.'</button>';
                                        }else{
                                            echo '<button name="day" class="btn btn-sm btn-primary m-2" value="'.$day->tanggal.'">'.$day->tanggal.'<br>'.$day->name.'</button>';
                                        }
                                    }else{
                                        if(strtolower($day->tanggal)==strtolower(date('d-M-Y'))){
                                            echo '<button name="day" class="btn btn-sm btn-success m-2" value="'.$day->tanggal.'">'.$day->tanggal.'<br>'.$day->name.'</button>';
                                        }else{
                                            echo '<button name="day" class="btn btn-sm btn-primary m-2" value="'.$day->tanggal.'">'.$day->tanggal.'<br>'.$day->name.'</button>';
                                        }
                                    }
                                ?>
                                @endforeach
                            </div>
                        </form> 
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
                                        $studio = '';
                                        $studio_temp = '';
                                        $str = $str.$bioskop_temp.'<div class="box my-4">
                                                        <div class="bioskop-name">
                                                            <h3>'.$bioskop.'</h3>
                                                        </div>';                                                  
                                        $bioskop_temp = '</div></div></div>';
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
                                    $showtime ='
                                    <a href="'.route('kursis.edit', $cinema->id).'" class="btn btn-primary m-2">'.(date('H:i', strtotime($cinema->waktu))).'</a>';
                                    $str = $str.$showtime;
                                ?>  
                            @endforeach
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