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
    {{Breadcrumbs::render('category', ucfirst(strtolower($table_name)))}}
    <h2 class="text-center">{{$table_name}} TABLE</h2>
    @if (session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="container">
      <div class="row mb-3">
        <form action="{{route('kursi.tampil')}}" method="post">
            @csrf
            <div class="col">
                <select id="studio" name="studio" class="form-select" aria-label="Default select example">
                    <option selected>---- Select studio ----</option>
                    @foreach($data as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach          
                </select>
            </div>
            <div class="col mt-3">
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">select</button>
                </div>                
            </div>              
        </form>        
      </div>
      {{-- <div class="row">
        <div class="d-flex justify-content-center">
            <div class="wrapper">
                <div class="layout-sheet">
                    <div class="screen"></div>
                    <div id='layout'></div>            
                </div>
            </div>
        </div>        
      </div> --}}
    </div>    
</div>
@endsection

@section('custom_js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
{{-- <script>
    $('#studio').on('change', function(){                
        var id = $(this).val();
        $.ajax({
            type: 'GET',
            url: '/api/kursi/'+id,
            data: [],
            dataType: 'json',
            success: function(data) {
                console.log(data);    
                var temp = data[0].k_row;                
                var str = `<div id="`+data[0].k_row+`" class="r_ow">`;

                for (let index = 0; index < data.length; index++) {
                    if(data[index].k_row!=temp){
                        str = str + `</div><div id="`+data[index].k_row+`" class="r_ow">`;
                        if(data[index].jumlah==2){
                            str = str + `<div class="double-seat selected">`+data[index].k_row+data[index].k_seat+`</div>`;                            
                        }else{
                            str = str + `<div class="seat selected">`+data[index].k_row+data[index].k_seat+`</div>`;                            
                        }                                                                                
                    }else{
                        if(data[index].jumlah==2){
                            str = str + `<div class="double-seat selected">`+data[index].k_row+data[index].k_seat+`</div>`;                            
                        }else{
                            str = str + `<div class="seat selected">`+data[index].k_row+data[index].k_seat+`</div>`;                            
                        }
                    }
                    temp = data[index].k_row;
                }
                $('#layout').html(str);
                $('.layout-sheet').addClass('active-sheet');
            },
            error: function(data) {
                // alert(data.statusText);
                // // $('#demo').html(data);
                console.log(data);
            }
        });
    });
</script> --}}
@endsection