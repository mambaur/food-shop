
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-market - Bukti pemesanan</title>

    <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/all.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/invoice.css'); ?>" rel="stylesheet">

</head>
<body>  
<div class="container-fluid invoice-container">

    <div class="row invoice-header">
        <div class="invoice-col">
            <p><a href="<?php echo base_url('Welcome'); ?>"><img width="60%" src="<?php echo base_url('assets/images/home/logo.png'); ?>" /></a></p>
            <h3>Kode Pesan : <?php echo $idpesan; ?></h3>
        </div>
        
        <div class="invoice-col text-center">
             <div class="invoice-status">
                <!-- <span class="paid">Paid</span> -->
                <span class="unpaid">Unpaid</span>
            </div>
        </div>
    </div><hr>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><strong>Produk yang di pesan</strong></h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <td><strong>Produk</strong></td>
                            <td width="20%" class="text-center"><strong>Jumlah</strong></td>
                        </tr>
                    </thead>
                    <tbody>    
                        <?php foreach($inv as $a){ ?> 
                        <tr>
                            <td><?php echo $a->nama_produk; ?></td>
                            <td class="text-center"><?php echo $a->total; ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td>Pengiriman</td>
                            <td class="text-center"><?php echo $pengiriman; ?> </td>
                        </tr>
                        <tr>
                            <td class="total-row text-right"><strong>Total</strong></td>
                            <td class="total-row text-center"><?php echo $total2; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <p>* Terimakasih telah berbelanja di E-market.</p>

    <div class="pull-right btn-group btn-group-sm hidden-print">
        <a href="javascript:window.print()" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        <a href="dl.php?type=i&amp;id=763834" class="btn btn-default"><i class="fa fa-download"></i> Download</a>
    </div>
</div>

<p class="text-center hidden-print"><a href="<?php echo base_url('Welcome') ; ?>">&laquo; Kembali ke Beranda</a></a></p>
</body>
</html>