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
												<h4 class="panel-title"><a href="<?php echo base_url('user/home/kategori?id='.$u->id_kategori); ?>">
												<?php echo $u->nama_kategori ; ?> 
												</a></h4>
											</div>
										</div><?php
										}
									?>
							</div>
						</div>
					</div>
					
					<div class="shipping text-center"><!--shipping-->
						<img src="<?php echo base_url('assets/images/home/shipping.jpg'); ?>" alt="" />
					</div>
					
				</div>
			</div>
			
			<div class="col-sm-9 padding-right">
				<div class="product-details">
					<div class="col-sm-5">
						<div class="view-product">
							<img style="object-fit: contain;" src="<?php echo base_url($produk['gambar']) ; ?>" alt="" />
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
							<h2><?= $produk['nama_produk']; ?></h2>
							<p>Kode Produk: <?= $produk['id_produk']; ?></p>
							<img src="<?php echo base_url('assets/images/product-details/rating.png'); ?>" alt="" />
							
							<span>
							<form action="<?= base_url('user/keranjang/insert?id='.$produk['id_produk']); ?>" method="post">
								<span>
								Rp 
								<?php 
									$format_indonesia = number_format ($produk['harga'], 0, ',', '.');
									echo $format_indonesia; 
								?> 
								</span>

								<label>Jumlah:</label>
								<input type="number" value="1" name="value" min="1" max="<?= $produk['stok']; ?>" />

								<button type="submit" class="btn btn-fefault cart">
									<i class="fa fa-shopping-cart"></i>
									Beli
								</button>
							</form>
							</span>
							<p><b>Stok:</b> <?= $produk['stok']; ?></p>
							<p><b>Berat:</b> <?= $produk['berat'];?> gram</p>
							<p><b>Toko:</b> Purnamajati</p>
							<a href=""><img src="<?php echo base_url('assets/images/product-details/share.png'); ?>" class="share img-responsive"  alt="" /></a>
						</div><!--/product-information-->
					</div>
				</div>
				
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
								<p><?= $produk['keterangan']; ?></p>
							</div>
						</div>
						
					</div>
				</div><!--/category-tab-->
				
			</div>
		</div>
	</div>
</section>
