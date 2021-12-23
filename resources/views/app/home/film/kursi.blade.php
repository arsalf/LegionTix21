@extends('app.home.layout.layout')

@section('title')
    Detail Film
@endsection

@section('custom_css')
    <link rel="stylesheet" href="{{asset('cinema/style.css')}}" />
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

    <section class="p-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form method="POST" action="{{ route('tiket.store') }}">
                        @csrf
                        <div class="row">
                            <label for="exampleFormControlSelect1" class="mb-3 text-white col-sm-12 col-form-label">Kursi</label>
                        </div>
                        <div class="text-center form-group row ">
                            <div class="col-md-10">
                                <img class="mb-5 " src="{{ asset('home/img/layar.jpg')}}" alt="" style="height: 500px; width: 100%;">
                                <div class="wrapper">
                                    @php
                                        $temp = 'A';
                                    @endphp
                                    <div class="layout-sheet active-sheet">
                                        <div class="screen"><p class="text-center">LAYAR</p></div>
                                            <div class="r_ow">
                                            @foreach ($dataKursi as $item)
                                                @php       
                                                    $str = '';       
                                                    $val = '';      
                                                    if($item->k_row!=$temp){
                                                    $str = $str.'</div>
                                                            <div class="r_ow">';                        
                                                    }
                                                    $str = $str.'<div class="'.strtolower($item->type_name)."-seat ";
                                                // //check jumlah kursi            
                                                // if($item->jumlah==2){
                                                //     $str = $str.'"double-seat ';                          
                                                // }else{
                                                //     $str = $str.'"seat ';
                                                // }
                                                //check is active
                                                    if($item->isactive){
                                                    $str = $str.'selected';
                                                    }else{
                                                    $str = $str.'deleted';
                                                    }
                                                    $str = $str.'" data-value="'.$item->k_row.'-'.$item->k_seat.'-'.$item->jumlah.'-'.$item->isactive.'-'.$item->type_name.'">'.$item->k_row.$item->k_seat.'</div>';
                                                    $temp = $item->k_row;
                                                    echo $str;
                                                @endphp
                                            @endforeach
                                        </div>                
                                    </div>
                                </div>
                            </div>
                            <div class="text-left text-white col-md-2 d-flex flex-column">
                                <div class="my-3">
                                    <h4> <b> Bioskop </b> :</h4>
                                    <h5> {{$data->bioskop}} </h5>
                                    <input type="hidden" name="bioskop" value="{{$data->bioskop}}">
                                </div>
                                <div class="my-3">
                                    <h5> <b> Studio </b> : </h4>
                                    <h5> {{$data->studio}} </h5>
                                    <input type="hidden" name="studio" value="{{$data->studio}}">
                                </div>
                                <div class="my-3">
                                    <h5> <b> Jam Tayang </b> : </h4>
                                    <h5> {{$data->jamTayang}} </h5> 
                                    <input type="hidden" name="jamTayang" value="{{$data->jamTayang}}">
                                </div>
                                <div class="my-3">
                                    <h5> <b> Judul Film </b> : </h4>
                                    <h5> {{$film->title}} </h5> 
                                    <input type="hidden" name="film" value="{{$film->id}}">
                                </div>
                                <div class="my-3">
                                    <h5> <b> Kursi </b> : </h4>
                                    <h5 id="bookingKursi"> </h5> 
                                    <input type="hidden" name="bookingKursi" id="inputBookingKursi">
                                </div>
                                <div class="my-3">
                                    <h5> <b> Total Harga </b> : </h4>
                                    <h5 id="harga"> Rp 50.000,00 </h5> 
                                    <input type="hidden" name="harga" value="Rp 50.000,00">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="mt-5 btn btn-success" onclick="return confirm('Apakah data akan membeli Tiket {{$film->title}} ?')">Buy Ticket</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

@endsection

@section('js')
        <script src="{{asset('/js/admin/cinemas.js')}}"></script>
        <script>
            $("input[type='radio']").click(function(){
                var radioValue = $("input[name='kursi']:checked").val();
                $("#bookingKursi").text(radioValue);
                $("#inputBookingKursi").val(radioValue);
            });
        </script>
@endsection