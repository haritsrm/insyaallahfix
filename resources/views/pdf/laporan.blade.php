<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PDF</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body style="font-family:Arial, Helvetica, sans-serif">
    <div class="header">
        <div style="float:left;margin-right:10px">
            <img src="assets/images/side.png" alt="" style="margin-top:-22px">
        </div>
        <img src="assets/images/logo_light.png" width=100 style="float:left">
        <h1 align="left" >PTIPD</h1>
        <h4 align="left" style="margin-top:-20px">PUSAT TEKNOLOGI INFORMASI DAN PANGKALAN DATA</h4>
    </div>
    <hr>
    <br>
    <h3 align="center">LAPORAN PEMINJAMAN BARANG DAN RUANGAN PTIPD</h3>
    <p>Bulan/Tahun      : {{ Request::input('month') }}/{{ Request::input('year') }} </p>
    <table border=1>
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
        {{! $val = \App\Acc::whereMonth('created_at','=',Request::input('month'))->whereYear('created_at','=',Request::input('year'))->latest('created_at')->get() }}
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

</body>
</html>