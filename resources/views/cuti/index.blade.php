@extends('layouts.master')

@section('jsPlugins')
<script>
  function printPage() {
      var css = '@page { size: landscape; }',
      head = document.head || document.getElementsByTagName('head')[0],
      style = document.createElement('style');

      style.type = 'text/css';
      style.media = 'print';

      if (style.styleSheet){
        style.styleSheet.cssText = css;
      } else {
        style.appendChild(document.createTextNode(css));
      }

      head.appendChild(style);
    window.print();
  }
</script>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <img style="height: 50px;" src="{{ asset('AdminLTE/dist/img/BNI.png') }}">
              <hr>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @include('cuti.table_list')

              <div class="row no-print">
                <div class="col-xs-12">
                  <button onclick="printPage()" href="#" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
                </div>
              </div>

            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection