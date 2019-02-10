@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tambahkan Jamaah
  </h1>
</section>
<br>

<div class="col-md-12" style="padding-bottom: 15px;">
    <h3>Via Excel</h3>
    <form action="{{ url('/admin/jamaah/import') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="button" id="uploadTrigger" class="btn btn-success" value="Tambah Jamaah(Excel)">
        <input type="file" id="uploadFile" class="hidden" name="jamaah" id="file">
        <select name="tahun">
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
        </select>
        <br>
        <button type="submit">Upload</button>
        @if($errors->has('jamaah'))
          <p style="color: red;">{{ $errors->first('jamaah') }}</p>
        @endif
    </form>
</div>

<form action="{{ url('/admin/jamaah') }}" method="POST">
    {{ csrf_field() }}
    <div class="col-md-12">
        <h3>Manual</h3>
        <input type="text" name="name" class="form-control" placeholder="Nama" required>
    </div>
    <div class="col-md-12" style="padding-top: 10px;">
        <input type="text" name="tempat_tanggal_lahir" class="form-control" placeholder="Tempat Lahir" required> 
    </div>
    <div class="col-md-12" style="padding-top: 10px;">
        <input type="text" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" required> 
    </div>
    <div class="col-md-12" style="padding-top: 10px;">
        <input type="text" name="alamat" class="form-control" placeholder="Alamat" required> 
    </div>
    <div class="col-md-12" style="padding-top: 10px;">
        <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" required> 
    </div>
    <div class="col-md-12" style="padding-top: 10px;">
        <input type="text" name="desa" class="form-control" placeholder="Desa" required> 
    </div>
    <div class="col-md-12" style="padding-top: 10px;">
        <input type="text" name="telephone" class="form-control" placeholder="Nomor Handphone" required> 
    </div>
    <div class="col-md-12" style="padding-top: 10px;">
        <input type="text" name="kloter" class="form-control" placeholder="Kloter" required> 
    </div>
    <div class="col-md-12" style="padding-top: 10px;">
        <input type="text" name="no_paspor" class="form-control" placeholder="Nomor Passpor" required> 
    </div>
    <div class="col-md-12" style="padding-top: 10px;">
        <input type="text" name="tahun" class="form-control" placeholder="Tahun Konfirmasi" required> 
    </div>
    <div class="col-md-12" style="padding-top: 10px;">
        <button type="submit" class="form-control btn-success">TAMBAHKAN</button>
    </div>
</form>
@endsection

@section('script')
<script>
    $("#uploadTrigger").click(function(){
       $("#uploadFile").click();
    });
</script>
@endsection