<!-- Pagination css bootstrap -->
<style type="text/css">.pagination{display:inline-block;padding-left:0;margin:20px 0;border-radius:4px}.pagination>li{display:inline}.pagination>li>a,.pagination>li>span{position:relative;float:left;padding:6px 12px;margin-left:-1px;line-height:1.428571429;text-decoration:none;background-color:#fff;border:1px solid #ddd}.pagination>li:first-child>a,.pagination>li:first-child>span{margin-left:0;border-bottom-left-radius:4px;border-top-left-radius:4px}.pagination>li:last-child>a,.pagination>li:last-child>span{border-top-right-radius:4px;border-bottom-right-radius:4px}.pagination>li>a:hover,.pagination>li>span:hover,.pagination>li>a:focus,.pagination>li>span:focus{background-color:#eee}.pagination>.active>a,.pagination>.active>span,.pagination>.active>a:hover,.pagination>.active>span:hover,.pagination>.active>a:focus,.pagination>.active>span:focus{z-index:2;color:#fff;cursor:default;background-color:#428bca;border-color:#428bca}.pagination>.disabled>span,.pagination>.disabled>span:hover,.pagination>.disabled>span:focus,.pagination>.disabled>a,.pagination>.disabled>a:hover,.pagination>.disabled>a:focus{color:#999;cursor:not-allowed;background-color:#fff;border-color:#ddd}.pagination-lg>li>a,.pagination-lg>li>span{padding:10px 16px;font-size:18px}.pagination-lg>li:first-child>a,.pagination-lg>li:first-child>span{border-bottom-left-radius:6px;border-top-left-radius:6px}.pagination-lg>li:last-child>a,.pagination-lg>li:last-child>span{border-top-right-radius:6px;border-bottom-right-radius:6px}.pagination-sm>li>a,.pagination-sm>li>span{padding:5px 10px;font-size:12px}.pagination-sm>li:first-child>a,.pagination-sm>li:first-child>span{border-bottom-left-radius:3px;border-top-left-radius:3px}.pagination-sm>li:last-child>a,.pagination-sm>li:last-child>span{border-top-right-radius:3px;border-bottom-right-radius:3px}.pager{padding-left:0;margin:20px 0;text-align:center;list-style:none}.pager:before,.pager:after{display:table;content:" "}.pager:after{clear:both}.pager:before,.pager:after{display:table;content:" "}.pager:after{clear:both}.pager li{display:inline}.pager li>a,.pager li>span{display:inline-block;padding:5px 14px;background-color:#fff;border:1px solid #ddd;border-radius:15px}.pager li>a:hover,.pager li>a:focus{text-decoration:none;background-color:#eee}.pager .next>a,.pager .next>span{float:right}.pager .previous>a,.pager .previous>span{float:left}.pager .disabled>a,.pager .disabled>a:hover,.pager .disabled>a:focus,.pager .disabled>span{color:#999;cursor:not-allowed;background-color:#fff}.label{display:inline;padding:.2em .6em .3em;font-size:75%;font-weight:bold;line-height:1;color:#fff;text-align:center;white-space:nowrap;vertical-align:baseline;border-radius:.25em}.label[href]:hover,.label[href]:focus{color:#fff;text-decoration:none;cursor:pointer}</style>

<!-- menampilkan data user -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 style="color: #1E7BCB;">Daftar Pengguna</h4><br>
                  <div class="table-responsive">
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
                            <center><a onclick="return confirm_alert(this);" href="<?php echo base_url('admin/user/hapus/'.$a->id_user); ?>"><button type="button" class="btn btn-danger"><i class="menu-icon mdi mdi-delete"></i> Hapus</button></a></center>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <center>
                  <?php 
                    if (isset($links)) {
                            echo $links;
                        } 
                  ?>
                  <center>
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