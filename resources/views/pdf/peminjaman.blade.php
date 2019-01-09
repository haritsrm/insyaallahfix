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
    <div class="header">
        <div style="float:left;margin-right:10px">
            <img src="assets/images/side.png" alt="" style="margin-top:-22px">
        </div>
        <img src="assets/images/logo_light.png" width=100 style="float:left">
        <h1 align="left" >PTIPD</h1>
        <h4 align="left" style="margin-top:-20px">PUSAT TEKNOLOGI INFORMASI DAN PANGKALAN DATA</h4>
    </div>
    <br>
    <br>
    <h2 align="center"><strong>Form Peminjaman Barang dan Ruangan</strong></h2>
    <br>
    <i>(Isikan data berikut dengan lengkap dan jelas!)</i>
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ Auth::user()->name }}</td>
        </tr>
          <tr>
            <td>Fakultas/Jabatan</td>
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
            <td valign="top">Pinjaman</td>
            <td valign="top">:</td>
            {{! $barang = App\Peminjaman::all()->where('kode', $data->kode) }}
            <td>
                <div style="border:1px solid black;width:200%">
                    @foreach($barang as $b)
                    <p style="margin:10px">{{ App\Barang::find($b->barang_id)->name }} sebanyak {{ $b->jumlah }} Buah</p>
                    @endforeach
                </div>
            </td>
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
    <br>
    <div style="position:absolute;margin-left:100px;margin-top:500px;font-size:10px">
        <table>
            <tr>
                <td width="100" align="right">Jalan A.H. Nasution No. 105, Gedung Lecture Hall Lantai 4</td>
                <td width="15"></td>
                <td width="150" style="background-color:green;border-radius:5px"><span style="color:white;padding:0px 20px">ptipd@uinsgd.ac.id | <span style="color:blue"> http://ptipd.uinsgd.ac.id </span> | +6282320333030</span></td>
            </tr>
        </table>
    </div>
</body>
</html>