@extends('layouts.master')

@section('jsPlugins')
<!-- DataTables -->
<script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable({});
    $('#example2').DataTable({

    });
  });
</script>

@endsection

@section('cssPlugins')
<!-- DataTables -->
<link rel="stylesheet" href=".{{ asset('AdminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('content')
          <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">{{ $page_title }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Masa Kerja (tahun)</th>
                </tr>
                </thead>

                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td><a href="{{ route('admin.claim.show',$user->id) }}">{{ $user->fullName() }}</a></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->masaKerja() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6"><h4 class="text-center">Belum Ada Data</h4></td>
                        </tr>
                    @endforelse
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
@endsection