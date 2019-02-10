@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<h1>
Komentar
</h1>

<div class="row">
	<div class="col-md-12">
	    <div class="table-responsive">
			<h1> </h1><hr>
			<table class="table table-condensed table-hover table-bordered table-responsive" id="dataTable">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Subjek</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($comments as $key => $comment)
					<tr>
						<td>{{ $key+1 }}</td>
						<td>{{ $comment->name }}</td>
						<td>{{ $comment->email }}</td>
						<td>{{ $comment->subject }}</td>
						<td>
							<a href="{{ url('/admin/comment/' . $comment->id . '/edit') }}" title="Edit Admin"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Lihat</button></a>
				            <form action="{{ url('admin/comment/'.$comment->id) }}" method="POST" style="display: inline;">
				            	{{ method_field('delete') }}
				            	{{ csrf_field() }}
				            	<button type="submit" class="btn btn-danger btn-xs" title="Delete Admin" onclick="return confirm('Hapus Komentar Ini?');"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</button>
				            </form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('script')
<script>
	$(document).ready(function() {
	    $('#dataTable').DataTable();
	});
</script>
@endsection