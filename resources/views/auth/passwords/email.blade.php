@extends('layouts.login')

@section('content')
<!-- Password recovery -->
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="panel panel-body login-form">
        <div class="text-center">
            <div class="icon-object border-warning text-warning"><img src="/assets/images/logo_light.png" width=100></div>
            <h5 class="content-group">Password recovery <small class="display-block">We'll send you instructions in email</small></h5>
        </div>

        <div class="form-group has-feedback">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Your Email" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif            
            <div class="form-control-feedback">
                <i class="icon-mail5 text-muted"></i>
            </div>
        </div>

        <button type="submit" class="btn bg-blue btn-block">Reset password <i class="icon-arrow-right14 position-right"></i></button>
    </div>
</form>
<!-- /password recovery -->
@endsection
