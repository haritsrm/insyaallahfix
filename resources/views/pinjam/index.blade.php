@extends('layouts.layout')

@section('content')
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title bold">Verifikasi</h5>
    </div>
</div>
<form action="{{ route('pinjam') }}" method="post">
    <div class="container">
        <div class="row">
                @csrf
                    <!-- panel produk -->
                    <div class="panel panel-flat col-md-6">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><h6>Produk Dipesan</h6></th>
                                        <th class="text-muted">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($carts as $cart)
                                    {{! $product = \App\Barang::find($cart->id_barang) }}
                                    <tr>
                                        <td style="width: 600px">
                                            <div class="detail-cart">
                                                <img src="/uploads/{{ $product->pict }}" style="width: 50px; height: 50px">
                                                <p>{{ $product->name }} <!-- (<b>Ukuran : 210x100</b> ) (<b>warna : merah</b>) --></p>
                                                <div class="clear"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <p>{{ $cart->quantity }}</p>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end panel produk -->

                    <div class="col-md-1"></div>

                    <div class="panel panel-flat col-md-5">
                        <div class="table table-responsive">
                            <table class="table">
                                <thead>
                                    <th style="width:140px"><h6>Tanggal Pinjam</h6></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Nama Peminjam</td>
                                        <td>:</td>
                                        <td>{{ Auth::user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Pinjam</td>
                                        <td>:</td>
                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                <input class="form-control daterange-basic" type="date" name="tgl_pinjam" required>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Kembali</td>
                                        <td>:</td>
                                        <td>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-calendar22"></i></span>
                                                <input class="form-control daterange-basic" type="date" name="tgl_kembali" required>
                                            </div>
                                        </td>
                                    </tr>
                            </table>
                        </div>
                    </div>
        </div>
    </div>
    <div class="footer-cart">
        <div style="float: right;">
            <button type="submit">Pinjam Sekarang</button>
        </div>
        <div class="clear"></div>
    </div>

</form>

@endsection