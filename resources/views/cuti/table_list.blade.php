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
  <th>Rekomendasi 1</th>
  <th>Rekomendasi 2</th>
  <th>Status</th>
  <th>User</th>
  <th>Lama Hari</th>
</tr>
</thead>
<tbody>
@foreach($data as $cuti)
  <tr>
    <td>{{ $cuti->cutiType->type }}</td>
    <td>{{ $cuti->mulai->format('d-m-Y') }}</td>
    <td>{{ $cuti->berakhir->format('d-m-Y') }}</td>
    <td>{{ $cuti->masa_tahun->format('Y') }}</td>
    <td>{{ $cuti->keperluan }}</td>
    <td>{{ $cuti->alamat }}</td>
    <td>{{ $cuti->catatan_umc }}</td>
    <td>{{ $cuti->permohonan_lain }}</td>
    <td>{{ $cuti->rekomendasi_1 }}</td>
    <td>{{ $cuti->rekomendasi_2 }}</td>

      @if(Auth::user()->role->id == 1)
        <td>
          <a href="{{ url('/user/cuti',$cuti->id) }}"><span class="label label-success">{{ $cuti->cutiStatus->status }}</span></a>
          @if($cuti->cuti_status_id === 1)
            <a href="{{ route('admin.cuti.edit',$cuti->id) }}"><span class="label label-success">Edit</span></a>
          @endif
        </td>
      @else
        <td><a href="#" class="btn btn-danger disabled">{{ $cuti->cutiStatus->status }}</a></td>
      @endif
      
    <td><a href="{{ url('/user/profile',$cuti->user_id) }}">{{ $cuti->user->first_name }}</a></td>
    <td>{{ $cuti->total }}</td>
  </tr>
@endforeach
</tbody>
<tfoot>
<tr>
  <td colspan="13">{{ $data->links() }}</td>
</tr>
</tfoot>
</table>