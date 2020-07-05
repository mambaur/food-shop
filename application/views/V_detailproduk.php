
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
													<h4 class="panel-title"><a href="<?php echo base_url('Welcome/katproduk/'.$u->id_kategori); ?>">
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
								
								<span>
									<form action="<?php echo base_url('Keranjang/insert1/'.$a->id_produk.'/'.$a->harga.'/'.$a->berat); ?>" method="post">
									<span>Rp <?php $format_indonesia = number_format ($a->harga, 0, ',', '.');
                          						echo $format_indonesia; ?> </span>
									<label>Jumlah:</label>
									<input type="number" value="1" name="value" min="1" max="<?php echo $a->stok; ?>" />
									<input type="hidden" name="nama_produk" value="<?php echo $a->nama_produk; ?>">
									<input type="hidden" name="gambar" value="<?php echo $a->gambar; ?>">
									<input type="hidden" name="stok" value="<?php echo $a->stok; ?>">
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Beli
									</button>
								</form>
								</span>
								<p><b>Stok:</b> <?php echo $a->stok ?></p>
								<p><b>Berat:</b> <?php echo $a->berat ?> gram</p>
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
