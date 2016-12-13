<!DOCTYPE html>
<html>
<head>
	<title>@yield('judul')</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/font.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-clockpicker.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/github.min.css')}}">
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap-clockpicker.min.js')}}"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<meta content="width=device-width, initial-scale=1" name="viewport">

</head>
<body>	
	@yield('konten')	
	
	@yield('script')
</body>
</html>