<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | Purnamajati</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/prettyPhoto.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/price-range.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/animate.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/main.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/responsive.css')?>" rel="stylesheet">
   <!--[if lt IE 9]>
    <script src="<?php echo base_url('js/html5shiv.js') ?>"></script>
    <script src="<?php echo base_url('js/respond.min.js') ?>"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/ico/favicon.ico') ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('assets/images/ico/apple-touch-icon-144-precomposed.png') ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('assets/images/ico/apple-touch-icon-114-precomposed.png') ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('assets/images/ico/apple-touch-icon-72-precomposed.png') ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('assets/images/ico/apple-touch-icon-57-precomposed.png') ?>">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top" style="background-color: #E74C3C;"><!--header_top #f76767-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a style="color: white;" href="#"><i style="color: white;" class="fa fa-phone"></i> +6282234344953</a></li>
								<li><a style="color: white;" href="#"><i style="color: white;" class="fa fa-envelope"></i> Purnamajati@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i style="color: white;" class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i style="color: white;" class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i style="color: white;" class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i style="color: white;" class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i style="color: white;" class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="<?php echo base_url(); ?>"><img style="width: 50%;" src="<?php echo base_url('assets/images/home/logo.png'); ?>" alt="" /></a>
						</div>
						<div class="btn-group pull-right clearfix">
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i>Beranda</a></li>
								<li><a href="<?php echo base_url('home/About'); ?>"><i class="fa fa-question-circle"></i>Tentang Purnamajati</a></li>
								<li><a href="<?php echo base_url('home/contact'); ?>"><i class="fa fa-comments"></i>Hubungi kami!</a></li>
								<li><a href="<?php echo base_url('login'); ?>"><i class="fa fa-lock"></i> Login</a></li>
								<li><a href=""><i class="fa fa-sign-in"></i>Daftar</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle--><br>
	
		
	</header><!--/header--><br><br>
	
<section ><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form" style="background-color: #F0F0E9;padding: 50px;"><!--login form-->
						<h2 style="color: orange;"><strong>LOGIN</strong></h2>
						<form action="<?php echo base_url('login/autentikasi'); ?>" method="post">
							<input class="form-control" style="background-color: white;" type="email" placeholder="Email" name="email" required="required" />
							<input class="form-control" style="background-color: white;" type="password" placeholder="Password" name="password" required="required" />
							<!-- <span>
								<input style="background-color: white;" type="checkbox" class="checkbox" required="required"> 
								Biarkan tetap masuk
							</span> -->
							<button type="submit" class="btn btn-default">Masuk</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Atau</h2>
				</div>
				<div class="col-sm-4 ">
					<div class="signup-form" style="background-color: #F0F0E9;padding: 50px;"><!--sign up form-->
						<h2 style="color: orange;"><strong>REGISTER</strong></h2>
						<form action="<?php echo base_url('login/daftar'); ?>" method="post">
							<input class="form-control" style="background-color: white;" type="text" placeholder="Nama" name="nama" />
							<input class="form-control" style="background-color: white;" type="email" placeholder="Alamat email" name="email">
							<input class="form-control" style="background-color: white;" type="number" placeholder="No telp" name="telp">
							<input class="form-control" style="background-color: white;" type="password" placeholder="Kata Sandi" name="password" /><br>
							<button type="submit" class="btn btn-default">Daftar</button>
						</form><br>
					</div><!--/sign up form-->
				</div>
			</div>
		</div><br><br>
	</section><!--/form-->
	