@extends('layout')
@section('judul')
Pesancepat | Menu {{$client->nama_rm}}
@endsection
@section('konten')
<div class="cover-header-menu">
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
					<li><a href="{{url('pesancepat/'.$idPemesan.'/user/history')}}">History</a></li>
					<li><a href="{{url('pesancepat/user/about')}}">About</a></li>
				</ul>	
				<ul class="nav navbar-nav navbar-right">
				<li><a href=""><span class="glyphicon glyphicon-shopping-cart"></span> <code style="font-size: 0.8em;">{{$order}}</code></a></li>
				</ul>
			</div>
		</div>
	</nav>
	<h1 class="font-1" style="margin-top: 50px"><strong>{{$client->nama_rm}}</strong></h1><br/>
	<h3 class="font-1" style="margin-top: -50px;">{{$client->alamat}}</h3>
	<img src="{{asset('images/food.png')}}" style="max-height: 110px; max-width: 110px; margin-top: 0px; margin-bottom: -10px;" >
	<p style="font-size: 2.5em; margin-top: 10px;" class="font-sambung">Silahkan Pesan Menu Favoritmu</p><br/>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<h2 class="font-1">MENU MAKANAN</h2>
	<hr>
	@foreach($makanans as $makanan)
	<div class="col-xs-5 col-sm-3 col-md-3 col-lg-3">
		<div class="box-menu">
			<div class="info">
				<h4 class="text-center" style="margin-bottom: -20px;">{{$makanan->nama}}</h4>
				<hr>
				<h5 style="color: #cc0000;">Rp. {{$makanan->harga}}</h5>
				<img src="http://localhost:8000/images/foods/<?php echo $makanan->image; ?>" class="thumbnail"><br/>	
				<a data-toggle="modal" id="btn{{$makanan->id}}" href="#modal" class="btn btn-success btn-block">Pesan</a>
			</div>
		</div>
	</div>	
	@endforeach
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<h2 class="font-1">MENU MINUMAN</h2>
	<hr>
	@foreach($minumans as $minuman)
	<div class="col-xs-5 col-sm-3 col-md-3 col-lg-3">
		<div class="box-menu">
			<div class="info">
				<h4 class="text-center" style="margin-bottom: 0px;">{{$minuman->nama}}</h4>
				<hr>
				<h5 style="color: #cc0000;">Rp. {{$minuman->harga}}</h5>
				<img src="http://localhost:8000/images/drinks/<?php echo $minuman->image; ?>"><br/>	
				<a data-toggle="modal" id="btn{{$minuman->id}}" href="#modal" class="btn btn-success btn-block">Pesan</a>
			</div>
		</div>
	</div>
	@endforeach
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="h4pesanan">Pesan Test</h4>
				<h5 style="color: #cc0000;" id="h5harga">Rp. Test</h5>
				<input type="hidden" id="hiddenHarga">
			</div>
			<div class="modal-body">
				<form action="/pesancepat/client/saveorder" method="post">
					{{csrf_field()}}
					<input type="hidden" name="id_pemesan" value="{{$idPemesan}}">
					<input type="hidden" name="nama_pemesan" value="{{$namaPemesan}}">
					<input type="hidden" name="pesanan" id="pesanan">
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-calendar"></i></span>
						<input type="text" name="" class="form-control input-md border-hijau" required="" disabled value="Tanggal Pesanan : <?php echo "".date("d/m/Y"); ?>">
					</div>
					<input type="hidden" name="tanggal" value="<?php echo "".date("d/m/Y"); ?>">
					<br/>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-time"></i></span>
						<select class="select form-control border-hijau" id="pukul" name="pukul" >
							<option value="" disabled selected>
								--Waktu Pesanan--
							</option>
							@foreach($waktus as $waktu)
							<option value="{{$waktu}}.00">
								{{$waktu}}.00 WIB
							</option>
							@endforeach
						</select>
						
					</div>
					<br/>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Jumlah Pesanan</span>
						<input type="text" name="jumlah" id="jumlah" class="form-control input-md border-hijau" required="">
					</div>
					<input type="hidden" name="total" id="total">
					<input type="hidden" name="rumahmakan_id" value="{{$client->id}}">
					<input type="hidden" name="nama_rm" value="{{$client->nama_rm}}">
					<input type="hidden" name="status" value="belum bayar">
					<br/>
					<h4 id="h4total">Total Pembayaran Rp. 0</h4>

					<button class="btn btn-warning" data-dismiss="modal">Batal</button>
					<input type="submit" name="" value="Pesan" class="btn btn-success" id="btn">
				</form>
			</div>
		</div>
	</div>
</div>


@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		@foreach($makanans as $makanan)
		$('#btn{{$makanan->id}}').on('click',function(){
			$('#h4pesanan').text("Pesan {{$makanan->nama}}");
			$('#h5harga').text("Rp. "+{{$makanan->harga}});
			$('#hiddenHarga').val({{$makanan->harga}});
			$('#pesanan').val("{{$makanan->nama}}");
		});
		@endforeach
		@foreach($minumans as $minuman)
		$('#btn{{$minuman->id}}').on('click',function(){
			$('#h4pesanan').text("Pesan {{$minuman->nama}}");
			$('#h5harga').text("Rp. "+{{$minuman->harga}});
			$('#hiddenHarga').val({{$minuman->harga}});
			$('#pesanan').val("{{$minuman->nama}}");
		});
		@endforeach
		$('#jumlah').on('keyup',function(){
			$harga = $('#hiddenHarga').val();
			$jumlah = $('#jumlah').val();
			if($jumlah>0)
			{
				$('#h4total').text("Total Pembayaran Rp. "+$jumlah*$harga);
				$('#total').val($jumlah*$harga);
			}
			else
			{
				$('#jumlah').val("");
				$('#h4total').text("Total Pembayaran Rp. 0");
				
			}
			
		});
	});

	
</script>

@endsection