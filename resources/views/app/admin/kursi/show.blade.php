@extends('app.admin.layout.master')

@section('title')
    : Role Table
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
<div class="container">
    {{Breadcrumbs::render('studio', 'Studio Name')}}
    <h2 class="text-center">{{$table_name}} TABLE</h2>
    @if (session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="container">
      <div class="row">
        <div class="col-sm-9">
          <div class="d-flex justify-content-center">
            <div class="wrapper">
                @php
                    $temp = 'A';
                @endphp
              <div class="layout-sheet active-sheet">
                <div class="screen"><p class="text-center">LAYAR</p></div>
                  <div class="r_ow">
                @foreach ($data as $item)
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
        </div>
        <div class="col-sm-3">
          <form action="{{route('kursi.update', $id)}}" method="POST">
            <div class="setting-kursi">
            </div>
            @csrf
            @method('PUT')
            <button id="submit" type="submit" style="display:none" class="mt-3 btn btn-primary">Update</button>
          </form>  
          <form action="{{route('kursi.destroy', $id)}}" method="POST">
            @csrf
            <div class="setting-kursi-del">
            </div>
            @method('DELETE')
            <button id="delete" type="submit" style="display:none" class="mt-3 btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
    </div>    
</div>
@endsection

@section('custom_js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{asset('/js/admin/cinemas.js')}}"></script>
@endsection