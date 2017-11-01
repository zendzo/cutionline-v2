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
                    <th>Cuti Type</th>
                    <th>Masa Berlaku</th>
                    <th>Masa Berakhir</th>
                    <th>Terpakai</th>
                    <th>Sisa</th>
                    <th>Total</th>
                </tr>
                </thead>

                <tbody>
                    @forelse ($cuti_records as $cuti)
                        <tr>
                            <td>{{ $cuti->cutiType->type }}</td>
                            <td>{{ $cuti->masa_berlaku }}</td>
                            <td>{{ $cuti->masa_berakhir }}</td>
                            <td>{{ $cuti->terpakai }}</td>
                            <td>{{ $cuti->sisa }}</td>
                            <td>{{ $cuti->total }}</td>
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