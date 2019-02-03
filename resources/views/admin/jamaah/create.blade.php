@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tambahkan Jamaah
  </h1>
</section>
<br>
<form action="{{ url('/admin/jamaah') }}" method="POST">
    {{ csrf_field() }}
    <div class="col-md-12">
        <input type="text" name="name" class="form-control" placeholder="Nama">
    </div>
    <div class="col-md-12" style="padding-top: 10px;">
        <input type="text" name="ttl" class="form-control" placeholder="Tempat Tanggal Lahir"> 
    </div>
    <div class="col-md-12" style="padding-top: 10px;">
        <input type="text" name="alamat" class="form-control" placeholder="Alamat"> 
    </div>
    <div class="col-md-12" style="padding-top: 10px;">
        <input type="text" name="hp" class="form-control" placeholder="Nomor Handphone"> 
    </div>
    <div class="col-md-12" style="padding-top: 10px;">
        <button type="submit" class="form-control btn-success">TAMBAHKAN</button>
    </div>
</form>
@endsection