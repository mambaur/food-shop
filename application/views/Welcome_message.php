
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>P</span>urnamajati</h1>
									<h2>Jember</h2>
									<p>Tempat jual beli makanan oleh-oleh khas jember </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="<?php echo base_url('assets/images/home/girl1.jpg'); ?>" class="girl img-responsive" alt="" />
									<img src="<?php echo base_url('assets/images/home/pricing.png'); ?>"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>P</span>urnamajati</h1>
									<h2>Jember</h2>
									<p>Tempat jual beli makanan oleh-oleh khas jember </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="<?php echo base_url('assets/images/home/girl2.jpg'); ?>" class="girl img-responsive" alt="" />
									<img src="<?php echo base_url('assets/images/home/pricing.png'); ?>"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>P</span>urnamajati</h1>
									<h2>Jember</h2>
									<p>Tempat jual beli makanan oleh-oleh khas jember </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="<?php echo base_url('assets/images/home/girl1.jpg'); ?>" class="girl img-responsive" alt="" />
									<img src="<?php echo base_url('assets/images/home/pricing.png'); ?>" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Kategori</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
										<?php foreach($data as $u){?>
											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a href="<?php echo base_url('Welcome/katproduk/'.$u->id_kategori); ?>"><?php echo $u->nama_kategori ; ?></a>
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
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Produk</h2>
						<?php foreach($produk as $a){ ?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img style="object-fit: contain;" src="<?php echo base_url($a->gambar) ; ?>" alt="" />
											<h2>Rp <?php $format_indonesia = number_format ($a->harga, 0, ',', '.');
                          						echo $format_indonesia; ?> </h2>
											<p><?php echo $a->nama_produk ; ?></p>
											<a href="<?php echo base_url('Welcome/detail/'.$a->id_produk); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Tambah ke keranjang</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>Rp <?php $format_indonesia = number_format ($a->harga, 0, ',', '.');
                          						echo $format_indonesia; ?> </h2>
												<p><?php echo $a->nama_produk ; ?></p>
												<p><i class="fa fa-check-square"></i> Stok : <?php echo $a->stok; ?></p>
												<a href="<?php echo base_url('Welcome/detail/'.$a->id_produk); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Tambah ke keranjang</a>
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
	
	