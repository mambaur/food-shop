      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 style="color: #1E7BCB;">Tambah Pegawai</h4><br>
                  <form action="<?php echo base_url('owner/admin/insertpegawai'); ?>" method="post">
                    <input style="width: 50%;" class="form-control" type="text" name="nama" placeholder="Nama Pegawai" required="required"><br>
                    <input style="width: 50%;" class="form-control" type="email" name="email" placeholder="Email" required="required"><br>
                    <input style="width: 50%;" class="form-control" type="password" name="password" placeholder="Password" required="required"><br>
                    <input style="width: 50%;" class="form-control" type="number" name="telp" placeholder="Nomor Telepon" required="required"><br>
                    <input style="width: 50%;" class="form-control" type="text" name="alamat" placeholder="Alamat" required="required"><br>
                    <input style="width: 50%;" class="form-control" type="number" name="kodepos" placeholder="Kode Pos" required="required"><br>  

                    <button type="submit" class="btn btn-success">Submit</button>
                  </form>
                  
                </div>
              </div>
            </div>
          </div>


        </div>
        <!-- content-wrapper ends -->
