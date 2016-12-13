@extends('layout')
@section('judul')
Pesancepat | Login
@endsection
@section('konten')

<div class="cover-login">
	<div class="container">				
		<h1 class="font-1" style="margin-top: 180px;">Welcome to Pesancepat</h1>		
		<h2 class="font-sambung">perfect taste</h2>
		<br/>
		<hr style="width: 400px;">
		<br/>
		<div class="row ">
			<a data-toggle="modal" href="#modalLogin" class="btn btn-success btn-radius0" style="font-size: 20px; width: 120px;">Login</a>
			<a href="{{url('/pesancepat/create')}}" class="btn btn-warning btn-radius0" style="font-size: 20px; width: 120px;">  Register  </a>
		</div>
		<br/><br/><br/><br/><br/><br/><br/><br/>
	</div>
</div>
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog"  style="max-width: 35%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Login</h4>
			</div>
			<div class="modal-body">
				<form action="{{URL ('/pesancepat/user/login')}}" method="get">
					{{csrf_field()}}									
					<input type="text" name="username"
					class="form-control border-hijau" placeholder="username"><br />
					<input type="password" name="password"
					class="form-control border-hijau" placeholder="password"><br />
					<input type="submit" class="btn btn-success btn-block" style="font-size: 20px;" 
					value="Login">
				</form>
				<br>
				<a href="" style="margin-right: 30;">Lupa password?</a>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
@endsection