@extends('layout')
@section('judul')
Pesancepat | {{$namaRM}}
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
				<li><a href="{{url('pesancepat/client/home')}}">Home</a></li>
				<li class="active"><a href="">Menu <span class="sr-only">(current)</span></a></li>
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
				<li><a href=""><span class="glyphicon glyphicon-home" style="font-size: 0.9em;"></span> {{$namaLogin}}</a></li>
				<li><a href="/pesancepat">Log Out <span class="glyphicon glyphicon-log-out" style="font-size: 0.9em;"></span></a></li>
			</ul>
		</div>
	</div>
</nav>
<div class="box-register">
	<h2 class="font-1">TAMBAH MENU BARU</h2>
	<hr>
	<form action="/pesancepat/client/createMenu" method="post" class="form-horizontal">
		{{csrf_field()}}
		<div class="form-group">
			<label class="col-md-4 control-label" for="nama">Nama Menu</label>  
			<div class="col-md-5">
				<input type="text" name="nama" placeholder="nama menu" class="form-control input-md border-hijau" required="">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="jenis">Jenis Menu</label>  
			<div class="col-md-5">
				<select class="select form-control border-hijau" id="jenis" name="jenis" >
					<option value="" disabled selected>
						-- jenis menu --
					</option>
					<option value="Makanan">
						Makanan
					</option>
					<option value="Minuman">
						Minuman
					</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="harga">Harga</label>  
			<div class="col-md-5">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">Rp.</span>
					<input type="text" name="harga" placeholder="harga" class="form-control input-md border-hijau" required="">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="image">Image</label>  
			<div class="col-md-5">
				<div class="input-group">
					<span class="input-group-btn">
						<label class="btn btn-default btn-file">
							Browse&hellip;<input type="file" style="display: none;" name="image" id="browse">
						</label>
					</span>
					<input type="text" class="form-control input-md border-hijau" id="i" name="i" placeholder="not file selected" disabled="true">
				</div>
			</div>
		</div>
		<input type="hidden" name="rumahmakan_id" value="{{$idRM}}">
		<input type="hidden" name="nama_rm" value="{{$namaRM}}">
		<div class="form-group">
			<label class="col-md-4 control-label" for="submit"></label>
			<div class="col-md-4">
				<button id="submit" name="submit" class="btn btn-success pull-left">Simpan Menu</button>
			</div>
		</div>
	</form>
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
				<img src="http://localhost:8000/images/foods/<?php echo $makanan->image; ?>"><br/>	
				<a href="{{url('pesancepat/'.$makanan->id.'/deleteMenu/'.$idRM)}}" class="btn btn-danger btn-block">Hapus Menu</a>
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
				<h4 class="text-center" style="margin-bottom: -20px;">{{$minuman->nama}}</h4>
				<hr>
				<h5 style="color: #cc0000;">Rp. {{$minuman->harga}}</h5>
				<img src="http://localhost:8000/images/drinks/<?php echo $minuman->image; ?>"><br/>	
				<a href="{{url('pesancepat/'.$minuman->id.'/deleteMenu/'.$idRM)}}" class="btn btn-danger btn-block">Hapus Menu</a>
			</div>
		</div>
	</div>
	@endforeach
</div>

@endsection
@section('script')
<script>
	$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
  	var input = $(this),
  	numFiles = input.get(0).files ? input.get(0).files.length : 1,
  	label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  	input.trigger('fileselect', [numFiles, label]);
  });

		  // We can watch for our custom `fileselect` event like this
		  $(document).ready(function() {
		  	$(':file').on('fileselect', function(event, numFiles, label) {

		  		var input = $(this).parents('.input-group').find(':text'),
		  		log = numFiles > 1 ? numFiles + ' files selected' : label;

		  		if( input.length ) {
		  			input.val(log);
		  		} else {
		  			if( log ) alert(log);
		  		}

		  	});
		  });
		  
		});
	</script>

	@endsection