<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 style="color: #1E7BCB;">Tambah Kategori</h4><br>
                  <form action="<?php echo base_url('Admin_controller/A_kategori/tambah_kategori'); ?>" id="main-contact-form" class="contact-form row" name="contact-form" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-12">
                      <input type="text" name="nama_kategori" style="width: 50%;" class="form-control" required="required" placeholder="Nama kategori">
                    </div>       
                    <div class="form-group col-md-12">
                      <input type="submit" name="submit" class="btn btn-primary" value="Tambah">
                    </div>
                  </form><br><br>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #Id kategori
                          </th>
                          <th>
                            Nama kategori
                          </th>
                          <th>
                            
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($kategori as $a) {?>
                        <tr>
                          <td class="font-weight-medium">
                            <?php echo $a->id_kategori; ?>
                          </td>
                          <td>
                            <?php echo $a->nama_kategori; ?>
                          </td>
                          <td>
                            <center><a onclick="return confirm_alert(this);" href="<?php echo base_url('Admin_controller/A_kategori/hapus_kategori/'.$a->id_kategori); ?>"><button type="button" class="btn btn-danger"><i class="menu-icon mdi mdi-delete"></i> Hapus</button></a></center>
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
      return confirm("Apakah anda yakin ingin menghapus kategori?");
  }
</script>