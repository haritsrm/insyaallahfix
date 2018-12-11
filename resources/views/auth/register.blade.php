@extends('layouts.login')

@section('content')
<!-- Registration form -->
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel registration-form">
                <div class="panel-body">
                    <div class="text-center">
                        <div class="icon-object border-success text-success"><img src="/assets/images/logo_light.png" width=100></div>
                        <h5 class="content-group-lg">Create account <small class="display-block">All fields are required</small></h5>
                    </div>

                    <div class="form-group has-feedback">
                        <input id="name" type="text" placeholder="Nama Anda" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback">
                    <input id="email" type="email" placeholder="Email Anda" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback">
                    <input id="alamat" type="alamat" placeholder="Alamat" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" value="{{ old('alamat') }}" required>

                        @if ($errors->has('alamat'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback">
                    <input id="no_tlp" type="number" placeholder="Nomor Handphone" class="form-control{{ $errors->has('no_tlp') ? ' is-invalid' : '' }}" name="no_tlp" value="{{ old('no_tlp') }}" required>

                        @if ($errors->has('no_tlp'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('no_tlp') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback">
                    <input id="instansi" type="text" placeholder="Asal Instansi" class="form-control{{ $errors->has('instansi') ? ' is-invalid' : '' }}" name="instansi" value="{{ old('instansi') }}" required>

                        @if ($errors->has('instansi'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('instansi') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback">
                    <input id="jabatan" type="text" placeholder="Jabatan di Instansi" class="form-control{{ $errors->has('jabatan') ? ' is-invalid' : '' }}" name="jabatan" value="{{ old('jabatan') }}" required>

                        @if ($errors->has('jabatan'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('jabatan') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback">
                    <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback">
                    <input id="password-confirm" type="password" placeholder="Password Confirmation" class="form-control" name="password_confirmation" required>
                    </div>

                    <div class="text-right">
                        <a href="/login"><button type="submit" class="btn btn-link"><i class="icon-arrow-left13 position-left"></i> Back to login form</button></a>
                        <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Create account</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- /registration form -->
@endsection
