@extends('layout')
@section('judul')
Pesancepat | Admin
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
				
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<li><a href=""><span class="glyphicon glyphicon-user" style="font-size: 0.9em;"></span> {{$namaLogin}}</a></li>
				<li><a href="/pesancepat">Log Out <span class="glyphicon glyphicon-log-out" style="font-size: 0.9em;"></span></a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<a href="{{url ('/pesancepat/admin/pageCreateClient')}}" class="btn btn-success pull-left">Tambah Client Baru</a><br/><br/>
	<div class="box">
		<div class="info">
			<h2 class="font-1 text-center">CLIENT RUMAH MAKAN</h2>
			<hr>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="text-center">ID</th>
							<th class="text-center">Nama Rumah Makan</th>
							<th class="text-center">Nomor Telepon</th>
							<th class="text-center">Kota</th>
							<th class="text-center">Alamat</th>
							<th class="text-center">Nama Pengusaha</th>
							<th class="text-center">Username Akun</th>
							<th class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($clients as $client)
						<tr style="text-align: left;">
							<td>{{$client->id}}</td>
							<td>{{$client->nama_rm}}</td>
							<td>{{$client->nomor}}</td>
							<td>{{$client->kota}}</td>
							<td>{{$client->alamat}}</td>
							<td>{{$client->nama_pemilik}}</td>
							<td>{{$client->username}}</td>
							<td><a href="" class="btn btn-danger" id="">Hapus</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>







@endsection
@section('script')


@endsection