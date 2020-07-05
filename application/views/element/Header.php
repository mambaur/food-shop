<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pusat penjualan makanan khas Jember | Purnamajati</title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/purnamajati.png'); ?>" />
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
							<a href="<?php echo base_url('Welcome'); ?>"><img style="width: 50%;" src="<?php echo base_url('assets/images/home/logo.png'); ?>" alt="" /></a>
						</div>
						<div class="btn-group pull-right clearfix">
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<!-- <li><a href=""><i class="fa fa-sign-in"></i>Daftar</a></li>
								<li><a href="<?php echo base_url('Login'); ?>"><i class="fa fa-lock"></i> Login</a></li> -->
								<li><a href="<?php echo base_url('Profil') ?>"><i class="fa fa-user"></i> Hai ,<?php echo $this->session->userdata("namauser"); ?>!</a></li>
								
								<li><a href="<?php echo base_url('Logout') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div><br>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo base_url('Welcome'); ?>" class="active"><i class="fa fa-home"></i> Beranda</a></li>
								<li><a href="<?php echo base_url('Keranjang'); ?>"><i class="fa fa-shopping-cart"></i> Keranjang</a></li> 
								<!-- <li><a href="ongkir">Ongkir</a></li> -->
								<li><a href="<?php echo base_url('Transaksi'); ?>"><i class="fa fa-book"></i> Transaksi</a></li>
								<li><a href="<?php echo base_url('bukti'); ?>"><i class="fa fa-money"></i> Bukti Pembayaran</a></li>
								<li><a href="<?php echo base_url('Contact'); ?>"><i class="fa fa-question-circle"></i> Hubungi kami!</a></li>
								<!-- <li><a target="_blank" href="<?php echo base_url('Admin_controller/A_login'); ?>"><i class="fa fa-unlock-alt"></i> Admin</a></li>
								<li><a target="_blank" href="<?php echo base_url('Owner_controller/O_login'); ?>"><i class="fa fa-unlock-alt"></i> Owner</a></li> -->
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<!-- <input type="text" placeholder="Search"/> -->
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	