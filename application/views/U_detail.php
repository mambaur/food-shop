<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Detail produk | Purnamajati</title>
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
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
										<?php 
											foreach($data as $u){?>
											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title"><a href="#">
													<?php echo $u->nama_kategori ; ?> 
													</a></h4>
												</div>
											</div><?php
											}
										?>
								</div>
							</div>
						</div><!--/category-products-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="<?php echo base_url('assets/images/home/shipping.jpg'); ?>" alt="" />
						</div><!--/shipping-->
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<?php foreach($produk as $a){ ?>
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img style="object-fit: contain;" src="<?php echo base_url($a->gambar) ; ?>" alt="" />
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="<?php echo base_url('assets/images/product-details/new.jpg'); ?>" class="newarrival" alt="" />
								<h2><?php echo $a->nama_produk ; ?></h2>
								<p>Kode Produk: <?php echo $a->id_produk ; ?></p>
								<img src="<?php echo base_url('assets/images/product-details/rating.png'); ?>" alt="" />
								<form>
								<span>
									<span>Rp <?php $format_indonesia = number_format ($a->harga, 0, ',', '.');
                          						echo $format_indonesia; ?> </span>
									<label>Jumlah:</label>
									<input type="text" value="1" />
									<a href="<?php echo base_url('Keranjang/insert1/'.$a->id_produk.'/'.$a->harga); ?>">
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Beli
									</button></a>
								</span>
								<p><b>Stok:</b> <?php echo $a->stok ?></p>
								<p><b>Toko:</b> Purnamajati</p>
								<a href=""><img src="<?php echo base_url('assets/images/product-details/share.png'); ?>" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div>
					<?php } ?><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<!-- <li><a href="#tag" data-toggle="tab">Tag</a></li> -->
								<li class="active"><a href="#reviews" data-toggle="tab">Keterangan</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<p><?php echo $a->keterangan; ?></p>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
				</div>
			</div>
		</div>
	</section>
