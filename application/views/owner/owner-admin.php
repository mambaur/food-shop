      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 style="color: #1E7BCB;">Daftar Pegawai (admin)</h2><br>
                  <a href="<?php echo base_url('owner/admin/tambahuser'); ?>"><button class="btn btn-success">Tambah pegawai</button></a>
                  <div class="table-responsive"><br>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #Id User
                          </th>
                          <th>
                            Nama User
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Alamat
                          </th>
                          <th>
                            No telp
                          </th>
                          <th>
                            
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($user as $a) {?>
                        <tr>
                          <td class="font-weight-medium">
                            <?php echo $a->id_user; ?>
                          </td>
                          <td>
                            <?php echo $a->nama_user; ?>
                          </td>
                          <td>
                            <?php echo $a->email; ?>
                          </td>
                          <td>
                            <?php echo $a->alamat; ?>
                          </td>
                          <td>
                            <?php echo $a->no_telp; ?>
                          </td>
                          <td>
                            <center><a href="<?php echo base_url('owner/admin/edituser/'.$a->id_user); ?>"><button type="button" class="btn btn-primary"><i class="menu-icon mdi mdi-pen"></i> Edit</button></a>
                              <a onclick="return confirm_alert(this);" href="<?php echo base_url('owner/admin/hapus_user/'.$a->id_user); ?>"><button type="button" class="btn btn-danger"><i class="menu-icon mdi mdi-delete"></i> Hapus</button></a>
                            </center>

                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
        <!-- content-wrapper ends -->

<!-- Pop up -->
<script type="text/javascript">
  function confirm_alert(node) {
      return confirm("Apakah anda yakin ingin menghapus user?");
  }
</script>