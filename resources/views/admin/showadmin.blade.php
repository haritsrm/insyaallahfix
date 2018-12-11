@extends('layouts.admin-layout')

@section('content')
<div class="panel panel-flat">
<h4 class="container">Data Admin</h4>
<table class="table datatable-basic">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Instansi</th>
            <th>Jabatan</th>
            <th>Status</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($val as $v)
        @if($v->super == 0 && $v->suspend == 0)
        <tr>
            <td>{{ $v->name }}</td>
            <td>{{ $v->email }}</td>
            <td>{{ $v->alamat }}</td>
            <td>{{ $v->no_tlp }}</td>
            <td>{{ $v->instansi }}</td>
            <td>{{ $v->jabatan }}</td>
            <td><span class="label label-success">Active</span></td>
            <td>
                <center><button onclick="suspendAdmin({{ $v->id }})" class="btn btn-xs btn-danger">Suspend account</button></center>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
</div>

<div class="panel panel-flat">
<h4 class="container">Data Admin Ter-suspend</h4>
<table class="table datatable-basic">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Instansi</th>
            <th>Jabatan</th>
            <th>Status</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($val as $v)
        @if($v->super == 0 && $v->suspend == 1)
        <tr>
            <td>{{ $v->name }}</td>
            <td>{{ $v->email }}</td>
            <td>{{ $v->alamat }}</td>
            <td>{{ $v->no_tlp }}</td>
            <td>{{ $v->instansi }}</td>
            <td>{{ $v->jabatan }}</td>
            <td><span class="label label-danger">Suspended</span></td>
            <td class="text-center">
                <form method="post" action="{{ route('admin/activate', $v->id) }}">
                    {{ csrf_field() }}
                    <center><input type="submit" class="btn btn-xs btn-success" data-toggle="tooltip" value="Activate Account"/></center>
                </form>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
</div>
<script>
function suspendAdmin(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        swal({
            title: "Yakin akan suspend?",
            text: "Akun ini akan disuspend!",
            icon: "warning",
            buttons: true,
            dangerMode: true
        }).then((value) => {
            if(value){
                return fetch("/admina/adminsus/"+id,{
                    method: "POST",
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
@endsection