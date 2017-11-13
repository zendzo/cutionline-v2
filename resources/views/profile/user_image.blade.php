<!-- Profile Image -->
<div class="box box-primary">
  <div class="box-body box-profile">
    <img class="profile-user-img img-responsive img-circle" src="{{ asset('AdminLTE/dist/img/user-avatar.png') }}" alt="User profile picture">

    <h3 class="profile-username text-center">{{ $user->fullName() }}</h3>

    <p class="text-muted text-center">Type : {{ $user->role->name }}</p>

    <ul class="list-group list-group-unbordered">
      <li class="list-group-item">
        <b>Grade</b> <a class="pull-right">{{ $user->grade->grade }} ({{ $user->grade->grade_level }})</a>
      </li>
      <li class="list-group-item">
        <b>NPP</b> <a class="pull-right">{{ $user->NPP }}</a>
      </li>
      <li class="list-group-item">
        <b>Tahun</b> <a class="pull-right">{{ $user->join_year->toFormattedDateString() }}</a>
      </li>
      <li class="list-group-item">
        <b>Masa Kerja</b> <a class="pull-right">{{ $user->masaKerja() }} Tahun</a>
      </li>
      <li class="list-group-item">
        <b>Jenis Kelamin</b> <a class="pull-right">{{ $user->gender->gender }}</a>
      </li>
      <li class="list-group-item">
        <b>Status </b> <a class="pull-right">{{ $user->marriedStatus->status }}</a>
      </li>
    </ul>

    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
  </div>
  <!-- /.box-body -->
</div>