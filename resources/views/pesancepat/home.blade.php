@extends('layout')
@section('judul')
Pesancepat | Home
@endsection
@section('konten')
<div class="cover-header">
	<nav class="navbar navbar-default navbar-fixed-top">
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
				<li><a href="{{url('pesancepat/'.$idPemesan.'/user/history')}}">History</a></li>
				<li><a href="{{url('pesancepat/user/about')}}">About</a></li>
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<li><a href=""><span class="glyphicon glyphicon-user" style="font-size: 0.9em;"></span> {{$namaPemesan}}</a></li>
				<li><a href="/pesancepat">Log Out <span class="glyphicon glyphicon-log-out" style="font-size: 0.9em;"></span></a></li>
			</ul>
		</div>
	</div>
	</nav>
	<br/>
	<h1 style="margin-top: 50px;">TERSEDIA BERBAGAI RUMAH MAKAN</h1>
	<h3 class="font-1">silahkan pilih rumah makan favoritmu</h3><br/>
	<h3 class="font-sambung">Temukan Kelezatan dan Inpirasi di Sini</h3><br/>
</div>

@foreach($clients as $client)
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	<div class="box">
		<div class="info">
			<h4 class="text-center">{{$client->nama_rm}}</h4>
			<img src="http://localhost:8000/images/<?php echo $client->image; ?>">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="title text-left">
						nama rumah makan<p class="deskripsi">{{$client->nama_rm}}</p>
					</div>
					<div class="title text-left">
						nama pemilik<p class="deskripsi">{{$client->nama_pemilik}}</p>
					</div>
					<div class="title text-left">
						contact<p class="deskripsi">{{$client->nomor}}</p>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="title text-left">
						kota<p class="deskripsi">{{$client->kota}}</p>
					</div>
					<div class="title text-left">
						alamat<p class="deskripsi">{{$client->alamat}}</p>
					</div>
				</div>
			</div>			
			<a href="{{url('pesancepat/'.$client->id.'/menu')}}" class="btn btn-orange">Lihat Menu Makanan/Minuman</a>
		</div>
	</div>
</div>
@endforeach


@endsection
@section('script')


@endsection