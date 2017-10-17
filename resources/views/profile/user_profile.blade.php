<!-- /.tab-pane -->

<div class="tab-pane" id="profile">
@if(!empty($user->profile))
  <form class="form-horizontal"  action="{{ route('user.about.update',$user->id) }}" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
@else
  <form class="form-horizontal"  action="{{ route('user.about.store') }}" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
@endif

    <div class="form-group">
      <label for="first_name" class="col-sm-2 control-label">Alamat</label>

      <div class="col-sm-10">
        @if(!empty($user->profile->alamat))
          <input id="alamat" name="alamat" type="text" class="form-control" value="{{ $user->profile->alamat }}" placeholder="Alamat">
        @else
          <input id="alamat" name="alamat" type="text" class="form-control" placeholder="Alamat">
        @endif

        @if ($errors->has('alamat'))
            <span class="help-block">
                <strong>{{ $errors->first('alamat') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="KCP" class="col-sm-2 control-label">KCP</label>

      <div class="col-sm-10">
       @if(!empty($user->profile->kcp))
         <input id="KCP" name="kcp" type="text" class="form-control" value="{{ $user->profile->kcp }}" placeholder="KCP">
       @else
        <input id="KCP" name="kcp" type="text" class="form-control" placeholder="KCP">
       @endif

        @if ($errors->has('kcp'))
            <span class="help-block">
                <strong>{{ $errors->first('kcp') }}</strong>
            </span>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="KCP" class="col-sm-2 control-label">Pendidikan</label>

      <div class="col-sm-10">
       @if(!empty($user->profile->pendidikan))
        <input id="Pendidikan" name="pendidikan" type="text" class="form-control" value="{{ $user->profile->pendidikan }}" placeholder="first name">
       @else
        <input id="Pendidikan" name="pendidikan" type="text" class="form-control" placeholder="Pendidikan">
       @endif

        @if ($errors->has('pendidikan'))
            <span class="help-block">
                <strong>{{ $errors->first('pendidikan') }}</strong>
            </span>
        @endif
      </div>
    </div>

    @if(Auth::id() == $user->id or Auth::user()->role->name === 'Administrator')
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-danger">Update</button>
        </div>
      </div>
    @endif

  </form>
</div>
<!-- /.tab-pane -->