<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 style="color: #1E7BCB;">Bukti Pembayaran</h4><br>
                  
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #Id Bayar
                          </th>
                          <th>
                            <center>#Kode_pesan</center>
                          </th>
                          <th>
                            <center>Nama pemilik rekening</center>
                          </th>
                          <th>
                            <center>Bank</center>
                          </th>
                          <th>
                            <center>Gambar</center>
                          </th>
                          <th>
                            <center></center>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($bukti as $a) {?>
                        <tr>
                          <td class="font-weight-medium">
                            <?= $a->id_bayar; ?>
                          </td>
                          <td>
                            <?= $a->kode_pesan; ?>
                          </td>
                          <td>
                            <?= $a->nama_pemilik; ?>
                          </td>
                          <td>
                            <?= $a->bank; ?>
                          </td>
                          <td>
                            <center><a target="_blank" href="<?= base_url($a->bukti_pembayaran); ?>"><img src="<?= base_url($a->bukti_pembayaran); ?>"></a></center>
                          </td>
                          <td>
                            <center><a onclick="return confirm_alert(this);" href="<?php echo base_url('owner/bukti/delete_bukti/'.$a->id_bayar); ?>"><button type="button" class="btn btn-danger">Hapus</button></a></center>
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
        
<!-- Pop up -->
<script type="text/javascript">
  function confirm_alert(node) {
      return confirm("Apakah anda yakin ingin menghapus?");
  }
</script>