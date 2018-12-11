@extends('layouts.admin-layout')

@section('content')
<div class="panel panel-flat">
<h4 class="container">Daftar Peminjaman</h4>
<table class="table datatable-basic">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Status</th>
            <th>Denda</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($val as $v)
            @if ($v->activate == 1)
            <tr>
                <td><a href="#" data-toggle="modal" data-target="#modal{{ $v->kode }}">{{ $v->kode }}</a></td>
                <td>
                    <span class="label label-success">Active</span>
                </td>
                <td>
                    {{! $tgl = App\Peminjaman::where('kode', $v->kode)->first()->tgl_kembali }}
                    @if ($tgl < $now)
                        {{! $x = $now->diffInDays($tgl) }}
                        {{! $denda = $x * 5000 }}
                        Rp {{ $denda }}
                    @else
                        Rp 0
                    @endif
                </td>
                <td>
                    <form action="/admina/kembali/{{ $v->id }}" method="post" class="col-md-2">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-success"><i class="icon-checkmark3"></i> OK!</button>
                    </form>
                </td>
            </tr>
            <div id="modal{{ $v->kode }}" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="modal-title">Detail Peminjaman</h5>
                        </div>
                        {{! $x = App\Peminjaman::where('kode', $v->kode)->first() }}
                        <div class="form-horizontal">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Nama Peminjam:</label>
                                    <div class="col-lg-9">
                                        <label class="control-label">{{ App\User::find($x->user_id)->name }}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Tanggal Pinjam:</label>
                                    <div class="col-lg-9">
                                        <input type="date" value="{{ $x->tgl_pinjam }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Tanggal Kembali:</label>
                                    <div class="col-lg-9">
                                        <input type="date" value="{{ $x->tgl_kembali }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Barang:</label>
                                    <div class="col-lg-9">
                                        <div class="row">
                                        {{! $barang = App\Peminjaman::where('kode', $v->kode)->get() }}
                                        @foreach($barang as $b)
                                            <div class="col-lg-5 col-md-6">
                                                <div class="panel panel-body">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="/uploads/{{ App\Barang::find($b->barang_id)->pict }}" data-popup="lightbox">
                                                                <img src="/uploads/{{ App\Barang::find($b->barang_id)->pict }}" class="img-circle img-lg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <h6 class="media-heading">{{ App\Barang::find($b->barang_id)->name }}</h6>
                                                            <span class="text-muted">{{ $b->jumlah }} Buah</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </tbody>
</table>
</div>
@endsection