@extends('layouts.master')

@section('content')
<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ $page_title }}</h3>
            </div>
            <form role="form" method="POST" action="{{ route('admin.cuti-type.update',$cutiType->id) }}">
            {{ method_field('PATCH') }}
              {{ csrf_field() }}
                <div class="box-body">
                	<div class="form-group">
                    <label for="name">Type </label>
                    <input name="type" type="text" class="form-control" id="type" placeholder="Type Cuti" value="{{ $cutiType->type }}">
                  </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
  </div>
  </form>
</div>	
</div>

</div>
@endsection