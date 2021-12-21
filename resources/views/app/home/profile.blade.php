@extends('app.home.layout.layout')

@section('title')
    Legion Tix
@endsection

@section('content')

@if (\Session::has('status'))
    <div class="container mt-5" style="position: relative;">
        <div class="alert alert-success alert-dismissible fade show" role="alert" 
             style="
                    position: absolute;
                    right: 0;
                    left: 0;"
        >
            <strong>Kode Pembayaran :</strong>  {!! \Session::get('status') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif

<div class="container mt-5 mb-5" style="min-height: 500px">
    <section class="mb-2 text-white">
        @foreach ($dompet as $item)
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2"><b> Username </b></label>
            <div class="col-sm-10">
                <span>{{ Auth::user()->username }}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2"><b> Email </b></label>
            <div class="col-sm-10">
                <span>{{ Auth::user()->email }}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2"><b> Balance </b></label>
            <div class="col-sm-8">
                <span>Rp. {{ $item->balance }}</span>
            </div>
            <div class="col-sm-2">
                <button data-toggle="modal" data-target="#exampleModalCenter" style="cursor: pointer" class="btn btn-primary btn-block">
                    <span>Top Up</span>
                </button>
            </div>
        </div>
        @endforeach

    </section>
    <hr>
    <table class="table">
        <thead class="thead-light bg-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Pembayaran</th>
                <th scope="col">Nominal</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            <?php $i=0; ?>
            @foreach ($topup as $item)
                <?php $i++; ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td>{{ $item->kode_pembayaran }}</td>
                    <td>{{ $item->nominal}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Dompet Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('dompet.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2"><b> Balance </b></label>
                        <div class="col-sm-10">
                            @foreach ($dompet as $item)
                                <span>Rp. {{ $item->balance }}</span>     
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="formControlRange" class="col-sm-2">Top Up</label>
                        <div class="col-sm-7">
                            <input type="range" name="nominal" class="form-control-range" min="25000" max="500000" step="25000" id="formControlRange" onInput="$('#rangeval').html('Rp.'+$(this).val())">
                        </div>
                        <span class="col-sm-3" id="rangeval">Rp. 275000</span>
                        <input type="hidden" name="dompet_id" value="{{ Auth::user()->id }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Top Up!</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Header End -->
@endsection