@extends('layouts.layout_login_admin')

@section('content')
@if ($errors->has('suspend'))
    <div class="alert bg-warning alert-styled-left" style="width:400px;position:absolute">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
        <span class="text-semibold">Warning!</span> {{ $errors->first('suspend') }}
    </div>
@endif
<div style="margin-top: 100px">
	<!-- Advanced login -->
	<form action="/admin/login" method="post">
		@csrf
		<div class="login-form">
			<div class="text-center">	
				<img src="/assets/images/logo_demo.png" alt="" width="200px">	
				<h5 class="content-group-lg">Login to your account <small class="display-block">Enter your credentials</small></h5>
			</div>

			<div class="form-group has-feedback has-feedback-left">
				<input type="text" class="form-control input-lg" placeholder="Email" name="email" autofocus>
				<div class="form-control-feedback">
					<i class="icon-user text-muted"></i>
				</div>
			</div>

			<div class="form-group has-feedback has-feedback-left">
				<input type="password" class="form-control input-lg" placeholder="Password" name="password">
				<div class="form-control-feedback">
					<i class="icon-lock2 text-muted"></i>
				</div>
			</div>

			<div class="form-group">
				<button type="submit" class="btn bg-blue btn-block btn-lg">Login <i class="icon-arrow-right14 position-right"></i></button>
			</div>
		</div>
	</form>
	<!-- /advanced login -->
</div>
@endsection