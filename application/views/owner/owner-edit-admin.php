      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <?php foreach ($user as $a) {?>
                  <h4 style="color: #1E7BCB;">Edit Pegawai</h4><br>
                  <form action="<?php echo base_url('owner/admin/editpegawai/'.$a->id_user); ?>" method="post">
                    <input style="width: 50%;" class="form-control" type="text" name="nama" value="<?php echo $a->nama_user; ?>"><br>
                    <input style="width: 50%;" class="form-control" type="email" name="email" value="<?php echo $a->email; ?>"><br>
                    <input style="width: 50%;" class="form-control" type="password" name="password" value="<?php echo $a->password; ?>"><br>
                    <input style="width: 50%;" class="form-control" type="number" name="telp" value="<?php echo $a->no_telp; ?>"><br>
                    <input style="width: 50%;" class="form-control" type="text" name="alamat" value="<?php echo $a->alamat; ?>"><br>
                    <input style="width: 50%;" class="form-control" type="number" name="kodepos" value="<?php echo $a->kode_pos; ?>"><br>  

                    <button type="submit" class="btn btn-success">Submit</button>
                    
                  </form>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
