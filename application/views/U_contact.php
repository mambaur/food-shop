<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Hubungi kami! | Purnamajati</title>
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
		<div class="header_top"><!--header_top #f76767-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +6282234344953</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> Purnamajati@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
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
							<a href="<?php echo base_url('Beranda'); ?>"><img style="width: 50%;" src="<?php echo base_url('assets/images/home/logo.png'); ?>" alt="" /></a>
						</div>
						<div class="btn-group pull-right clearfix">
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<li><a href="<?php echo base_url('Beranda'); ?>"><i class="fa fa-home"></i>Beranda</a></li>
								<li><a href="<?php echo base_url('Beranda/About'); ?>"><i class="fa fa-question-circle"></i>Tentang Purnamajati</a></li>
								<li><a href="<?php echo base_url('U_tentang'); ?>"><i class="fa fa-comments"></i>Hubungi kami!</a></li>
								<li><a href="<?php echo base_url('Login'); ?>"><i class="fa fa-lock"></i> Login</a></li>
								<li><a href="<?php echo base_url('Login'); ?>"><i class="fa fa-sign-in"></i>Daftar</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle--><br>
	
		
	</header><!--/header-->
<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		

				</div>			 		
			</div>    	
    		<div class="row mt-5">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Hubungi Kami</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form action="<?php echo base_url('U_tentang/tambah_contact'); ?>" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="nama" class="form-control" required="required" placeholder="Nama">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="judul" class="form-control" required="required" placeholder="Judul">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="pesan" id="message" required="required" class="form-control" rows="8" placeholder="Tulis pesan disini"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Info kontak</h2>
	    				<address>
	    					<p>UD Purnamajati</p>
							<p>Jl. Bungur No.09, Darwo Timur, Gebang, Patrang </p>
							<p>IKabupaten Jember</p>
							<p>Telp +6282234344953</p>
							<p>Email: Purnamajati@gmail.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Sosial Media</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->