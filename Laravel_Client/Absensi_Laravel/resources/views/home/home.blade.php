@extends('layouts.master')

@section('content')
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title> | Klorofil | - Absensi</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box lockscreen clearfix">
					<div class="content">
						<h1 class="sr-only">Klorofil - Free Bootstrap dashboard</h1>
						<div class="logo text-center"><img src="{{asset('admin/assets/img/logo-dark.png')}}" alt="Klorofil Logo"></div>
						<div class="user text-center">
							<img src="{{asset('admin/assets/img/user-medium.png')}}" class="img-circle" alt="Avatar">
                            <i><h2 class="name"><span>{{auth()->user()->name}}</span></h2></i>
                            <br>
                            <td><h4 class="name">Created Account : <span>{{auth()->user()->created_at}}</span></h4></td>
                            <td><h4 class="name">Updated Account : <span>{{auth()->user()->updated_at}}</span></h4></td>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
    


@stop