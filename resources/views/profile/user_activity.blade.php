<div class="active tab-pane" id="activity">
  <table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
  <th>Jenis</th>
  <th>Mulai</th>
  <th>Berakhir</th>
  <th>Masa Tahun</th>
  <th>Keperluan</th>
  <th>Alamat</th>
  <th>Catatan UMC</th>
  <th>Permohonan Lain</th>
  <th>Status</th>
  <th>Lama Hari</th>
</tr>
</thead>
<tbody>
@foreach($data as $cuti)
  <tr>
    <td>{{ $cuti->cutiType->type }}</td>
    <td>{{ $cuti->mulai }}</td>
    <td>{{ $cuti->berakhir }}</td>
    <td>{{ $cuti->masa_tahun }}</td>
    <td>{{ $cuti->keperluan }}</td>
    <td>{{ $cuti->alamat }}</td>
    <td>{{ $cuti->catatan_umc }}</td>
    <td>{{ $cuti->permohonan_lain }}</td>

      @if($cuti->cuti_status_id == 1)
        <td><a href="#" class="btn btn-primary">{{ $cuti->cutiStatus->status }}</a></td>
      @else
        <td><a href="#" class="btn btn-danger disabled">{{ $cuti->cutiStatus->status }}</a></td>
      @endif

    <td>{{ $cuti->total }}</td>
  </tr>
@endforeach
</tbody>
</table>
</div>
