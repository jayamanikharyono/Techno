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
				<li><a href=""><span class="glyphicon glyphicon-user" style="font-size: 0.9em;"></span> {{$usernameLogin}}</a></li>
				<li><a href="/pesancepat">Log Out <span class="glyphicon glyphicon-log-out" style="font-size: 0.9em;"></span></a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
<div class="box-register">
	<h2 class="font-1">REGISTRASI CLIENT BARU</h2>
	<hr>
	<form action="/pesancepat/admin/createClient" method="post" class="form-horizontal">
		{{csrf_field()}}
		<div class="form-group">
			<label class="col-md-4 control-label" for="nama_rm">Nama Rumah Makan</label>  
			<div class="col-md-5">
				<input type="text" name="nama_rm" placeholder="nama rumah makan" class="form-control input-md border-hijau" required="">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="nomor">Nomor Telp/HP</label>  
			<div class="col-md-5">
				<input type="text" name="nomor" placeholder="nomor Telp/HP" class="form-control input-md border-hijau" required="">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="kota">Kota</label>  
			<div class="col-md-5">
				<input type="text" name="kota" placeholder="kota" class="form-control input-md border-hijau" required="">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="alamat">Alamat</label>  
			<div class="col-md-5">
				<textarea type="textarea" name="alamat" placeholder="alamat" class="form-control input-md border-hijau" rows="3" required=""></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="nama_pemilik">Nama Pemilik</label>  
			<div class="col-md-5">
				<input type="text" name="nama_pemilik" placeholder="nama pemilik" class="form-control input-md border-hijau" required="">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="username">Username</label>  
			<div class="col-md-5">
				<input type="text" name="username" placeholder="username" class="form-control input-md border-hijau" required="">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="password">Password</label>  
			<div class="col-md-5">
				<input type="password" name="password" placeholder="password" class="form-control input-md border-hijau" required="">
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

		<div class="form-group">
			<label class="col-md-4 control-label" for="submit"></label>
			<div class="col-md-4">
				<button id="submit" name="submit" class="btn btn-success pull-left">Simpan Client</button>
			</div>
		</div>

	</form>
	
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
		  $(document).ready( function() {
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