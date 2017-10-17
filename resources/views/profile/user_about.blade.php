<!-- About Me Box -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Profile {{ $user->fullName() }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <strong><i class="fa fa-book margin-r-5"></i> Pendidikan</strong>

    <p class="text-muted">
      @if(!empty($user->profile->pendidikan))
        {{ $user->profile->pendidikan }}
      @else
        -
      @endif
    </p>

    <hr>

    <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

    <p class="text-muted">
      @if(!empty($user->profile->alamat))
        {{ $user->profile->alamat }}
      @else
        -
      @endif
    </p>

    <hr>

    <strong><i class="fa fa-building margin-r-5"></i> KCP</strong>

    <p>
      @if(!empty($user->profile->kcp))
        {{ $user->profile->kcp }}
      @else
        -
      @endif
    </p>
  </div>
  <!-- /.box-body -->
</div>