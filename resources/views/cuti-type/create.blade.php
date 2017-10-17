@extends('layouts.master')

@section('content')
<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ $page_title }}</h3>
            </div>
            <form role="form" method="POST" action="{{ route('admin.cuti-type.store') }}">
{{ csrf_field() }}
  <div class="box-body">
  	<div class="form-group">
      <label for="name">Type </label>
      <input name="type" type="text" class="form-control" id="type" placeholder="Type Cuti" value="{{ old('type') }}">
    </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Daftar</button>
      </div>
  </div>
  </form>
</div>	
</div>

</div>
@endsection