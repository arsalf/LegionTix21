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
    .detail-ticket{
        height: 300px;
    }
    tr.head>th {  
        background: white;
        position: sticky;
        top: 0;
    }
    tfoot {  
        background: white;
        position: sticky;
        bottom: 0;
    }
    </style>
@endsection

@section('content')
    <section class="p-5">
        <div class="container">    
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('status')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>                    
                </div>
            @endif    
            <div class="mb-3 bg-white row">
                <div class="col-md">
                    <legend class="m-0 text-center">                    
                    {{$showtime->title}} -o- {{$showtime->waktu}} -o- {{$showtime->bioskop_name}} -o- {{$showtime->studio_type}}
                    </legend>                    
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-8">
                    <div class="d-flex justify-content-center">
                        <div class="">
                            {{-- <img class="mb-5" id="bisa" src="{{ asset('home/img/layar.jpg')}}" alt="" style="height: 500px; width: 100%;"> --}}
                            <div class="wrapper">
                                @php
                                    $temp = 'A';
                                @endphp
                                <div class="layout-sheet active-sheet">
                                    <div class="screen"><p class="text-center text-white">LAYAR</p></div>
                                        {{-- <form action="{{route('kursis.store')}}" method="post"> --}}
                                            <div class="r_ow">
                                                @foreach ($dataKursi as $item)
                                                    @php       
                                                        $str = '';       
                                                        $val = '';      
                                                        if($item->k_row!=$temp){
                                                            $str = $str.'</div>
                                                                    <div class="r_ow">';                        
                                                        }
                                                        $str = $str.'<div name="kursi" class="'.strtolower($item->type_name)."-seat ";
         
                                                        if ($item->status == 'SUCCESS') {
                                                            $str = $str.'occupied bg-danger';
                                                        }else if($item->status){
                                                            $str = $str.'occupied';   
                                                        }else{
                                                            $str = $str.'selected';  
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
                    </div>                        
                </div>
                <div class="mb-3 bg-white col-md-4">
                    <div class="checkout">
                        <h2>Tiket Anda</h2>                                                                        
                        <legend>mohon selesaikan dalam 2 menit!</legend>
                        <div class="mb-3 table-responsive table-sm detail-ticket">                            
                            <input type="hidden" name="showtime_id" id="showtime_id" value="{{$id}}">
                            <table class="table">
                                <thead>
                                  <tr class="head">
                                    <th>#id</th>                                    
                                    <th>Kursi</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody id="pesanan-tiket">
                                    <?php
                                    $total = 0;
                                    ?>
                                    @foreach($pesanan as $pes)
                                        <tr id="{{$pes->id}}">
                                            <td>{{$pes->id}}</td>
                                            <td>{{$pes->kursi}}</td>                                             
                                            <td>{{$pes->harga}}</td>   
                                            <?php
                                                $total = $total + $pes->harga;
                                            ?>                                          
                                            <td>
                                                <form action="{{route('kursis.destroy', $pes->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach                                    
                                </tbody>
                                <tfoot>
                                    <tr class="foot">
                                        <th class="text-center" colspan="2">Total Harga</th>
                                        <th colspan="2">Rp. <span id="rp">{{$total}}</span></th>
                                    </tr>
                                    <tr class="foot">
                                        <th class="text-center" colspan="2">Saldo Dompet</th>                                        
                                        <th colspan="2">Rp. <span id="saldo">{{$dompet->balance}}</span></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="mb-3 checkout d-flex justify-content-center">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#konfirmasi">Bayar</button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="konfirmasiCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="konfirmasiLongTitle">Konfirmasi Pembayaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin akan membeli <strong>semua</strong> tersebut ?
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                    <form action="{{route('tiket.store')}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Iyah</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
function takeData(tag, url, arr) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    arr = arr.split("-");
    var row = arr[0];
    var seat = arr[1];
    var formData =
        {
            'id' : $('#showtime_id').val(),
            'kursi_baris' : row,
            'kursi_kolom' :seat
        }
    ;
    var type = "POST";
    var ajaxurl = url;
    $.ajax({
        type: type,
        url: ajaxurl,
        data: formData,
        dataType: 'json',
        success: function(data) {
            console.log(data);     
            var form = '<td><form action="http://127.0.0.1:8000/app/kursis/'+data.id+'" method="POST">';
            var button = '<input type="hidden" name="_token" value="'+$('meta[name="csrf-token"]').attr('content')+'"><input type="hidden" name="_method" value="DELETE"><button type="submit" class="btn btn-sm btn-danger">Delete</button></form></td>';
            $(tag).append(
                '<tr><td>'+data.id+'</td><td>'+data.kursi+'</td><td>'+data.harga+'</td>'+form+button+'</tr>'
            );
            var total = parseInt($('#rp').text())+parseInt(data.harga);            
            $('#rp').text(total);        
        },
        error: function(data) {
            alert(data.statusText);        
            console.log(data);
        }
    });
}
$(document).ready(function() {
    $('.layout-sheet').addClass('active-sheet');
    const container = document.querySelector('.wrapper');
    container.addEventListener('click', (e) => {
        //console.log(e.target);
        if ((e.target.classList.contains('single-seat') && !e.target.classList.contains('occupied')) ||
            (e.target.classList.contains('double-seat') && !e.target.classList.contains('occupied'))){
            console.log(e.target.getAttribute("data-value"));
            var arr = e.target.getAttribute("data-value");
            takeData('#pesanan-tiket', '{{route('kursis.store')}}', arr);
            e.target.classList.toggle('occupied');
        }      
    });
});
</script>
@endsection