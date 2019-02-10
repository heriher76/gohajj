@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<h1>
Daftar Administrator
</h1>
<a href="{{ url('/admin/users/create') }}" class="btn btn-primary">Tambah Admin</a>
<br>
<br>
<table class="table table-condensed table-hover table-bordered table-responsive" id="dataTable">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $key => $user)
		<tr>
			<td>{{ $key+1 }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>
	            <form action="{{ url('admin/users/'.$user->id) }}" method="POST" style="display: inline;">
	            	{{ method_field('delete') }}
	            	{{ csrf_field() }}
	            	<button type="submit" class="btn btn-danger btn-xs" title="Delete Admin" onclick="return confirm('Hapus Admin ini?');"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</button>
	            </form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection

@section('script')
<script>
	$(document).ready(function() {
	    $('#dataTable').DataTable();
	});
</script>
@endsection