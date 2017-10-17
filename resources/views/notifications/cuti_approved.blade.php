@extends('layouts.master')

@section('content')
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
             <img style="height: 50px;" src="{{ asset('AdminLTE/dist/img/BNI.png') }}" alt="">   PT. BANK NEGARA INDONESA (Persero) Tbk.
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
            San Francisco, CA 94107<br>
            <u><b>Kantor Cabang Tanjungpinang</b></u><br>
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
        <h4><b><u>Permohonan Cuti Saudara Tanggal : {{ $data->mulai->toFormattedDateString() }}</u></b></h4>
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
        <h5><b>KANTOR CABANG TANJUNGPINANG</b></h5>
        <br>
        <br>
        <h5><u><b>NAMA PIMPINAN</b></u></h5>
        <h5><b>JABATAN</b></h5>     

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@endsection