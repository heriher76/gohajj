@extends('layouts.admin')

@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<h1 class="container-fluid">
Info Jamaah
</h1>

<form action="{{ url('admin/jamaah') }}" method="get">
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
{{ csrf_field() }}
<div class="row" style="padding-top: 50px;">
	<div class="col-md-12">
	    <div class="container-fluid table-responsive">
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
                        <th>Action</th>
    				</tr>
                <tbody>
                    @foreach($jamaahJamaah as $key => $jamaah)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $jamaah->nama }}</td>
                        <td>{{ $jamaah->alamat }}</td>
                        <td>{{ $jamaah->tempat_tanggal_lahir }}, {{ $jamaah->tanggal_lahir }}</td>
                        <td>{{ $jamaah->tahun }}</td>
                        <td>
                            <form action="{{ url('admin/jamaah/'.$jamaah->id) }}" method="POST" style="display: inline;">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Ingin Menghapus Jamaah Ini ?');">Delete</button>
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
        $('#dataTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
            {
                extend: 'excel',
                exportOptions: {
                    columns: [0,1,2,3,4]
                }
            },
            {
                extend: 'pdf',
                pageSize: 'A3',
                exportOptions: {
                    columns: [0,1,2,3,4]
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

<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
@endsection