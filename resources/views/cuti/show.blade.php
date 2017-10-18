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
          <b>Hal :</b> Presetujuan Cuti<br>
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
        <h4><b><u>Permohonan Cuti Saudara Tanggal : {{ $data->mulai->format('d-m-Y') }}</u></b></h4>
        <p>menunjuk surat diatas dan pada perihal pada pokok pada surat dengan ini kami memberi tahukan hal-hal berikut:</p>
        <ol>
        	<li style="margin-bottom: 5px;">Permohonan Cuti Tahun <b><u>{{ $data->masa_tahun->format('Y') }}</u></b> Saudara dapat disetujui dilaksanakan selama {{ $data->total }} (Hari Kerja) terhitung dari tanggal <b><u>{{ $data->mulai->format('d-m-Y') }}</u></b> sampai dengan <b><u>{{ $data->berakhir->format('d-m-Y') }}</u></b></li>

        	<li style="margin-bottom: 5px;">Pada Tanggal <b><u>{{ $data->berakhir->addDays(1)->format('d-m-Y') }}</u></b> sudah harus kembali kerja sebagai mana mestinya.</li>

        	<li style="margin-bottom: 5px;">Sesuai dengan permintaan Saudara, cuti dimaksud akan Saudara Jalankan di <b>{{ $data->alamat }}</b>, bila mana ada perubahan tempat/alamat harap memberi tahukan / meminta persetujuan Bank terlebih dahulu.</li>

        	<li style="margin-bottom: 5px;">Selama Menjalankan cuti, tidak ada pengganti, untuk itu segala pekerjaan yang penting/pending supaya diserah terimakan kepada atasan Saudara</li>

        	<li style="margin-bottom: 5px;">OPCT Tahun <b>{{ $data->masa_tahun->format('Y') }}</b> dibayarkan</li>

        </ol>
        <p>demikian disampaikan untuk di laksanakan sebagaimana mestinya</p>

        <h5><b>PT. BANK NEGARA INDONESIA (PERSERO) Tbk</b></h5>
        <h5><b>KANTOR CABANG {{ isset( $data->user->profile->kcp) ? strtoupper($data->user->profile->kcp) : " " }}</b></h5>
        <br>
        <br>
        <h5><u><b>{{ env('PIMPINAN') }}</b></u></h5>
        <h5><b>PIMPINAN</b></h5>     

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-xs-12">
            <button onclick="printPage()" href="#" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
            @if($data->cuti_status_id == 1)
              @if(!is_null($data->catatan_umc))
                <a href="{{ url('/admin/cuti/reject', $data->id ) }}" class="btn btn-warning pull-right" style="margin-right: 5px;"><i class="fa fa-ban"></i> Tolak Permohonan
                </a>
                <a href="{{ url('/admin/cuti/approve', $data->id ) }}" class="btn btn-success pull-right" style="margin-right: 5px;"><i class="fa fa-check"></i> Terima Permohonan
                </a>
              @endif
            @endif

          </div>
        </div>
    </section>
@endsection