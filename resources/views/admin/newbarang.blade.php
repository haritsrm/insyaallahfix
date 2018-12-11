@extends('layouts.admin-layout')

@section('content')
<form action="{{ route('barang/create') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="panel panel-flat">
        <div class="panel-heading">
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <div class="form-group">
                <label class="col-lg-3 control-label">Nama:</label>
                <div class="col-lg-9">
                    <input type="text" name="name" class="form-control" placeholder="Nama">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Tipe:</label>
                <div class="col-lg-9">
                    <select class="select-search" name="type">
                        <option value="barang" {{{ (Request::is('admina/newbarang') ? 'selected=selected' : '') }}}>Barang</option>
                        <option value="ruangan" {{{ (Request::is('admina/newruangan') ? 'selected=selected' : '') }}}>Ruangan</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Foto:</label>
                <div class="col-lg-9">
                    <input type="file" name="pict">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Stok:</label>
                <div class="col-lg-9">
                    <input type="number" name="stock" class="form-control" min=1 value=1>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Keterangan:</label>
                <div class="col-lg-9">
                    <textarea name="description" class="form-control" placeholder="Keterangan"></textarea>
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </div>
    </div>
</form>
@endsection