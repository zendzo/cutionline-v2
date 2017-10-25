@extends('layouts.master')

@section('cssPlugins')
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/timepicker/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.css') }}">
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
	$(function(){
		$('#rangeTanggal').daterangepicker();

    $('#datepicker').datepicker({
      minViewMode: 2,
      format: 'yyyy'
    }); 
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
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('user.cuti.update',$cuti->id) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
              <div class="box-body">
              <div class="form-group">
                  <label for="name">Nama </label>
                  <input type="name" class="form-control" id="name" disabled value="{{ $cuti->user->fullName() }}">
                </div>
                <div class="form-group">
                  <label for="grade">Grade / Posisi </label>
                  <input type="grade" class="form-control" id="grade" placeholder="Grade" disabled="" value="{{ Auth::user()->grade }}">
                </div>
                <div class="form-group">
                  <label for="NPP">NPP</label>
                  <input type="NPP" class="form-control" id="NPP" placeholder="NPP" disabled="" value="{{ Auth::user()->NPP }}">
                </div>

                 <div class="form-group">
                  <label for="cuti_type_id">Minta diperkenankan</label>
                  <label for="cuti_type_id">Mengambil Cuti </label>
                  <input type="name" class="form-control" id="name" disabled="" value="{{ $cuti->cutiType->type }}">
                </div>

                <!-- Date range -->
              <div class="form-group">
                <label>Terhitung Dari Tanggal - Sampai Dengan Tanggal:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="rangeTanggal" type="text" class="form-control pull-right" id="rangeTanggal" value="{{ $cuti->mulai->format('d-m-Y').' s/d '.$cuti->mulai->format('d-m-Y') }}" disabled>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
                <div class="form-group">
                <label>Masa Tahun:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="masa_tahun" type="text" class="form-control pull-right" id="datepicker" value="{{ $cuti->masa_tahun->format('Y') }}" disabled>
                </div>
                <!-- /.input group -->
              </div>
                <div class="form-group">
                  <label for="keperluan">Keperluan</label>
                  <textarea name="keperluan" class="form-control" rows="3"  disabled="">{{ $cuti->keperluan }}</textarea>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat Cuti</label>
                  <textarea name="alamat" class="form-control" rows="3" disabled="">{{ $cuti->alamat }}</textarea>
                </div>
                <div class="form-group">
                  <label for="permohonan_lain">Permohonan Lainya</label>
                  <textarea name="permohonan_lain" class="form-control" rows="3" >{{ $cuti->permohonan_lain }}</textarea>
                </div>
                <div class="form-group">
                  <label for="catatan_umc">Catatan UMC</label>
                  <textarea name="catatan_umc" class="form-control" rows="3">{{ $cuti->catatan_umc }}</textarea>
                </div>
                <div class="form-group">
                  <label for="rekomendasi_1">Rekomendasi 1</label>
                  <textarea name="rekomendasi_1" class="form-control" rows="3">{{ $cuti->rekomendasi_1 }}</textarea>
                </div>
                <div class="form-group">
                  <label for="rekomendasi_1">Rekomendasi 2</label>
                  <textarea name="rekomendasi_2" class="form-control" rows="3" >{{ $cuti->rekomendasi_2 }}</textarea>
                </div>
                <div class="form-group">
                   <input type="text" name="user_id" hidden value="{{ $cuti->user->id }}">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> SAVE</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
	</div>
</div>
@endsection
