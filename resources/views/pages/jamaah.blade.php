@extends('layouts.app')

@section('style')
<style>
	.centered {
	  position: absolute;
	  top: 50%;
	  left: 50%;
	  transform: translate(-50%, -50%);
	}
</style>
@endsection

@section('content')
<section id="pelayanan" class="business bg-grey">
    <div class="row">
        <div class="main_business">
            <div class="col-md-12">
                <img src="{{ url('assets/images/hajj-slide02.jpg') }}" style="width: 100%; height: 400px; -webkit-filter: blur(2px); position: relative;text-align: center;" alt="">
     			<a href="{{ url('/') }}"><img src="{{ url('assets/images/logo-makka-color.png') }}" class="centered" style="width: 600px; height: auto;" alt=""></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="main_business">
            <div class="col-md-12">
                <center><h1 style="background-color: yellow;"><b>JAMAAH HAJI</b></h1></center>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="main_business">
        	<div class="container">
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
			</div>
        </div>
    </div>

    <div class="row" style="padding-top: 50px;">
        <div class="main_business">
            <div class="col-md-12">
                <div class="container table-responsive">
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
    </div>

</section>
@endsection