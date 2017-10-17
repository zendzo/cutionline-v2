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
            <form role="form" method="POST" action="{{ route('user.cuti.store') }}">
            {{ csrf_field() }}
              <div class="box-body">
              <div class="form-group">
                  <label for="name">Nama </label>
                  <input type="name" class="form-control" id="name" placeholder="Nama Depan" disabled="" value="{{ Auth::user()->fullName() }}" required="">
                </div>
                <div class="form-group">
                  <label for="grade">Grade / Posisi </label>
                  <input type="grade" class="form-control" id="grade" placeholder="Grade" disabled="" value="{{ Auth::user()->grade }}" required="">
                </div>
                <div class="form-group">
                  <label for="NPP">NPP</label>
                  <input type="NPP" class="form-control" id="NPP" placeholder="NPP" disabled="" value="{{ Auth::user()->NPP }}">
                </div>
                <div class="form-group">
                  <label for="unit_organisasi">Unit Organisasi</label>
                  <input type="unit_organisasi" class="form-control" id="unit_organisasi" placeholder="Unit Organisasi" required="">
                </div>
                 <div class="form-group">
                  <label for="cuti_type_id">Minta diperkenankan</label>
                  <label for="cuti_type_id">Mengambil Cuti </label>
                  <select name="cuti_type_id" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" required="">
                        @foreach($cuti_type as $cuti)
                          <option value="{{ $cuti->id }}">{{ $cuti->type }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Date range -->
              <div class="form-group">
                <label>Terhitung Dari Tanggal - Sampai Dengan Tanggal:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="rangeTanggal" type="text" class="form-control pull-right" id="rangeTanggal" required="">
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
                  <input name="masa_tahun" type="text" class="form-control pull-right" id="datepicker" required="">
                </div>
                <!-- /.input group -->
              </div>
                <div class="form-group">
                  <label for="keperluan">Keperluan</label>
                  <textarea name="keperluan" class="form-control" rows="3" placeholder="Enter ..." required=""></textarea>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat Cuti</label>
                  <textarea name="alamat" class="form-control" rows="3" placeholder="Enter ..." required=""></textarea>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Saya setuju dengan kententuan yang berlaku
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Daftar</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
	</div>
</div>
@endsection
