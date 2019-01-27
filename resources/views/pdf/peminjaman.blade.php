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
    {{! $data = \App\Acc::find($id) }}
    <div class="header" style="width: 85%;margin:0px auto">
        <div style="float:left;margin-right:10px;">
            <img src="assets/images/side.png" alt="" width="70" height="70" style="margin-top:-2px">
        </div>
        <img src="assets/images/logo_light.png" width="60" height="60" style="float:left">
        
        <div style="margin-left: 10px;margin-top: -10px">    
            <h2 align="left">PTIPD</h2>
            <p align="left" style="margin-top:-20px; font-size: 0.8em">PUSAT TEKNOLOGI INFORMASI DAN PANGKALAN DATA</p>
        </div>    
    </div>

    <br>
    <br>
    <h2 align="center"><strong>Form Peminjaman Barang dan Ruangan</strong></h2>
    
    <div style="width: 80%; margin:0px auto;">
        <br>
        <i>(Isikan data berikut dengan lengkap dan jelas!)</i>
        <table>
            <tr>
                <td>Kode Peminjaman</td>
                <td>:</td>
                <td>{{\App\Peminjaman::where('kode', $data->kode)->first()->kode}}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td style="text-transform: capitalize;">{{ Auth::user()->name }}</td>
            </tr>
              <tr>
                <td>Fakultas/Jabatan</td>
                <td>:</td>
                <td style="text-transform: capitalize;">{{ \App\User::find(Auth::user()->id)->jabatan }}</td>
            </tr>
              <tr>
                <td>Kontak</td>
                <td>:</td>
                <td>{{ \App\User::find(Auth::user()->id)->no_tlp }}</td>
            </tr>
            <tr>
                <td>Tanggal Pinjam</td>
                <td>:</td>
                <td>{{ date('d-m-Y', strtotime(\App\Peminjaman::where('kode', $data->kode)->first()->tgl_pinjam)) }}</td>
            </tr>
            <tr>
                <td>Tanggal Kembali</td>
                <td>:</td>
                <td>{{ date('d-m-Y', strtotime(\App\Peminjaman::where('kode', $data->kode)->first()->tgl_kembali)) }}</td>
            </tr>
            <tr>
                <td valign="top">Pinjaman</td>
                <td valign="top">:</td>
                {{! $barang = \App\Peminjaman::all()->where('kode', $data->kode) }}
                <td>
                    <div style="border:1px solid black;width:200%">
                        @foreach($barang as $b)
                        <p style="margin:10px">{{ \App\Barang::find($b->barang_id)->name }} sebanyak {{ $b->jumlah }} Buah</p>
                        @endforeach
                    </div>
                </td>
            </tr>
        </table>
        <p>Dengan ini menyatakan bahwa isian di atas diisi dengan sebenar-benarnya.</p>
    </div>
    
    <div style="width: 80%; margin: 0px auto">
        <div style="float:left; width: 35%;">
            <br>
            <br>
            <p>Staff PTIPD,</p>
            <br>
            <br>
            <br>
            <br>
            <hr style="margin-top: 18px">  
        </div>

        <div style="float:right; width: 35%;">
            <p>Bandung, {{ Carbon\Carbon::now('Asia/Jakarta')->format('d-m-Y') }}</p>
            <p>Pemohon,</p>
            <br>
            <br>
            <br>
            <p align="center" style="margin-bottom: -5px">{{ Auth::user()->name }}</p>   
            <hr> 
        </div>
    </div>     
    <br>   

    <div style="position: absolute; width: 80%; margin-top: 200px;margin-left: 75px;"> 
        <br>
        <i>(Kolom ini diisi oleh petugas)</i>
        <hr style="border:1px solid green;">
        <textarea class="form-control" style="height: 100px"></textarea>
    </div>
      
    <div style="position:fixed; bottom: 0px; left: 75px; font-size:10px;">
        <table>
            <tr>
                <td width="100" align="right">Jalan A.H. Nasution No. 105, Gedung<br> Lecture Hall Lantai 4</td>
                <td width="15"></td>
                <td style="background-color:green;border-radius:5px; width: 200px"><span style="color:white;padding:0px 20px">ptipd@uinsgd.ac.id | <span style="color:blue"> http://ptipd.uinsgd.ac.id </span>|<span style="width: 130px"> +6282320333030</span></td>
            </tr>
        </table>
    </div>
</body>
</html>