<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PDF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body style="font-family:Arial, Helvetica, sans-serif">
    {{! $data = App\Acc::find($id) }}
    <img src="assets/images/logo_light.png" width=100 style="float:left">
    <h1 align="left" >PTIPD</h1>
    <h4 align="left" style="margin-top:-20px">PUSAT TEKNOLOGI INFORMASI DAN PANGKALAN DATA</h4>
    <hr>
    <br>
    <h2 align="center"><strong>Form Peminjaman Barang dan Ruangan</strong></h2>
    <br>
    <p>(Isikan data berikut dengan lengkap dan jelas!)</p>
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ Auth::user()->name }}</td>
        </tr>
          <tr>
            <td>Fakultas/ Bagian</td>
            <td>:</td>
            <td>{{ \App\User::find(Auth::user()->id)->jabatan }}</td>
        </tr>
          <tr>
            <td>Kontak</td>
            <td>:</td>
            <td>{{ \App\User::find(Auth::user()->id)->no_tlp }}</td>
        </tr>
        <tr>
            <td>Tanggal Pinjam</td>
            <td>:</td>
            <td>{{ date('d-m-Y', strtotime(App\Peminjaman::where('kode', $data->kode)->first()->tgl_pinjam)) }}</td>
        </tr>
        <tr>
            <td>Tanggal Kembali</td>
            <td>:</td>
            <td>{{ date('d-m-Y', strtotime(App\Peminjaman::where('kode', $data->kode)->first()->tgl_kembali)) }}</td>
        </tr>
        <tr>
            <td>Pinjaman</td>
            <td>:</td>
            {{! $barang = App\Peminjaman::all()->where('kode', $data->kode) }}
            @foreach($barang as $b)
            <tr>
                <td></td>
                <td></td>
                <td>{{ App\Barang::find($b->barang_id)->name }} sebanyak {{ $b->jumlah }} Buah</td>          
            </tr>
            @endforeach
        </tr>
    </table>
    <p>Dengan ini menyatakan bahwa isian di atas diisi dengan sebenar-benarnya.</p>
      <div style="float:left">
        <br>
        <br>
        <p>Staff PTIPD,</p>
        <br>
        <br>
        <br>
        <br>
        <hr width="200px">
        <p align="center"></p>    
    </div>
    <div style="float:right">
        <p align="center">Bandung, {{ Carbon\Carbon::now('Asia/Jakarta')->format('d-m-Y') }}</p>
        <p align="center">Pemohon,</p>
        <br>
        <br>
        <br>
        <br>
        <hr width="200px">
        <p align="center">{{ Auth::user()->name }}</p>    
    </div>
</body>
</html>