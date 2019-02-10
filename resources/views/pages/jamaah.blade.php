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

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
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
                <center><h1 style="background-color: #efdb3e;"><b>JAMAAH HAJI</b></h1></center>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="main_business">
        	<div class="container">
                <form action="{{ url('lihat-jamaah') }}" method="get">
                    <div class="col-md-12">
                        <label for="">Data Per-</label>
                        <select name="sortir" id="sortir" class="form-control dynamic">
                            <option value="kabupaten">Kabupaten</option>
                            <option value="kecamatan">Kecamatan</option>
                            <option value="desa">Desa</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="">Pilih Kecamatan</label>
                        <select name="kecamatan" id="kecamatan" class="form-control dynamic" data-dependent="desa" disabled="disabled">
                            <option value="">Pilih Kecamatan</option>
                            @foreach($kecamatan_list as $kecamatan)
                                <option value="{{ $kecamatan[0]->kecamatan }}">{{ $kecamatan[0]->kecamatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="">Pilih Desa</label>
                        <select name="desa" id="desa" class="form-control" disabled="disabled">
                            <option value="">Pilih Desa</option>
                        </select>
                    </div>
                    <div class="col-md-12" style="padding-top: 10px;">
                        <button type="submit" class="btn-success form-control">Lihat</button>
                    </div>
                </form>
			</div>
        </div>
    </div>
    {{ csrf_field() }}
    <div class="row" style="padding-bottom: 50px;">
        <div class="col-md-12">
            <div class="container table-responsive">
                <h1> </h1><hr>
                <h4>Download :</h4>
                <table class="table table-condensed table-hover table-bordered table-responsive" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>TTL</th>
                            <th>Tahun Konfirmasi</th>
                            <th style="display: none;">Telephone</th>
                            <th style="display: none;">Kecamatan</th>
                            <th style="display: none;">Desa</th>
                            <th style="display: none;">Kloter</th>
                            <th style="display: none;">No Paspor</th>
                        </tr>
                    <tbody>
                        @foreach($jamaahJamaah as $key => $jamaah)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $jamaah->nama }}</td>
                            <td>{{ $jamaah->alamat }}</td>
                            <td>{{ $jamaah->tempat_tanggal_lahir }}, {{ $jamaah->tanggal_lahir }}</td>
                            <td>{{ $jamaah->tahun }}</td>
                            <td style="display: none;">{{ $jamaah->telephone }}</td>
                            <td style="display: none;">{{ $jamaah->kecamatan }}</td>
                            <td style="display: none;">{{ $jamaah->desa }}</td>
                            <td style="display: none;">{{ $jamaah->kloter }}</td>
                            <td style="display: none;">{{ $jamaah->no_paspor }}</td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
            {
                extend: 'excel',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8,9]
                }
            },
            {
                extend: 'pdf',
                pageSize: 'A3',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8,9]
                }
            }]
        });

        $('.dynamic').change(function(){
            if ($(this).val() == 'kabupaten') {
                $('#kecamatan').prop('disabled', 'disabled');
                $('#desa').prop('disabled', 'disabled');
            }else if ($(this).val() == 'kecamatan') {
                $('#kecamatan').prop('disabled', false);
                $('#desa').prop('disabled', 'disabled');
            }else if ($(this).val() == 'desa') {
                $('#kecamatan').prop('disabled', false);
                $('#desa').prop('disabled', false);
            }

            if($(this).val() != '') {
                var select = $(this).attr('id');
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url:"{{ route('jamaah.fetch') }}",
                    method:"POST",
                    data:{select:select, value:value, _token:_token, dependent:dependent},
                    success:function(result) {
                        $('#'+dependent).html(result);
                    }
                })
            }
        });
    });
</script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
@endsection