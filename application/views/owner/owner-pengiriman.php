
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-market - Data pengiriman</title>

    <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/all.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/invoice.css'); ?>" rel="stylesheet">
    <style type="text/css">
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even) {
          background-color: #dddddd;
        }
    </style>

</head>
<body>  
<div class="container-fluid invoice-container">
    <?php foreach ($kirim as $a) {?>
    <div class="row invoice-header">
        <div class="invoice-col">
            <p><a href="<?php echo base_url('Welcome'); ?>"><img width="60%" src="<?php echo base_url('assets/images/home/logo.png'); ?>" /></a></p>
            <h3>Kode Pengiriman : <?php echo $a->id_kirim; ?></h3>
        </div>
    </div><hr>
    Dibawah ini adalah data pengiriman anda :
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive">
                <table>
                  <tr>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td><?php echo $a->nama_pengirim; ?></td>
                  </tr>
                  <tr>
                    <td>Nomor telepon</td>
                    <td><?php echo $a->telp; ?></td>
                  </tr>
                  <tr>
                    <td>Provinsi</td>
                    <td><?php echo $a->provinsi; ?></td>
                  </tr>
                  <tr>
                    <td>Kota</td>
                    <td><?php echo $a->kabupaten; ?></td>
                  </tr>
                  <tr>
                    <td>Kecamatan</td>
                    <td><?php echo $a->kecamatan; ?></td>
                  </tr>
                  <tr>
                    <td>Desa</td>
                    <td><?php echo $a->desa; ?></td>
                  </tr>
                  <tr>
                    <td>Kodepos</td>
                    <td><?php echo $a->kodepos; ?></td>
                  </tr>
                  <tr>
                    <td>Jenis Layanan</td>
                    <td><?php echo $a->jenis_layanan; ?></td>
                  </tr>
                  <tr>
                    <td>Kurir</td>
                    <td><?php echo $a->kurir; ?></td>
                  </tr>
                  
                </table>
                <?php } ?>
            </div>
        </div>
    </div>
    By : Administrator
    <div class="pull-right btn-group btn-group-sm hidden-print">
        <a href="javascript:window.print()" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        <!-- <a href="dl.php?type=i&amp;id=763834" class="btn btn-default"><i class="fa fa-download"></i> Download</a> -->
    </div>
</div>
</body>
</html>