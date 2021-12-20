@extends('app.home.layout.layout')

@section('title')
    Legion Tix
@endsection

@section('content')
<div class="container mt-5 mb-5" style="min-height: 500px">
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
@endsection
