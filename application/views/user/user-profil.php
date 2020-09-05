<section ><!--form-->
	<div class="container" >
		<h2 style="color: #F7A22A;"><b>Lengkapi Data Anda!</b></h2><hr><br>
		<div class="row">
			<div class="col-sm-6">
				<!--login form-->
				<?php foreach ($user as $a) {?>
				<form action="<?php echo base_url('Profil/updateuser'); ?>" method="post">
					Nama :<br>
					<input style="width: 70%;height: 50px;" class="form-control" type="text" name="nama" value="<?php echo $a->nama_user; ?>" required="required" />
					<!-- Email :<br> -->
					<input style="width: 70%;height: 50px;" class="form-control" type="hidden" value="<?php echo $a->email; ?>" name="email" required="required" /><br>
					Password baru :<br>
					<input style="width: 70%;height: 50px;" class="form-control" type="password" value="" name="password" required="required" /><br>
					No telp :<br>
					<input style="width: 70%;height: 50px;" class="form-control" type="number" value="<?php echo $a->no_telp; ?>" name="telp" required="required" /><br>


			</div>
			<div class="col-sm-6">
					Alamat :<br>
					<input style="width: 70%;height: 50px;" class="form-control" type="text" value="<?php echo $a->alamat; ?>" name="alamat" required="required" /><br>
					Kode pos :<br>
					<input style="width: 70%;height: 50px;" class="form-control" type="text" value="<?php echo $a->kode_pos; ?>" name="kodepos" required="required" /><br>
					<button style="height: 50px;" type="submit" class="btn btn-primary">Perbarui akun</button>
				</form><br><br><br><br>
				<?php } ?>
		</div><!--/login form-->
	</div><hr>
</div>
</section><!--/form--><br><br>