@extends('layouts.master')

@section('jsPlugins')
<script>
  function printPage() {
    window.print();
  }
</script>
@endsection

@section('content')
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="col-xs-8">
            <h4>PT. BANK NEGARA INDONESIA (Persero ) Tbk.</h4>
            <h5>KANTOR CABANG TANJUNGPINANG</h5>
          </div>
          <div class="col-xs-4">
            <img class="pull-right" style="height: 50px;" src="{{ asset('AdminLTE/dist/img/BNI.png') }}">
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <br>
          <u><b><h4 class=".text-center">PERMOHONAN CUTI</h4></b></u>

          <address>
            <p>Nama             : {{ $data->user->fullName() }}</p>
            <p>Grade            : {{ $data->user->fullName() }}</p>
            <p>Unit Oragnisasi  : </p>
            <p>Mengambil Cuti   : {{ $data->cutiType->type }} </p>
            <p>Selama           : {{ $data->total }} (Hari Kerja)</p>
            <p>Terhitung Dari   : {{ $data->mulai->format('d-m-Y') }} S/d {{ $data->mulai->format('d-m-Y') }}</p>
            <p>Untuk Masa       : {{ $data->masa_tahun->format('Y') }}</p>
            <p>Keperluan        : {{ $data->keperluan }}</p>
            <p>Keperluan        : {{ $data->keperluan }}</p>
            <p>Alamat           : {{ $data->alamat }}</p>
            <p>Permohonan Lain  : {{ $data->permohonan_lain }}</p>
            <br>
          </address>
        </div>
        <!-- /.col -->
      </div>

      <div class="row">
          <div class="col-xs-8">
            <u><b>Catan UMC     :</b></u>
            <br>
          </div>
          <div class="col-xs-8 pull-right">
            <p>Tanjungpinang, {{ Date('m-d-Y') }}</p>
            <p>Pemohon</p>
            <br><br>
            <b><u>{{ strtoupper($data->user->fullName()) }}</u></b>
          </div>
        </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12" style="border: 1px solid black; height: 200px; margin-bottom: 15px;">    
          <p><u><b>Rekomendasi :</b></u></p>
        </div>
        <div class="col-xs-12" style="border: 1px solid black; height: 200px; margin-bottom: 15px;">    
          <p><u><b>Rekomendasi :</b></u></p>
        </div>
        <!-- /.col -->
      </div>
      <div class="row" style="border: 1px solid black; height: 200px; margin-bottom: 15px;">

        <div class="col-xs-8" >    
          <p><u><b>Keputusan Pemimpin Cabang :</b></u></p>
          <p>Setuju / Tidak Setuju Cuti dilaksanakan Tanggal : {{ $data->mulai->format('d-m-Y') }} s/d {{ $data->berakhir->format('d-m-Y') }}</p>
          <p>OPCT dapat / tidak dapat di bayarkan</p>
          <p>Pengganti Sementara Saudara : </p>
          <p>Lain-Lain Cf. Ketentuan</p>
        </div>

        <div class="col-xs-4 pull-right">
          <p>Tanjungpinang, {{ Date('m-d-Y') }}</p>
            <p><b>PT. BANK NEGARA INDONESIA (Persereo ) Tbk</b></p>
            <p><b>KANTOR CABANG TANJUNGPINANG</b></p>
            <br><br>
            <b><u>{{ env('PIMPINAN') }}</u></b>
            <p>PIMPINAN</p>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-xs-12">
            <button onclick="printPage()" href="#" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
          </div>
        </div>
    </section>
@endsection