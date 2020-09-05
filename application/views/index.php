<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Purnamajati</title>
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
							<a href="<?php echo base_url(); ?>"><img style="width: 50%;" src="<?php echo base_url('assets/images/home/logo.png'); ?>" alt="" /></a>
						</div>
						<div class="btn-group pull-right clearfix">
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i>Beranda</a></li>
								<li><a href="<?php echo base_url('home/about'); ?>"><i class="fa fa-question-circle"></i>Tentang Purnamajati</a></li>
								<li><a href="<?php echo base_url('home/contact'); ?>"><i class="fa fa-comments"></i>Hubungi kami!</a></li>
								<li><a href="<?php echo base_url('login'); ?>"><i class="fa fa-lock"></i> Login</a></li>
								<li><a href="<?php echo base_url('login'); ?>"><i class="fa fa-sign-in"></i>Daftar</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle--><br><br>
	
		
	</header><!--/header-->
	
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
										<?php foreach($data as $u){?>
											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a href="<?php echo base_url('home/kategori?id='.$u->id_kategori); ?>"><?php echo $u->nama_kategori ; ?></a>
													</h4>
												</div>
											</div>
											<?php } ?>
								</div>
							</div>
						</div>
						<div class="shipping text-center"><!--shipping-->
							<img src="<?php echo base_url('assets/images/home/shipping.jpg'); ?>" alt="" />
						</div><!--/shipping-->
						<br>
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items">
						<?php foreach($produk as $a){ ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img style="object-fit: contain;" src="<?php echo base_url($a->gambar) ; ?>" alt="" />
											<h2>Rp <?php $format_indonesia = number_format ($a->harga, 0, ',', '.');
                          						echo $format_indonesia; ?> </h2>
											<p><?php echo $a->nama_produk ; ?></p>
											<a href="<?php echo base_url('home/detail?id='.$a->id_produk); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Tambah ke keranjang</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Rp <?php $format_indonesia = number_format ($a->harga, 0, ',', '.');
                          						echo $format_indonesia; ?> </h2>
												<p><?php echo $a->nama_produk ; ?></p>
												<p><i class="fa fa-check-square"></i> Stok : <?php echo $a->stok; ?></p>
												<a href="<?php echo base_url('home/detail?id='.$a->id_produk); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Tambah ke keranjang</a>
											</div>
										</div>
								</div>
							</div>
						</div><?php } ?>
					</div><!--features_items-->
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">

				</div>
				<div class="col-sm-9 padding-right">
					 <!-- Pagination -->
					 <center>
					<?php 
						if (isset($links)) {
		                	echo $links;
		            	} 
		            ?>
		            <center>
				</div>
			</div>
		</div>
	</section><br>
	
	