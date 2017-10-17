@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ $page_title }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
				<thead>
				<tr>
				  <th>ID</th>
				  <th>Name</th>
				  <th>Actions</th>
				</tr>
				</thead>
				<tbody>
				@foreach($cutiType as $type)
				  <tr>
				    <td>{{ $type->id }}</td>
				    <td>{{ $type->type }}</td>    
				    <td><a class="btn btn-primary bnt-flat" href='{{ url("admin/cuti-type/$type->id/edit") }}'>Edit</a>
				    <form action="{{ route('admin.cuti-type.destroy',$type->id) }}" method="POST">
				    	{{ method_field('DELETE') }}
    					{{ csrf_field() }}
				    	<button class="btn btn-danger bnt-flat">Delete</button>
				    </form>

				  </tr>
				@endforeach
				</tbody>
				<tfoot>
				<tr>
				  <th></th>
				  <th></th>
				  <th></th>
				  <th></th>
				  <th></th>
				  <th></th>
				  <th></th>
				  <th></th>
				  <th></th>
				</tr>
				</tfoot>
				</table>
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