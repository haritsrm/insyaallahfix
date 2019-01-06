@extends('layouts.admin-layout')

@section('content')
<div class="panel panel-flat">
<h4 class="container">{{{ (Request::is('admina/showbarang') ? 'Data Barang' : '') }}}</h4>
<h4 class="container">{{{ (Request::is('admina/showruangan') ? 'Data Ruangan' : '') }}}</h4>
<table class="table datatable-basic">
    <thead>
        <tr>
            <th width=10>Foto</th>
            <th width=50>Nama</th>
            <th width=50>Keterangan</th>
            <th width=10>Stok</th>
            <th width=20>Status</th>
            <th width=10>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($val as $v)
        @if (Route::is('admin/showbarang'))
        @if($v->type == 'barang')
        <tr>
            <td><img src="/uploads/{{ $v->pict }}" style="width:100px" /></td>
            <td>{{ $v->name }}</td>
            <td>{{ $v->description }}</td>
            <td>{{ $v->stock }}</td>
            <td>
            @if($v->pinjam == 1)
                <span class="label label-success">Dapat dipinjam</span>
            @else
                <span class="label label-warning">Tidak dapat dipinjam</span>
            @endif
            </td>
            <td class="text-center">
                <div class="form-group row">
                    <button class="btn btn-primary col-sm-4" data-toggle="modal" data-target="#modaledit{{ $v->id }}"><i class="icon-pencil"></i></button>
                    <button class="btn btn-danger col-sm-4" onclick="deleteBarang({{$v->id}})"><i class="icon-trash"></i></button>
                </div>
            </td>
        </tr>
        @endif
        @elseif (Route::is('admin/showruangan'))
        @if($v->type == 'ruangan')
        <tr>
            <td><img src="/uploads/{{ $v->pict }}" style="width:100px" /></td>
            <td>{{ $v->name }}</td>
            <td>{{ $v->description }}</td>
            <td>{{ $v->stock }}</td>
            <td>
            @if($v->pinjam == 1)
                <span class="label label-success">Dapat dipinjam</span>
            @else
                <span class="label label-warning">Tidak dapat dipinjam</span>
            @endif
            </td>
            <td class="text-center">
                <div class="form-group row">
                    <button class="btn btn-primary col-sm-4" data-toggle="modal" data-target="#modaledit{{ $v->id }}"><i class="icon-pencil"></i></button>
                    <button class="btn btn-danger col-sm-4" onclick="deleteBarang({{$v->id}})"><i class="icon-trash"></i></button>
                </div>
            </td>
        </tr>
        @endif
        @endif
        <div id="modaledit{{ $v->id }}" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Edit Data Barang</h5>
                    </div>

                    <form action="/admina/updatebarang/{{ $v->id }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Nama Barang:</label>
                                <div class="col-lg-9">
                                    <input type="text" name="name" class="form-control" placeholder="Nama Barang" value="{{ $v->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Tipe Barang:</label>
                                <div class="col-lg-9">
                                    <select class="select-search" name="type">
                                        <option value="barang" {{{ ($v->type==='barang' ? 'selected=selected' : '') }}}>Barang</option>
                                        <option value="ruangan" {{{ ($v->type==='ruangan' ? 'selected=selected' : '') }}}>Ruangan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Foto:</label>
                                <div class="col-lg-9">
                                    <input type="file" name="pict" value="{{ $v->pict }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Stok:</label>
                                <div class="col-lg-9">
                                    <input type="number" name="stock" class="form-control" min=1 value={{ $v->stock }}>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Keterangan:</label>
                                <div class="col-lg-9">
                                    <textarea name="description" class="form-control" placeholder="Keterangan">{{ $v->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label" style="margin-right:15px">Status:</label>
                                <label class="radio-inline">
                                    <input type="radio" name="pinjam" class="styled" {{{ ($v->pinjam===1 ? 'checked=checked' : '') }}} value="1">
                                    Dapat dipinjam
                                </label>

                                <label class="radio-inline">
                                    <input type="radio" name="pinjam" class="styled" {{{ ($v->pinjam===0 ? 'checked=checked' : '') }}} value="0">
                                    Tidak dapat dipinjam
                                </label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /vertical form modal -->
        @endforeach
    </tbody>
</table>

<script>
    function deleteBarang(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        swal({
            title: "Yakin akan menghapus?",
            text: "Tidak akan dapat mengembalikan lagi!",
            icon: "warning",
            buttons: true,
            dangerMode: true
        }).then((value) => {
            if(value){
                fetch("/admina/deletebarang/"+id,{
                    method: "DELETE",
                    headers: {
                        "X-CSRF-Token": $('input[name="_token"]').val()
                    }
                })
                .then(res => {
                    location.reload();
                })
                .catch(err => {
                    swal("Oops..", "Something went wrong", "error");
                })
            }
        })
    }
</script>

</div>
@endsection