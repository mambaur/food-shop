<div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4 text-gray">#Pesan dari pengunjung</h5>
                  <div class="container">
                    <?php foreach ($tentang as $a) { ?>
                    <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
                        <img class="img-sm rounded-circle mb-4 mb-md-0" src="<?php echo base_url('assets/admin/images/faces/face1.jpg');?>" alt="profile image">
                      <div class="ticket-details col-md-9">
                        <div class="d-flex">
                          <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap"><?php echo $a->nama_tentang; ?></p>
                          <p class="text-primary mr-1 mb-0">[<?php echo $a->id_tentang; ?>]</p>
                          <p class="mb-0 ellipsis"><?php echo $a->judul_tentang; ?></p>
                        </div>
                        <p class="text-gray"><?php echo $a->isi_pesan; ?>
                        </p>
                        <div class="row text-gray d-md-flex d-none">
                          <div class="col-6 d-flex">
                            <small class="mb-0 mr-2 text-muted text-muted"><?php echo $a->email_tentang; ?></small>
                            <small class="mb-0 mr-2 text-muted text-muted col-12"><?php echo $a->tanggal; ?></small>
                            <small class="mb-0 mr-2 text-muted text-muted"><a href="<?php echo base_url('admin/contact/hapus_contact/'.$a->id_tentang); ?>">Delete</a></small>
                            <!-- <small class="Last-responded mr-2 mb-0 text-muted text-muted">2 Days</small> -->
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->