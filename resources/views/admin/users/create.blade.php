@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tambah Administrator
  </h1>
</section>
<br>
<form action="{{ url('/admin/users') }}" method="POST">
    {{ csrf_field() }}
    <div class="col-md-12">
        <input type="text" name="name" class="form-control" placeholder="Nama">
    </div>
    <div class="col-md-12" style="padding-top: 10px;">
        <input type="email" name="email" class="form-control" placeholder="Email"> 
    </div>
    <div class="col-md-12" style="padding-top: 10px;">
        <input type="password" name="password" class="form-control" placeholder="Password"> 
    </div>
    <div class="col-md-12" style="padding-top: 10px;">
        <button type="submit" class="form-control btn-success">TAMBAHKAN</button>
    </div>
</form>
@endsection