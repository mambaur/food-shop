		<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Produk</td>
							<td class="description"></td>
							<td class="price">Harga</td>
							<td class="quantity">Jumlah</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<?php $total_berat=0; ?>
					<?php foreach($this->cart->contents() as $a){ 
							// $idpesan = $a->pesan_id_pesan;
						$total_berat+=$a['berat']*$a['qty'];
							?>
					<tbody>
						<tr>
							<td class="cart_product">
								<a href=""><img style="width: 110px;height: 110px;" src="<?php echo base_url($a['gambar']); ?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php print $a['name'] ; ?>    (<?php echo $a['berat']*$a['qty']; ?> gram)</a></h4>
								<p>Kode produk : <?php echo $a['id'] ; ?><br>Stok : <?php echo $a['stok']; ?></p>
								
							</td>
							<td class="cart_price">
								<p>Rp <?php $format_indonesia = number_format ($a['price'], 0, ',', '.');
                          			echo $format_indonesia; ?></p>
							</td>
							<td class="cart_quantity">
								<p><?php echo $a['qty'] ; ?></p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">Rp <?php $format_indonesia = number_format ($a['subtotal'], 0, ',', '.');
                         			 echo $format_indonesia; ?></p>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>* Dibawah ini adalah total dari belanjaan anda</h3>
				<p>Harga pengiriman ditentukan berdasarkan jarak lokasi pengiriman dan berat produk </p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<b>Data pengiriman anda:</b>
							</li><br>
							<li>
								Nama :<?php echo $namapengirim; ?>
							</li>
							<li>
								Provinsi :<?php echo $provinsi; ?>
							</li>
							<li>
								Kota :<?php echo $kota; ?>
							</li>
							<li>
								Kecamatan :<?php echo $kecamatan; ?>
							</li>
							<li>
								Desa :<?php echo $desa; ?>
							</li>
							<li>
								Nomor telp :<?php echo $telp; ?>
							</li>
							<li>
								Kode pos :<?php echo $kodepos; ?>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								Kurir :
								<input type="text" disabled value="<?php echo $kurir; ?>">
							</li>
							<li class="single_field">
								Layanan :
								<input type="text" disabled value="<?php echo $layanan; ?>">
							</li>
							<li class="single_field">
								Tarif pengiriman:
								<input type="text" disabled value="Rp <?php $format_indonesia = number_format ($pengiriman, 0, ',', '.');
                         			 							echo $format_indonesia; ?>">
							</li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<?php $totalpesan = $this->cart->total(); ?>
					<div class="total_area">
						<ul>
							<li>Sub total <span>Rp <?php $format_indonesia = number_format ($totalpesan, 0, ',', '.'); echo $format_indonesia; ?></span>
							</li>
							<li>Pengiriman<span>Rp <?php $format_indonesia = number_format ($pengiriman, 0, ',', '.');
                         			 							echo $format_indonesia; ?></span></li>
							<li>Total <span>Rp <?php $format_indonesia = number_format ($totalpesan+$pengiriman, 0, ',', '.');
                         			 							echo $format_indonesia; 
                         			 							$total_pesan = $totalpesan + $pengiriman; ?></span></li>
						</ul>
						<form action="<?php echo base_url('Pesanan/insert_pesan') ; ?>" method="post">
							<input type="hidden" name="namapengirim" value="<?php echo $namapengirim; ?>">
							<input type="hidden" name="provinsi" value="<?php echo $provinsi; ?>">
							<input type="hidden" name="kota" value="<?php echo $kota; ?>">
							<input type="hidden" name="kecamatan" value="<?php echo $kecamatan; ?>">
						 	<input type="hidden" name="desa" value="<?php echo $desa; ?>">
						 	<input type="hidden" name="kodepos" value="<?php echo $kodepos; ?>">
							<input type="hidden" name="kurir" value="<?php echo $kurir; ?>">
							<input type="hidden" name="telp" value="<?php echo $telp; ?>">
							<input type="hidden" name="layanan" value="<?php echo $layanan; ?>">
							<input type="hidden" name="harga_kirim" value="<?php echo $pengiriman; ?>">
							<input type="hidden" name="total_pesan" value="<?php echo $total_pesan; ?>">
							<input type="hidden" name="idpesan" value="<?php echo $idpesan; ?>">
							<!-- <input type="hidden" name="idpesanx" value="<?php echo $idpesanx; ?>"> -->
							<input type="hidden" name="pengiriman" value="<?php echo number_format($pengiriman); ?>"><br>
							<button type="submit" class="btn btn-fefault cart">Selesaikan pesanan</button>
						</form>
							<!-- <a class="btn btn-default update" href="<?php echo base_url('Pesanan/insert_pesan/'.$total_pesan.'/'.$idpesan.'/'.$id.'/'.$idpesanx.'/'.$pengiriman) ; ?>">Selesaikan pesanan</a> -->
							<!-- <a class="btn btn-default check_out" href="pesanan">Pesan</a> -->
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->