@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Daftar Jamaah
  </h1>
</section>
<br>
<form action="#" method="POST">
	{{ csrf_field() }}
    <div class="col-md-12">
        <label for="">Data Per-</label>
        <select name="" id="" class="form-control">
        	<option value="">Kabupaten</option>
        	<option value="">Kecamatan</option>
        	<option value="">Desa</option>
        </select>
    </div>
    <div class="col-md-12">
    	<label for="">Pilih Kecamatan</label>
        <select name="" id="" class="form-control">
        	<option value="">Kabupaten</option>
        	<option value="">Kecamatan</option>
        	<option value="">Desa</option>
        </select>
    </div>
    <div class="col-md-12">
    	<label for="">Pilih Desa</label>
        <select name="" id="" class="form-control">
        	<option value="">Kabupaten</option>
        	<option value="">Kecamatan</option>
        	<option value="">Desa</option>
        </select>
    </div>
    <div class="col-md-12" style="padding-top: 10px;">
    	<button type="submit" class="btn-success form-control">Lihat</button>
	</div>
</form>

<div class="row" style="padding-top: 50px;">
	<div class="col-md-12">
	    <div class="container-fluid table-responsive">
			<h1> </h1><hr>
			<table class="table table-striped">
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Alamat</th>
				</tr>
				<tr>
					<td>1</td>
					<td>Heri Hermawan</td>
					<td>Rancaekek, Sumedang</td>
				</tr>
			</table>
		</div>
	</div>
</div>

@endsection