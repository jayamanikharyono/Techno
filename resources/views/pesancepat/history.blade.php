@extends('layout')
@section('judul')
Pesancepat | History Pemesanan
@endsection
@section('konten')
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="" style="font-size: 2em;">Pesancepat</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="{{url('pesancepat/user/home')}}">Home</a></li>
				<li class="active"><a href="">History <span class="sr-only">(current)</span></a></li>				
				<li><a href="{{url('pesancepat/user/about')}}">About</a></li>
			</ul>	
			<ul class="nav navbar-nav navbar-right">
				<li><a href=""><span class="glyphicon glyphicon-user" style="font-size: 0.9em;"></span> {{$namaPemesan}}</a></li>
				<li><a href="/pesancepat">Log Out <span class="glyphicon glyphicon-log-out" style="font-size: 0.9em;"></span></a></li>
			</ul>
		</div>
	</div>
</nav>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="box">
		<div class="info">
			<h4 class="text-center">HISTORY PEMESANAN</h4>
			<hr/>
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="text-center">ID Order</th>
							<th class="text-center">Pesanan</th>
							<th class="text-center">Jumlah</th>
							<th class="text-center">Total</th>
							<th class="text-center">Tanggal</th>
							<th class="text-center">Pukul (WIB)</th>
							<th class="text-center">Rumah Makan</th>
							<th class="text-center">Status Pembayaran</th>
						</tr>
					</thead>
					<tbody>
						@for($i = count($orders)-1; $i >= 0 ;$i--)
						<tr style="text-align: center;">
							<td>{{$orders[$i]->id}}</td>
							<td>{{$orders[$i]->pesanan}}</td>
							<td>{{$orders[$i]->jumlah}}</td>
							<td>Rp {{$orders[$i]->total}},-</td>
							<td>{{$orders[$i]->tanggal}}</td>
							<td>{{$orders[$i]->pukul}}</td>
							<td>{{$orders[$i]->nama_rm}}</td>
							<td id="status{{$orders[$i]->id}}">{{$orders[$i]->status}}</td>
						</tr>
						@endfor
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


@endsection
@section('script')
<script type="text/javascript">
	$( window ).load(function() {
		@foreach($orders as $order)
			$status = $('#status{{$order->id}}').text();
			if($status == 'belum bayar')
			{
				$('#status{{$order->id}}').css('color','red');
			}
			else
			{
				$('#status{{$order->id}}').css('color','green');
			}
		@endforeach
	});	
</script>

@endsection