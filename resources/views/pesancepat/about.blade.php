@extends('layout')
@section('judul')
Pesancepat | About
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
				<li><a href="{{url('pesancepat/'.$idPemesan.'/user/history')}}">History</a></li>
				<li class="active"><a href="">About <span class="sr-only">(current)</span></a></li>
			</ul>	
			<ul class="nav navbar-nav navbar-right">
				<li><a href=""><span class="glyphicon glyphicon-user" style="font-size: 0.9em;"></span> {{$namaPemesan}}</a></li>
				<li><a href="/pesancepat">Log Out <span class="glyphicon glyphicon-log-out" style="font-size: 0.9em;"></span></a></li>
			</ul>
		</div>
	</div>
</nav>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<br/><br/>
	<h2 class="text-center">About Pesancepat</h2>
	<hr/>
	<p class="text-left font-1" style="font-size: 1.4em;">
		<strong>PesanCepat</strong> merupakan sebuah situs pemesanan makanan/minuman yang dibuat oleh sebuah tim technopreneurship bernama <strong><u>Merintis dari Bawah</u></strong> yang terbentuk pada tanggal ...September 2016 dalam rangka membangun sebuah inovasi bisnis berbasis teknologi. <strong>PesanCepat</strong> dibangun dengan memperhatikan kebutuhan para pekerja keras yang memiliki waktu luang yang sangat terbatas dan memerlukan pemesanan makanan dan minuman dalam waktu terbatas. Website ini menyediakan berbagai menu dari berbagai restoran dan rumah makan yang tersedia di sekitaran daerah Toba Samosir,  Sumatera Utara.
	</p>
	<br/>
	<h2 class="text-center">Our Team</h2>	
	<hr/>
	<div class="row" style="align-items: center;">
		<div></div>
		<div class="media">
			<img src="http://localhost:8000/images/teams/jaya.png" class="media__image">
			<div class="media__body">
				<h4>JAYA MANIK</h4>
				<P>Designer</P>
			</div>
		</div>
		<div class="media">
			<img src="http://localhost:8000/images/teams/yosephin.png" class="media__image">
			<div class="media__body">
				<h4>YOSEPHIN</h4>
				<P>Analysis</P>
			</div>
		</div>
		<div class="media">
			<img src="http://localhost:8000/images/teams/bernando.png" class="media__image">
			<div class="media__body">
				<h4>BERNANDO</h4>
				<P>Backend</P>
			</div>
		</div>
		<div class="media">
			<img src="http://localhost:8000/images/teams/frans.png" class="media__image">
			<div class="media__body">
				<h4>FRANS</h4>
				<P>Backend</P>
			</div>
		</div>
	</div>
	
</div>


@endsection
@section('script')


@endsection