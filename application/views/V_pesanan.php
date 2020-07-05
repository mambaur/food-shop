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
					<?php $total_berat=0; ?>
					<?php foreach($cart as $a){  ?>
					<form action="<?php echo base_url('Keranjang/update_krj/'); ?>" method="post">
					<tbody>
						<?php 
						$total_berat+=$a['berat']*$a['qty']; ?>

<input type="hidden" name="cart[<?php echo $a['id'];?>][id]" value="<?php echo $a['id'];?>" />
<input type="hidden" name="cart[<?php echo $a['id'];?>][rowid]" value="<?php echo $a['rowid'];?>" />
<input type="hidden" name="cart[<?php echo $a['id'];?>][name]" value="<?php echo $a['name'];?>" />
<input type="hidden" name="cart[<?php echo $a['id'];?>][price]" value="<?php echo $a['price'];?>" />
<input type="hidden" name="cart[<?php echo $a['id'];?>][gambar]" value="<?php echo $a['gambar'];?>" />
<input type="hidden" name="cart[<?php echo $a['id'];?>][qty]" value="<?php echo $a['qty'];?>" />
<input type="hidden" name="cart[<?php echo $a['id'];?>][stok]" value="<?php echo $a['stok'];?>" />
<input type="hidden" name="cart[<?php echo $a['id'];?>][berat]" value="<?php echo $a['berat'];?>" />
<input type="hidden" name="cart[<?php echo $a['id'];?>][idpesan]" value="<?php echo $a['idpesan'];?>" />
						
						<tr>
							<td class="cart_product">
								<a href=""><img style="width: 110px;height: 110px;" src="<?php echo base_url($a['gambar']); ?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php print $a['name'] ;$x=$a['name']; ?>     (<?php echo $a['berat']*$a['qty']; ?> gram)</a></h4>
								<p>Kode produk : <?php echo $a['id'] ; ?><br>Stok : <?php echo $a['stok']; ?></p>
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
								<a style="color: white;" href="<?php echo base_url('Keranjang/hapus_krj/'.$a['rowid']); ?>"><button type="button" class="btn btn-fefault cart"><i class="fa fa-times"></i></button></a>
								
							</td>
						</tr>
					</tbody>
					<?php } ?>
					
					
				</table>
				<div style="margin-right: 45px;margin-bottom: 10px;text-align: right;">
					<button type="submit" class="btn btn-fefault cart"><i class="fa fa-pencil"></i> Update keranjang</button>
					<button type="button" class="btn btn-fefault cart"><a onclick="return confirm_alert(this);" style="color: white;" href="<?php echo base_url('Keranjang/hapus_krj/all'); ?>"><i class="fa fa-times"></i> Kosongkan keranjang</a></button>
				</div>
				</form>
			</div>
			<?php
				}else{
					echo "<h3>Keranjang Belanja masih kosong</h3>";	
				}	
			?>
			<div class="register-req">
				<p>Isi alamat pengiriman sesuai lokasi anda untuk mengetahui harga pengiriman serta untuk melanjutkan ke proses pemesanan</p>
			</div><!--/register-req-->


				<div class="row">
					<div class="col-sm-3">						
							<h4>Alamat Pengiriman</h4>
								<input class="form-control" type="text" name="namapengirim" id="namapengirim" placeholder="*Nama lengkap anda">
								<br>
								<select class="form-control" name="propinsi_tujuan" id="propinsi_tujuan">
									<option value="" selected="" disabled="">Pilih Provinsi</option>
									<?php $this->load->view('rajaongkir/GetProvince'); ?>
								</select>
								<br>
								<select class="form-control" name="destination" id="destination">
									<option value="" selected="" disabled="">Pilih Kota</option>
								</select>
								<br>
								<input class="form-control" type="text" name="kecamatan" id="kecamatan" placeholder="*Kecamatan">
								<br>
								<input class="form-control" type="text" name="desa" id="desa" placeholder="*Desa">
								<br>
								<input class="form-control" type="number" name="telp" id="telp" placeholder="*Nomor telepon">
								<br>
								<input class="form-control" type="number" name="kodepos" id="kodepos" placeholder="*Kode Pos">


							<!-- <p>Alamat asal default jember</p> -->
							<div style="visibility: hidden;">
								<select class="form-control" name="propinsi_asal" id="propinsi_asal" required="required">
									<!-- <option value="" selected="" disabled="">Pilih Provinsi</option> -->
									<?php $this->load->view('rajaongkir/GetProvince2'); ?>
								</select>
								
								<select class="form-control" name="origin" id="origin">
									<?php $this->load->view('rajaongkir/GetCity'); ?>
								</select>
						</div>
					</div>
					<div class="col-sm-2">
							<h4>Berat (gram)</h4>
								    <input type="text" min="1" name="berat" id="berat" class="form-control" disabled value="<?php 
								    if(empty($total_berat)){
								    	echo 0;
								    }else{
								    	echo $total_berat;
								    }
								    ?>">
								    <br>
								    <select class="form-control" name="courier" id="courier" required="required">
								    	<option value="">Pilih Kurir</option>
								    	<option value="jne">JNE</option>
								    	<option value="pos">POS</option>
								    	<option value="tiki">TIKI</option>
								    </select>
									
								    <button style="width: 100%;height: 50px;" type="button" onclick="tampil_data('data')" class="btn btn-primary">Cek Ongkir</button>
					</div>
					<div class="col-sm-7">
							<h4>Daftar harga pengiriman</h4>
							<div style="border: 1px solid #F0F0E9;height: 300px;">
								"Klik cek ongkir, maka data harga akan muncul disini"
								<ol>
								    <div id="hasil">
								    	
								    </div>
							    </ol>
						    </div><br>
					</div>
				</div>
		</div>
	</section> <!--/#cart_items-->
<!-- <a class="btn btn-primary" href="<?php echo base_url('Pesanan/data'); ?>">Pesan sekarang</a> -->






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
					          url: "Rajaongkir/getCost",
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
					              //$('#tombol_export').show();
					              //$('#hasilReport').show();
					              $("#hasil").html(ajaxData);
					          }
					      });
					  };
				</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/JQuery.min.js"></script>

<script>
$(document).ready(function(){

	$("#propinsi_asal").click(function(){
		$.post("<?php echo base_url(); ?>index.php/Keranjang/getCity/"+$('#propinsi_asal').val(),function(obj){
			$('#origin').html(obj);
		});
			
	});

	$("#propinsi_tujuan").click(function(){
		$.post("<?php echo base_url(); ?>index.php/Keranjang/getCity/"+$('#propinsi_tujuan').val(),function(obj){
			$('#destination').html(obj);
		});
			
	});

	/*
	$("#cari").click(function(){
		$.post("<?php echo base_url(); ?>index.php/rajaongkir/getCost/"+$('#origin').val()+'&dest='+$('#destination').val()+'&berat='+$('#berat').val()+'&courier='+$('#courier').val(),function(obj){
			$('#hasil').html(obj);
		});
	});

	*/

	
});
</script>
<!-- Pop up -->
<script type="text/javascript">
  function confirm_alert(node) {
      return confirm("Apakah anda yakin ingin mengosongkan keranjang?");
  }
</script>

	