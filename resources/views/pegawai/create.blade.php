@extends('layouts.master')

@section('cssPlugins')
<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datepicker/datepicker3.css') }}">
@endsection

@section('jsPlugins')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset('AdminLTE/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{ asset('AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<script src="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('AdminLTE/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>

<script>
  $('#datepicker').datepicker({
    format: 'dd/mm/yyyy'
  });
</script>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ $page_title }}</h3>
            </div>
            <!-- /.box-header --> 
          <div class="box-body">
            <form class="form-horizontal"  action="{{ route('admin.pegawai.store') }}" method="POST">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                <label for="first_name" class="col-sm-2 control-label">Nama Depan</label>

                <div class="col-sm-10">
                  <input id="first_name" name="first_name" type="text" class="form-control" placeholder="first name" value="{{ old('first_name') }}">

                  @if ($errors->has('first_name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('first_name') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label for="last_name" class="col-sm-2 control-label">Nama Belakang</label>

                <div class="col-sm-10">
                 <input id="last_name" name="last_name" type="text" class="form-control" placeholder="last name" value="{{ old('last_name') }}">

                  @if ($errors->has('last_name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('last_name') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('user_grade_id') ? ' has-error' : '' }}">
                <label for="user_grade_id" class="col-sm-2 control-label">user_grade_id</label>

                <div class="col-sm-10">
                 <select name="user_grade_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @foreach($userGrade as $grade)
                          <option value="{{ $grade->id }}">{{$grade->grade_level}} - {{ $grade->grade }}</option>
                        @endforeach
                    </select>

                  @if ($errors->has('user_grade_id'))
                      <span class="help-block">
                          <strong>{{ $errors->first('user_grade_id') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('NPP') ? ' has-error' : '' }}">
                <label for="NPP" class="col-sm-2 control-label">NPP</label>

                <div class="col-sm-10">
                 <input id="NPP" name="NPP" type="text" class="form-control" placeholder="NPP" value="{{ old('NPP') }}">

                  @if ($errors->has('NPP'))
                      <span class="help-block">
                          <strong>{{ $errors->first('NPP') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('join_year') ? ' has-error' : '' }}">
                <label for="join_year" class="col-sm-2 control-label">Tahun</label>

                <div class="col-sm-10">
                 <input id="datepicker" name="join_year" type="text" class="form-control" placeholder="mm/dd/yyyy" value="{{ old('join_year') }}">

                  @if ($errors->has('join_year'))
                      <span class="help-block">
                          <strong>{{ $errors->first('join_year') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                 <input id="email" name="email" type="text" class="form-control" placeholder="email" value="{{ old('email') }}">

                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone" class="col-sm-2 control-label">Phone</label>

                <div class="col-sm-10">
                 <input id="phone" name="phone" type="text" class="form-control" placeholder="phone" value="{{ old('phone') }}">

                  @if ($errors->has('phone'))
                      <span class="help-block">
                          <strong>{{ $errors->first('phone') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-sm-2 control-label">password</label>

                <div class="col-sm-10">
                 <input id="password" name="password" type="password" class="form-control" placeholder="password">

                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password-confirmation" class="col-sm-2 control-label">password</label>

                <div class="col-sm-10">
                 <input id="password-confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Retype password">

                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> Save</button>
                </div>
              </div>
            </form>
          </div>           
          </div>
          <!-- /.box -->
          <!-- form start -->

	</div>
</div>
@endsection