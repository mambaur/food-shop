<section id="cart_items">
	<div class="container">
		<div class="review-payment">
			<h2>Keranjang belanjaan produk anda</h2>
		</div>
		<?php if ($cart = $this->cart->contents()){ ?>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Produk</td>
						<td class="description"></td>
						<td class="price">Harga</td>
						<td class="quantity">Jumlah</td>
						<td class="total">Total</td>
						<td ></td>
					</tr>
				</thead>
				<?php 
				$total_berat=0;
				foreach($cart as $a){  
				?>
				<form action="<?= base_url('user/keranjang/update/'); ?>" method="post">
				<tbody>
					<?php 
					$total_berat+=$a['berat']*$a['qty']; ?>

					<input type="hidden" name="cart[<?= $a['id'];?>][id]" value="<?= $a['id'];?>" />
					<input type="hidden" name="cart[<?= $a['id'];?>][rowid]" value="<?= $a['rowid'];?>" />
					<input type="hidden" name="cart[<?= $a['id'];?>][name]" value="<?= $a['name'];?>" />
					<input type="hidden" name="cart[<?= $a['id'];?>][price]" value="<?= $a['price'];?>" />
					<input type="hidden" name="cart[<?= $a['id'];?>][gambar]" value="<?= $a['gambar'];?>" />
					<input type="hidden" name="cart[<?= $a['id'];?>][qty]" value="<?= $a['qty'];?>" />
					<input type="hidden" name="cart[<?= $a['id'];?>][stok]" value="<?= $a['stok'];?>" />
					<input type="hidden" name="cart[<?= $a['id'];?>][berat]" value="<?= $a['berat'];?>" />
					<input type="hidden" name="cart[<?= $a['id'];?>][idpesan]" value="<?= $a['idpesan'];?>" />
					
					<tr>
						<td class="cart_product">
							<a href=""><img style="width: 110px;height: 110px;" src="<?= base_url($a['gambar']); ?>" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href=""><?php print $a['name'] ;$x=$a['name']; ?>     (<?= $a['berat']*$a['qty']; ?> gram)</a></h4>
							<p>Kode produk : <?= $a['id'] ; ?><br>Stok : <?= $a['stok']; ?></p>
						</td>
						<td class="cart_price">
							<p>Rp <?php $format_indonesia = number_format ($a['price'], 0, ',', '.');
											echo $format_indonesia; ?> </p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<input class="cart_quantity_input" type="number" name="cart[<?php echo $a['id'];?>][qty]" value="<?php echo $a['qty'] ; ?>" autocomplete="off" style="width: 50px;" min="1" max="<?php echo $a['stok']; ?>">
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">Rp <?php $format_indonesia = number_format ($a['subtotal'], 0, ',', '.');
											echo $format_indonesia; ?></p>
						</td>
						<td class="">
							<a style="color: white;" href="<?php echo base_url('user/keranjang/hapus/'.$a['rowid']); ?>"><button type="button" class="btn btn-fefault cart"><i class="fa fa-times"></i></button></a>
							
						</td>
					</tr>
				</tbody>
				<?php } ?>
			</table>

			<div style="margin-right: 45px;margin-bottom: 10px;text-align: right;">
				<button type="submit" class="btn btn-fefault cart"><i class="fa fa-pencil"></i> Update keranjang</button>
				<button type="button" class="btn btn-fefault cart"><a onclick="return confirm_alert(this);" style="color: white;" href="<?php echo base_url('user/keranjang/hapus/all'); ?>"><i class="fa fa-times"></i> Kosongkan keranjang</a></button>
			</div>
			</form>
		</div>

		<div class="register-req">
			<p>Isi alamat pengiriman sesuai lokasi anda untuk mengetahui harga pengiriman serta untuk melanjutkan ke proses pemesanan</p>
		</div>

									
		<h4>Alamat Pengiriman</h4>
		<div class="row">
			<div class="col-sm-6">
			
				<input class="form-control" type="text" name="namapengirim" id="namapengirim" placeholder="*Nama lengkap anda"><br>

				<select class="form-control" name="propinsi_tujuan" id="propinsi_tujuan">
					<option value="" selected="" disabled="">Pilih Provinsi</option>
					<?php $this->load->view('rajaongkir/GetProvince'); ?>
				</select><br>

				<select class="form-control" name="destination" id="destination">
					<option value="" selected="" disabled="">Pilih Kota</option>
				</select><br>

				<input class="form-control" type="text" name="kecamatan" id="kecamatan" placeholder="*Kecamatan"><br>
				<input class="form-control" type="text" name="desa" id="desa" placeholder="*Desa">

				<!-- Alamat asal default jember -->
				<div style="display:none;">
					<select class="form-control" name="propinsi_asal" id="propinsi_asal" required="required">
						<?php $this->load->view('rajaongkir/GetProvince2'); ?>
					</select>
					
					<select class="form-control" name="origin" id="origin">
						<?php $this->load->view('rajaongkir/GetCity'); ?>
					</select>
				</div>
			</div>
			<div class="col-sm-6">
				<input class="form-control" type="number" name="telp" id="telp" placeholder="*Nomor telepon"><br>
				<input class="form-control" type="number" name="kodepos" id="kodepos" placeholder="*Kode Pos"><br>
				<input type="text" min="1" name="berat" id="berat" class="form-control" disabled value="<?php 
				if(empty($total_berat)){
					echo 0;
				}else{
					echo $total_berat;
				}
				?>"><br>
				<select class="form-control" name="courier" id="courier" required="required">
					<option value="">Pilih Kurir</option>
					<option value="jne">JNE</option>
					<option value="pos">POS</option>
					<option value="tiki">TIKI</option>
				</select>
			</div>
		</div>
		<button style="width: 100%;height: 50px;" type="button" onclick="tampil_data('data')" class="btn btn-primary">Pilih Kurir Ongkir</button><br><br>
		<div>
			<div id="hasil"></div>
		</div><br>
		<?php
			}else{
				echo "<h3>Keranjang Belanja masih kosong</h3><br><br>";	
			}	
		?>
	</div>

</section>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/JQuery.min.js"></script>
<script>
	function tampil_data(act){
		var w = $('#origin').val();
		var x = $('#destination').val();
		var y = $('#berat').val();
		var z = $('#courier').val();
		var a = $('#namapengirim').val();
		var b = $('#kecamatan').val();
		var c = $('#desa').val();
		var d = $('#kodepos').val();
		var e = $('#telp').val();

		$.ajax({
			url: "<?= base_url(); ?>user/rajaongkir/getCost",
			type: "GET",
			data : {
			origin: w, 
			destination: x, 
			berat: y, 
			courier: z, 
			namapengirim: a, 
			kecamatan:b, 
			desa:c ,
			kodepos:d, 
			telp:e
			},
			success: function (ajaxData){
				$("#hasil").html(ajaxData);
			}
		});
	};
</script>

<script>
$(document).ready(function(){

	$("#propinsi_asal").click(function(){
		$.post("<?= base_url(); ?>user/keranjang/getCity/"+$('#propinsi_asal').val(),function(obj){
			$('#origin').html(obj);
		});
			
	});

	$("#propinsi_tujuan").click(function(){
		$.post("<?php echo base_url(); ?>user/keranjang/getCity/"+$('#propinsi_tujuan').val(),function(obj){
			$('#destination').html(obj);
		});
			
	});
});

function confirm_alert(node) {
	return confirm("Apakah anda yakin ingin mengosongkan keranjang?");
}
</script>

	