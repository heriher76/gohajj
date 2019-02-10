@extends('layouts.admin')

@section('style')
<!-- Morris charts -->
<link rel="stylesheet" href="{{ url('bower_components/morris.js/morris.css') }}">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Admin Dashboard
  </h1>
</section>
<br>
<div class="row">
	<div class="col-md-6">
		<center><h2>Data Jamaah per-Tahun</h2></center>
		<div id="jamaah-bar"></div>
		<div class="table-responsive">
		    <table class="table table-bordered table-hover table-striped" id="dataTable1">
		        <thead>
		            <tr>
		                <th>No</th>
		                <th>Tahun</th>
		                <th>Jumlah</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@php $no=1; @endphp
		        	@foreach ($jamaah_list as $jamaah)
		        		<tr>
		                    <td>{{ $no }}</td>
		                    <td>{{ $jamaah[0]->tahun }}</td>
		                    <td>{{ \App\Jamaah::where('tahun', $jamaah[0]->tahun)->count() }}</td>
		                </tr>
		            @php $no++; @endphp
		        	@endforeach
		        </tbody>
		    </table>
		</div>
	</div>
	<div class="col-md-6">
		<center><h2>Data Jamaah per-Kecamatan</h2></center>
		<div id="jamaah-donut"></div>
		<div class="table-responsive">
		    <table class="table table-bordered table-hover table-striped" id="dataTable2">
		        <thead>
		            <tr>
		                <th>No</th>
		                <th>Kecamatan</th>
		                <th>Jumlah</th>
		            </tr>
		        </thead>
		        <tbody>
		        	@php $no=1; @endphp
		        	@foreach ($kecamatan_list as $kecamatan)
		        		<tr>
		                    <td>{{ $no }}</td>
		                    <td>{{ $kecamatan[0]->kecamatan }}</td>
		                    <td>{{ \App\Jamaah::where('kecamatan', $kecamatan[0]->kecamatan)->count() }}</td>
		                </tr>
		            @php $no++; @endphp
		        	@endforeach
		        </tbody>
		    </table>
		</div>
	</div>
</div>
@endsection

@section('script')
<!-- Morris.js charts -->
<script src="{{ url('bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ url('bower_components/morris.js/morris.min.js') }}"></script>
<script>
$('#dataTable1').DataTable();
$('#dataTable2').DataTable();

new Morris.Donut({
  // ID of the element in which to draw the chart.
  element: 'jamaah-donut',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
  	@foreach($kecamatan_list as $kecamatan)
    	{ label: '{{ $kecamatan[0]->kecamatan }}', value: {{ \App\Jamaah::where('kecamatan', $kecamatan[0]->kecamatan)->count() }} * 100 / {{ \App\Jamaah::count() }} },
    @endforeach
  ],
  colors: ['#265a88', '#419641', '#eb9316', '#c12e2a', '#C0B283', '#DCD0C0', '#F4F4F4', '#373737'],
  formatter: function (y,data) {
  	return y.toFixed(3)+'%'
  },
  resize: true,
  redraw:true
});
</script>

<script>
new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'jamaah-bar',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
  	@foreach($jamaah_list as $jamaah)
    	{ label:'{{ $jamaah[0]->tahun }}', value: {{ \App\Jamaah::where('tahun', $jamaah[0]->tahun)->count() }} },
  	@endforeach
  ],
  
  xkey: 'label',
  
  ykeys: ['value'],
  
  labels: [''],

  stacked : true,

  preUnits: 'Jamaah ',

  resize: true,
  redraw:true
});
</script>
@endsection