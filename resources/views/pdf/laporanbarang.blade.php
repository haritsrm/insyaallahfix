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
            width: 70%;
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
    <h3 align="center">LAPORAN BARANG DAN RUANGAN PTIPD</h3>
    <p>Bulan/Tahun      : {{ Request::input('month') }}/{{ Request::input('year') }} </p>
    <table>
        <thead>
            <tr>
                <th width=10>Gambar</th>
                <th>Barang</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
        {{! $val = DB::table('peminjamen')->select(DB::raw('count(*) as barang_count, barang_id'))->whereMonth('created_at','=',Request::input('month'))->whereYear('created_at','=',Request::input('year'))->groupBy('barang_id')->get() }}
        @foreach($val as $v)
            <tr>
                <td><img src="uploads/{{ \App\Barang::find($v->barang_id)->pict }}" style="width:100px" /></td>
                <td>{{ \App\Barang::find($v->barang_id)->name }}</td>
                <td>{{ \App\Barang::find($v->barang_id)->description }}</td>
                <td>{{ $v->barang_count }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</body>
</html>