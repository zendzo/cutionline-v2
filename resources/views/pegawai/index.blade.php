@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <img style="height: 50px;" src="{{ asset('AdminLTE/dist/img/BNI.png') }}">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nama Depan</th>
                  <th>Nama Belakang</th>
                  <th>Grade</th>
                  <th>NPP</th>
                  <th>Tahun Masuk</th>
                  <th>email</th>
                  <th>phone</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  @if(!is_null($users))
                    @foreach($users as $user)
                     <tr>
                        <td><a href="{{ url('/user/profile',$user->id) }}">{{ $user->first_name }}</a></td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->grade }}</td>
                        <td>{{ $user->NPP }}</td>
                        <td>{{ $user->join_year->toFormattedDateString() }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td><a class="btn btn-primary btn-xs">Aktif</a></td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama Depan</th>
                  <th>Nama Belakang</th>
                  <th>Grade</th>
                  <th>NPP</th>
                  <th>Tahun Masuk</th>
                  <th>email</th>
                  <th>phone</th>
                  <th>Status</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection