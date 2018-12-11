@extends('layouts.admin-layout')

@section('content')
<form action="{{ route('admin/create') }}" method="post" class="form-horizontal">
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
                <label class="col-lg-3 control-label">Name:</label>
                <div class="col-lg-9">
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-9">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">No Telepon:</label>
                <div class="col-lg-9">
                    <input type="text" name="no_tlp" class="form-control" placeholder="No Telepon">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Password:</label>
                <div class="col-lg-9">
                    <input type="password" name="password" class="form-control" placeholder="Your strong password">
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </div>
    </div>
</form>
@endsection