<!-- /.tab-pane -->

<div class="tab-pane" id="settings">
  <form class="form-horizontal"  action="{{ route('user.profile.update',$user->id) }}" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="form-group">
      <label for="first_name" class="col-sm-2 control-label">Nama Depan</label>

      <div class="col-sm-10">
        <input id="first_name" name="first_name" type="text" class="form-control" value="{{ $user->first_name }}" placeholder="first name">

        @if ($errors->has('first_name'))
            <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="last_name" class="col-sm-2 control-label">Nama Belakang</label>

      <div class="col-sm-10">
       <input id="last_name" name="last_name" type="text" class="form-control" value="{{ $user->last_name }}" placeholder="first name">

        @if ($errors->has('last_name'))
            <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="grade" class="col-sm-2 control-label">Grade</label>

      <div class="col-sm-10">
       <select name="user_grade_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @foreach($userGrade as $grade)
                          <option value="{{ $grade->id }}">{{$grade->grade_level}} - {{ $grade->grade }}</option>
                        @endforeach
                    </select>

        @if ($errors->has('grade'))
            <span class="help-block">
                <strong>{{ $errors->first('grade') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="NPP" class="col-sm-2 control-label">NPP</label>

      <div class="col-sm-10">
       <input id="NPP" name="NPP" type="text" class="form-control" value="{{ $user->NPP }}" placeholder="NPP">

        @if ($errors->has('NPP'))
            <span class="help-block">
                <strong>{{ $errors->first('NPP') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="join_year" class="col-sm-2 control-label">Tahun</label>

      <div class="col-sm-10">
       <input id="join_year" name="join_year" type="text" class="form-control" value="{{ date_format($user->join_year,'d/m/Y') }}" placeholder="join_year">

        @if ($errors->has('join_year'))
            <span class="help-block">
                <strong>{{ $errors->first('join_year') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="email" class="col-sm-2 control-label">Email</label>

      <div class="col-sm-10">
       <input id="email" name="email" type="text" class="form-control" value="{{ $user->email }}" placeholder="email">

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="phone" class="col-sm-2 control-label">Phone</label>

      <div class="col-sm-10">
       <input id="phone" name="phone" type="text" class="form-control" value="{{ $user->phone }}" placeholder="phone">

        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('gender_id') ? ' has-error' : '' }}">
                <label for="gender_id" class="col-sm-2 control-label">Jenis Kelamin</label>

                <div class="col-sm-10">

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
              </div>

              <div class="form-group{{ $errors->has('married_status_id') ? ' has-error' : '' }}">
                <label for="married_status_id" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-10">

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
              </div>

    @if(Auth::id() == $user->id or Auth::user()->role->name === 'Administrator')
    <div class="form-group">
      <label for="password" class="col-sm-2 control-label">password</label>

      <div class="col-sm-10">
       <input id="password" name="password" type="password" class="form-control" placeholder="password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
      
    </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-danger">Update</button>
        </div>
      </div>
    @endif

  </form>
</div>
<!-- /.tab-pane -->