<?php  
$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.rajaongkir.com/basic/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$berat&courier=$courier",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: fbd791dbdaa5ed2f93cd83f0f68887ef"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $data = json_decode($response, true);
}
?>

<?= '
	<h4>Daftar harga pengiriman</h4>
	<div style="border: 1px solid #F0F0E9;height: 300px;">
		<ol>
' ?>

<?php echo $data['rajaongkir']['origin_details']['city_name'];?> ke <?php echo $data['rajaongkir']['destination_details']['city_name'];?> @<?php echo $berat;?>gram Kurir : <?php echo strtoupper($courier); ?>

<?php
 for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
?>
	 <div title="<?php echo strtoupper($data['rajaongkir']['results'][$k]['name']);?>" style="padding:10px;">
	 	
		 <table class="table table-striped">
			 <tr>
				 <th>No.</th>
				 <th>Jenis Layanan</th>
				 <th>ETD</th>
				 <th>Tarif</th>
				 <th></th>
			 </tr>
			 <?php
			 for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {			 
			 ?>
			 <tr>
				<td><?php echo $l+1;?></td>
				<td>
					 <div style="font:bold 16px Arial"><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['service'];?></div>
					 <div style="font:normal 11px Arial"><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['description'];?></div>
				</td>
				<td align="center">&nbsp;<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];?> days</td>
				 <td align="right">

				 	<?php echo number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']);?><input type="hidden" name="h_ongkir" value="<?php echo number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']); ?>"></td>
				<td>
				 	<form action="<?php echo base_url('user/pesanan/data'); ?>" method="post">
					 	<input type="hidden" name="namapengirim" value="<?php echo $namapengirim; ?>">
					 	<input type="hidden" name="kurir" value="<?php echo $courier; ?>">
					 	<input type="hidden" name="harga" value="<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']; ?>">
					 	<input type="hidden" name="provinsi" value="<?php echo $data['rajaongkir']['destination_details']['province']; ?>">
					 	<input type="hidden" name="kota" value="<?php echo $data['rajaongkir']['destination_details']['city_name']; ?>">
					 	<input type="hidden" name="kecamatan" value="<?php echo $kecamatan; ?>">
					 	<input type="hidden" name="desa" value="<?php echo $desa; ?>">
					 	<input type="hidden" name="kodepos" value="<?php echo $kodepos; ?>">
					 	<input type="hidden" name="telp" value="<?php echo $telp; ?>">
					 	<input type="hidden" name="layanan" value="<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['service']; ?>">
					 	<button type="submit" class="btn btn-success">Pilih</button>
				 	</form>
				</td>
			 </tr>
			 <?php
			 }
			 ?>
		 </table>

	 </div>
 <?php
 }
 ?>

 <?= '
	</ol>
	</div>
 ' ?>
 
