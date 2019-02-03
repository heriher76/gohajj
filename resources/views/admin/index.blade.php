@extends('layouts.admin')

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
		<img src="{{ url('assets/images/google-charts-piechart.png') }}" class="img-responsive" alt="">
	</div>
	<div class="col-md-6">
		<img src="{{ url('assets/images/graph.png') }}" class="img-responsive" alt="">
	</div>
</div>
@endsection