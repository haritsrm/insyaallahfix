@extends('layouts.admin-layout')

@section('content')
<div class="panel panel-flat">
<h4 class="container">Laporan</h4>
<form action="{{ route('admin.laporan') }}" class="row container" method="GET">
    @csrf
    <div class="form-group col-md-3">
        <label class="control-label">Bulan:</label>
        <div>
            <select id="month" class="select-search" name="month" required>
                <option value="01" {{{ Request::input('month') == "01" ? "selected=selected" : "" }}}>Januari</option>
                <option value="02" {{{ Request::input('month') == "02" ? "selected=selected" : "" }}}>Februari</option>
                <option value="03" {{{ Request::input('month') == "03" ? "selected=selected" : "" }}}>Maret</option>
                <option value="04" {{{ Request::input('month') == "04" ? "selected=selected" : "" }}}>April</option>
                <option value="05" {{{ Request::input('month') == "05" ? "selected=selected" : "" }}}>Mei</option>
                <option value="06" {{{ Request::input('month') == "06" ? "selected=selected" : "" }}}>Juni</option>
                <option value="07" {{{ Request::input('month') == "07" ? "selected=selected" : "" }}}>Juli</option>
                <option value="08" {{{ Request::input('month') == "08" ? "selected=selected" : "" }}}>Agustus</option>
                <option value="09" {{{ Request::input('month') == "09" ? "selected=selected" : "" }}}>September</option>
                <option value="10" {{{ Request::input('month') == "10" ? "selected=selected" : "" }}}>Oktober</option>
                <option value="11" {{{ Request::input('month') == "11" ? "selected=selected" : "" }}}>November</option>
                <option value="12" {{{ Request::input('month') == "12" ? "selected=selected" : "" }}}>Desember</option>
            </select>
        </div>
    </div>

    <div class="form-group col-md-3">
        <label class="control-label">Tahun:</label>
        <div>
            <input type="number" name="year" id="year" required class="form-control">
        </div>
    </div>
    <input type="submit" class="btn btn-info" style="padding: 20px 10px" value="Lihat laporan">
    <input id="print" type="button" class="btn btn-success" style="padding: 20px 10px" value="Unduh laporan">
</form>
<table class="table datatable-basic">
    <thead>
        <tr>
            <th>Kode peminjaman</th>
            <th>Tgl peminjaman</th>
            <th>Peminjam</th>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Disetujui oleh</th>
            <th>Diterima oleh</th>
        </tr>
    </thead>
    <tbody>
    @foreach($val as $v)
    {{! $x = App\Peminjaman::where('kode', $v->kode)->first() }}
    {{! $barang = App\Peminjaman::where('kode', $v->kode)->get() }}
        <tr>
            <td>{{ $v->kode }}</td>
            <td>{{ date('d-m-Y', strtotime($x->tgl_pinjam)) }} s/d {{ date('d-m-Y', strtotime($x->tgl_kembali)) }}</td>
            <td>{{ App\User::find($x->user_id)->name }}</td>
            <td>
            @foreach($barang as $b)
                <p>{{ App\Barang::find($b->barang_id)->name }}</p>
            @endforeach
            </td>
            <td>
            @foreach($barang as $b)
                <p>{{ $b->jumlah }}</p>
            @endforeach
            </td>
            <td>
            @if($v->acc_by != null)
                {{ \App\Admin::find($v->acc_by)->name }}
            @endif
            </td>
            <td>
            @if($v->receive_by != null)
                {{ \App\Admin::find($v->receive_by)->name }}
            @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>

<script>
    $('#print').click(function(){
        var month = $('#month').val();
        var year = $('#year').val();

        var formData = new FormData();
        formData.append('month', month);
        formData.append('year', year);
        fetch("/admina/printlaporan",{
            method: "POST",
            redirect: 'follow',
            body: formData,
            headers: {
                "X-CSRF-Token": $('input[name="_token"]').val()
            }
        })
        .then(res => {
            console.log(res);
            window.location.href = res.url;
        })
        .catch(err => {
            console.log(err)
        })
    })
</script>
@endsection