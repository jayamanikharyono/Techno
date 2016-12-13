@extends('layout')
@section('judul')
pesancepat | Registrasi
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
			<a class="navbar-brand" href="#" style="font-size: 2em;">Pesancepat</a>
		</div>

		
	</div><!-- /.container-fluid -->
</nav>

<div class="box-register">
	<h2 class="font-1">REGISTRASI AKUN BARU</h2>
	<hr>
	<form action="{{ url('pesancepat') }}" method="post" class="form-horizontal">
		{{csrf_field()}}
		<div class="form-group">
			<label class="col-md-4 control-label" for="name">Nama</label>  
			<div class="col-md-5">
				<input type="text" name="name" placeholder="nama" class="form-control input-md border-hijau" required="">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label" for="jk">Jenis Kelamin</label>
			<div class="col-md-3"> 
				<label class="radio-inline" for="jk-0">
					<input type="radio" name="jk" id="jk-0" value="Pria">
					Pria
				</label> 
				<label class="radio-inline" for="jk-1">
					<input type="radio" name="jk" id="jk-1" value="Wanita">
					Wanita
				</label>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="nomor_id">Nomor Identitas</label>  
			<div class="col-md-5">
				<input type="text" name="nomor_id" placeholder="nomor ID" class="form-control input-md border-hijau" required="">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label" for="jenis_id">Jenis Identitas</label>  
			<div class="col-md-5">
				<select class="select form-control border-hijau" id="jenis_id" name="jenis_id">
					<option value="" disabled selected>
						-- jenis identitas --
					</option>
					<option value="KTP">
						KTP
					</option>
					<option value="KTM">
						KTM
					</option>
					<option value="Kartu Pelajar">
						Kartu Pelajar
					</option>
					<option value="SIM">
						SIM
					</option>
				</select>
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
			<label class="col-md-4 control-label" for="idcard">Username</label>  
			<div class="col-md-5">
				<input type="text" name="username" placeholder="username" class="form-control input-md border-hijau" required="">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="idcard">Password</label>  
			<div class="col-md-5">
				<input type="password" name="password" placeholder="password" class="form-control input-md border-hijau" required="">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label" for="submit"></label>
			<div class="col-md-4">
				<button id="submit" name="submit" class="btn btn-success pull-left">Register</button>
			</div>
		</div>

	</form>
	
	
</div>




@endsection
@section('script')


@endsection