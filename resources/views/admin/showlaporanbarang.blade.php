@extends('layouts.admin-layout')

@section('content')
<div class="panel panel-flat">
<h4 class="container">Laporan</h4>
<form action="{{ route('admin.laporanbarang') }}" class="row container" method="GET">
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
            <select id="year" class="select-search" name="year" required>
                <option value="2019">2019</option>
            </select>
        </div>
    </div>
    <input type="submit" class="btn btn-info" style="padding: 20px 10px" value="Lihat laporan">
    <input id="print" type="button" class="btn btn-success" style="padding: 20px 10px" value="Unduh laporan">
</form>
<table class="table datatable-basic">
    <thead>
        <tr>
            <th width=10></th>
            <th>Barang</th>
            <th>Deskripsi</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
    @foreach($val as $v)
        <tr>
            <td><img src="/uploads/{{ \App\Barang::find($v->barang_id)->pict }}" style="width:100px" /></td>
            <td>{{ \App\Barang::find($v->barang_id)->name }}</td>
            <td>{{ \App\Barang::find($v->barang_id)->description }}</td>
            <td>{{ $v->barang_count }}</td>
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
        fetch("/admina/printlaporanbarang",{
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