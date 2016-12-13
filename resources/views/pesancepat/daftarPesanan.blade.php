@extends('layout')
@section('judul')
Pesancepat | {{$namaLogin}}
@endsection
@section('konten')
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="" style="font-size: 2em;">Pesancepat</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="active"><a href="">Home <span class="sr-only">(current)</span></a></li>
				<li><a href="{{url('pesancepat/'.$idRM.'/client/menu')}}">Menu</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href=""><span class="glyphicon glyphicon-home" style="font-size: 0.9em;"></span> {{$namaLogin}}</a></li>
				<li><a href="/pesancepat">Log Out <span class="glyphicon glyphicon-log-out" style="font-size: 0.9em;"></span></a></li>
			</ul>
		</div>
	</div>
</nav>
<div class="col-md-5">
	<div class="input-group">
		<span class="input-group-addon" id="basic-addon1">Cari Pelanggan</span>
		<input type="text" name="search" id="search" placeholder="nama pelanggan" class="form-control input-md border-hijau">
		<input type="hidden" name="idRM" id="idRM" value="{{$idRM}}">
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="box">
		<div class="info">
			<h4 class="text-center">DAFTAR PESANAN</h4>
			<hr/>
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="text-center">ID Order</th>
							<th class="text-center">Nama Pelanggan</th>
							<th class="text-center">Pesanan</th>
							<th class="text-center">Jumlah</th>
							<th class="text-center">Total</th>
							<th class="text-center">Tanggal</th>
							<th class="text-center">Pukul (WIB)</th>
							<th class="text-center">Status Pembayaran</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@for($i = count($orders)-1; $i >= 0 ;$i--)
						<tr style="text-align: center;">
							<td style="color: #990000; font-weight: bold;">{{$orders[$i]->id}}</td>
							<td style="color: #990000; font-weight: bold;">{{$orders[$i]->nama_pemesan}}</td>
							<td>{{$orders[$i]->pesanan}}</td>
							<td>{{$orders[$i]->jumlah}}</td>
							<td style="color: #990000; font-weight: bold;">Rp {{$orders[$i]->total}},-</td>
							<td>{{$orders[$i]->tanggal}}</td>
							<td>{{$orders[$i]->pukul}}</td>
							<td>{{$orders[$i]->status}}</td>
							<td>
								<form action="{{url('pesancepat/'.$orders[$i]->id.'/updateOrder')}}" method="post">
									{{csrf_field()}}
									<input type="hidden" name="status" value="sudah bayar">
									<input type="submit" name="" value="Lunas" class="btn btn-success">
								</form>
							</td>
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
	$(document).ready(function(){
		$('#search').on('keyup',function(){
			$value = $(this).val();
			$idRM = $('#idRM').val();
			$.ajax({
				type : 'get',
				url : '{{URL::to('search')}}',
				data : {'idRM':$idRM,'search':$value},
				success:function(data){
					$('tbody').html(data);
				}
			});
		});
	});
</script>

@endsection