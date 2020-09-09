<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-cube text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total Revenue</p>
                      <div class="fluid-container">
                        
                        <?php foreach ($total as $a) { ?>
                        <h4 class="font-weight-medium text-right mb-0">Rp <?php
                          $format_indonesia = number_format ($a->totalMasuk, 0, ',', '.');
                          echo $format_indonesia;?>
                        </h4>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total pemasukan
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total pesanan</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $order; ?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Jumlah semua transaksi pesan
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-message-text text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Kontak</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $kontak; ?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Pengguna yang menghubungi anda
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Users</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo $user; ?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Jumlah total semua pengguna
                  </p>
                </div>
              </div>
            </div>
          </div>


        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Daftar pesanan pelanggan 
                    <div style="float: right;margin-right: 30px;">
                      <form action="<?php echo base_url('admin/beranda/cari'); ?>" method="post">
                        <input style="height: 25px;" type="text" name="cari" placeholder="#Kode pesan" required="required">
                        <button type="submit" style="height: 25px">Cari</button>
                      </form>
                    </div>
                  </h3>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            Kode pesan
                          </th>
                          <th>
                            Nama pelanggan
                          </th>
                          <th>
                            Total
                          </th>
                           <th>
                            Status
                          </th>
                          <th>
                            
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($pesan as $a){ ?>
                        <tr>
                          <td class="font-weight-medium">
                            <h4 style="padding-left: 7px;"><?php echo $a->id_pesan; ?></h4>
                          </td>
                          <td class="font-weight-medium">
                            <h4 style="padding-left: 7px;"><?php echo $a->nama_user; ?>
                              
                            </h4>
                          </td>
                          <td>
                            <h4>Rp <?php $format_indonesia = number_format ($a->total_pesan, 0, ',', '.');
                          echo $format_indonesia; ?></h4>
                          </td>
                          <td>
                              <?php 
                              if ($a->status=='Proses') {
                                echo '<a onclick="return confirm_alert(this);" href="'.base_url('admin/beranda/status/'.$a->id_pesan).'"><button type="button" class="btn">'.$a->status.'</button></a>';
                              }elseif ($a->status=='Batal') {
                                echo '<button type="button" class="btn btn-danger">'.$a->status.'</button>';
                              }else{
                                echo '<button type="button" class="btn btn-success">'.$a->status.'</button>';
                              }
                              ?>
                          </td>
                          <td>
                            <form target="_blank" action="<?php echo base_url('admin/beranda/detail'); ?>" method="post">
                                <input type="hidden" name="idpesan" value="<?php echo $a->id_pesan;?>">
                                <input type="hidden" name="harga_kirim" value="<?php echo $a->harga_kirim;?>">
                                <input type="hidden" name="total_pesan" value="<?php echo $a->total_pesan;?>">
                                <input type="hidden" name="iduser" value="<?php echo $a->user_id_user;?>">
                                <input type="hidden" name="kode_pos" value="<?php echo $a->kodepos;?>">
                                <input type="hidden" name="status" value="<?php echo $a->status; ?>">
                                <button type="submit" class="btn btn-primary">Lihat detail transaksi</button>
                            </form><br>
                            <a target="_blank" href="<?php echo base_url('admin/beranda/pengiriman/'.$a->id_kirim); ?>">Lihat data pengiriman</a>
                            
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
<script type="text/javascript">
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e){
      // tambahkan 'Rp.' pada saat form di ketik
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
 
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split       = number_string.split(','),
      sisa        = split[0].length % 3,
      rupiah        = split[0].substr(0, sisa),
      ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
 
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
 
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

<!-- Pop up -->
<script type="text/javascript">
  function confirm_alert(node) {
      return confirm("Apakah anda yakin ingin mengganti status menjadi terbayar?");
  }
</script>