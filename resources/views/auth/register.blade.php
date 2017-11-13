@extends('layouts.auth_master')

@section('cssPlugins')
<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datepicker/datepicker3.css') }}">
@endsection

@section('jsPlugins')

<script>
  $('#datepicker').datepicker({
    format: 'dd/mm/yyyy'
  });
</script>
@endsection

@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="/"><img src="{{ asset("AdminLTE/dist/img/BNI.png") }}" width="250px"></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
      <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
        <input id="first_name" name="first_name" type="text" class="form-control" value="{{ old('first_name') }}" placeholder="first name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

        @if ($errors->has('first_name'))
            <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
        <input id="last_name" name="last_name" type="text" class="form-control" value="{{ old('last_name') }}" placeholder="last name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

        @if ($errors->has('last_name'))
            <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('user_grade_id') ? ' has-error' : '' }}">
        <select name="user_grade_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
        @foreach($userGrade as $grade)
          <option value="{{ $grade->id }}">{{$grade->grade_level}} - {{ $grade->grade }}</option>
        @endforeach
                    </select>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

        @if ($errors->has('user_grade_id'))
            <span class="help-block">
                <strong>{{ $errors->first('user_grade_id') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('NPP') ? ' has-error' : '' }}">
        <input id="NPP" name="NPP" type="text" class="form-control" value="{{ old('NPP') }}" placeholder="NPP">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

        @if ($errors->has('NPP'))
            <span class="help-block">
                <strong>{{ $errors->first('NPP') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('join_year') ? ' has-error' : '' }} ">
        <input id="datepicker" name="join_year" type="text" class="form-control" value="{{ old('join_year') }}" placeholder="Masa tahun">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

        @if ($errors->has('join_year'))
            <span class="help-block">
                <strong>{{ $errors->first('join_year') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <input id="phone" name="phone" type="text" class="form-control" value="{{ old('phone') }}" placeholder="phone">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group{{ $errors->has('gender_id') ? ' has-error' : '' }}">

          <select class="form-control" name="gender_id" id="gender_id">
            <option value="1">Laki-Laki</option>  
            <option value="2">Perempuan</option>
          </select>

          @if ($errors->has('gender_id'))
              <span class="help-block">
                  <strong>{{ $errors->first('gender_id') }}</strong>
              </span>
          @endif
      </div>

      <div class="form-group{{ $errors->has('married_status_id') ? ' has-error' : '' }}">

          <select class="form-control" name="married_status_id" id="married_status_id">
            <option value="1">Lajang</option>  
            <option value="2">Menikah</option>
          </select>

          @if ($errors->has('married_status_id'))
              <span class="help-block">
                  <strong>{{ $errors->first('married_status_id') }}</strong>
              </span>
          @endif
      </div>

      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" name="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group has-feedback">
       <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Retype Password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
@endsection