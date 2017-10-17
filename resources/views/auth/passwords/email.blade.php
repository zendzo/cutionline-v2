@extends('layouts.auth_master')

@section('content')
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="/"><b>CUTI</b>Online</a>
  </div>

    <div class="help-block text-center">
          @if ($errors->has('email'))
                <span class="help-block">
                    <strong style="color: #dd4b39">{{ $errors->first('email') }}</strong>
                </span>
            @endif
            @if (session('status'))
                <span class="help-block">
                     <strong style="color: #00733e">{{ session('status') }}</strong>
                </span>
            @endif
    </div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="{{ asset('AdminLTE//dist/img/user-avatar.png') }}" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}
      <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  placeholder="Email address">

        <div class="input-group-btn">
          <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your email to reset your pasword
  </div>
  <div class="text-center">
    <a href="{{ route('login') }}">Or sign in as a different user</a>
  </div>
</div>
@endsection
