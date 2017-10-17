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
          <h2 class="page-header">
             <img style="height: 50px;" src="{{ asset('AdminLTE/dist/img/BNI.png') }}" alt="">
             <small class="pull-right">Tanjungpinang : {{ $data->created_at->format('d-m-Y') }}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        <b>No: TP/10/12/17</b><br>
          <br>
          <b>Hal :</b> Pemberitahuan Cuti<br>
          <b>Lamp :</b> -<br><br>
          To
          <address>
            <strong>Sdr. {{ $data->user->first_name }} NPP. {{ $data->user->NPP }}</strong><br>
            PT. Bank Negara Inonesia , Tbk<br>
            {{ isset( $data->user->profile->alamat) ? $data->user->profile->alamat : " " }}<br>
            <u><b>Kantor Cabang : {{ isset( $data->user->profile->kcp) ? $data->user->profile->kcp : " " }}</b></u><br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-10">
        <h4><b><u>Permohonan Cuti Saudara Tanggal : {{ $data->mulai->format('d-m-Y') }} DITOLAK</u></b></h4>

        <p>demikian disampaikan untuk di laksanakan sebagaimana mestinya</p>

        <h5><b>PT. BANK NEGARA INDONESIA (PERSERO) Tbk</b></h5>
        <h5><b>KANTOR CABANG {{ isset( $data->user->profile->kcp) ? strtoupper($data->user->profile->kcp) : " " }}</b></h5>
        <br>
        <br>
        <h5><u><b>NAMA PIMPINAN</b></u></h5>
        <h5><b>JABATAN</b></h5>     

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-xs-12">
            <button onclick="printPage()" href="#" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
            @if($data->cuti_status_id == 1)
            <a href="{{ url('/admin/cuti/reject', $data->id ) }}" class="btn btn-warning pull-right" style="margin-right: 5px;"><i class="fa fa-ban"></i> Tolak Permohonan
            </a>
            <a href="{{ url('/admin/cuti/approve', $data->id ) }}" class="btn btn-success pull-right" style="margin-right: 5px;"><i class="fa fa-check"></i> Terima Permohonan
            </a>
            @endif

          </div>
        </div>
    </section>
@endsection