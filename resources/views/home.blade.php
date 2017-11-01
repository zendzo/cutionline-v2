@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4><b>Diambil : {{ isset($tahunan) ? 0 : $tahunan[0]->total }}</b></h4>
              <h4><b>Sisa : {{ $tahunan_max - isset($tahunan) ? 0 : $tahunan[0]->total }}</b></h4>
              <h4><b>Tersedia : {{ $tahunan_max }}</b></h4>

              <p>Cuti Tahunan</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people-outline"></i>
            </div>  
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h4><b>Diambil : {{ isset($melahirkan) ? 0 : $melahirkan[0]->total }}</b></h4>
              <h4><b>Sisa : {{ $melahirkan_max - isset($melahirkan) ? 0 : $melahirkan[0]->total }}</b></h4>
              <h4><b>Tersedia : {{ $melahirkan_max }}</b></h4>

              <p>Melahirkan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>  
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
                <h4><b>Diambil : {{ isset($haji) ? 0 : $haji[0]->total }}</b></h4>
                <h4><b>Sisa : {{ $haji_max - isset($haji) ? 0 : $haji[0]->total }}</b></h4>
                <h4><b>Tersedia : {{ $haji_max }}</b></h4>

              <p>Umroh / Haji</p>
            </div>
            <div class="icon">
              <i class="fa fa-files-o"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h4><b>Diambil : {{ isset($nikah) ? 0 : $nikah[0]->total }}</b></h4>
              <h4><b>Sisa : {{ $nikah_max - isset($nikah) ? 0 : $nikah[0]->total }}</b></h4>
              <h4><b>Tersedia : {{ $nikah_max }}</b></h4>

              <p>Nikah</p>
            </div>
            <div class="icon">
              <i class="fa fa-ban"></i>
            </div>

          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
@endsection