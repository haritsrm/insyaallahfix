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
<body>
    {{! $data = App\Acc::find($id) }}
    <img src="assets/images/logo_light.png" width=100 style="float:left">
    <h1 align="center">BUKTI PEMINJAMAN BARANG</h1>
    <h3 align="center">PTIPD UIN SUNAN GUNUNG DJATI</h3>
    <p align="center">Bandung</p>
    <hr>
    <br>
    <strong>Assalamualaikum Wr.Wb.</strong>
    <p>Dengan ini saya yang bernama dibawah ini menyetujui serta akan bertanggung jawab atas barang yang saya pinjam.</p>
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ Auth::user()->name }}</td>
        </tr>
        <tr>
            <td>Tanggal Pinjam</td>
            <td>:</td>
            <td>{{ App\Peminjaman::where('kode', $data->kode)->first()->tgl_pinjam }}</td>
        </tr>
        <tr>
            <td>Tanggal Kembali</td>
            <td>:</td>
            <td>{{ App\Peminjaman::where('kode', $data->kode)->first()->tgl_kembali }}</td>
        </tr>
        <tr>
            <td>Barang</td>
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
    <p>Demikian surat ini ditujukan.</p>
    <strong>Wassalamualaikum Wr. Wb</strong>
    <div style="margin-left:75%">
        <p align="center">Bandung, {{ Carbon\Carbon::now('Asia/Jakarta')->format('d-m-Y') }}</p>
        <br>
        <br>
        <br>
        <p align="center">{{ Auth::user()->name }}</p>    
    </div>
</body>
</html>