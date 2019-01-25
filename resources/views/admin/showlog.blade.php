@extends('layouts.admin-layout')

@section('content')
<div class="panel panel-flat">
<h4 class="container">Log</h4>
<table class="table datatable-basic">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Pesan</th>
            <th>User</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($val as $v)
            <tr class="bg-{{ $v->status }}">
                <td>
                    <p>{{ $v->created_at }}</p>
                </td>
                <td>
                    <p>{{ $v->message }}</p>
                </td>
                <td>
                    <p>{{ $v->user }}</p>
                </td>
                <td><span class="label label-{{$v->status}}">{{ $v->status }}</span></td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection