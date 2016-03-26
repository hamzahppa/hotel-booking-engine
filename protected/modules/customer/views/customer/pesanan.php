<?php 
    $base = $_SERVER["REQUEST_URI"];
?>
<h4>Reservasi Kamar</h4>
<div class="panel panel-default">
    <div class="panel-heading">
        Detail Pemesanan
    </div>
    <div class="panel-body">
        
        <div id="keterangan">
            <h5>Detail Data Customer</h5>
            <table cellspacing="10">
                <tr>
                    <td>Nama</td>
                    <td>: <?php echo $modelCustomer->gender." ".$modelCustomer->nama; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: <?php echo $modelCustomer->alamat; ?></td>
                </tr>
                <tr>
                    <td>Nomor Telp</td>
                    <td>: <?php echo $modelCustomer->no_telp; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>: <?php echo $modelCustomer->email; ?></td>
                </tr>
                <tr>
                    <td>Kewarganegaraan</td>
                    <td>: <?php echo $modelCustomer->kewarganegaraan; ?></td>
                </tr>
               <!--  <tr>
                    <td>Tgl check in</td>
                    <td><input type='date'  id="myDate" class="form-control" value="<?php echo $_SESSION['checkin']; ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Tgl check out</td>
                    <td><input type='date' id="myDate2" class="form-control" value="<?php echo $_SESSION['checkout']; ?>" readonly /></td>
                </tr> -->
            </table>
        </div>

        <div id="keterangan">
            <h5>Detail Pesanan</h5>
            <!-- <div id="gambar">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/theme/img/hotel1.jpg">
            </div> -->
            <table cellspacing="10">
                <tr>
                    <td>Jenis Kamar</td>
                    <td>: <?php echo $modelKamarPesanan->idKamar->jenis_kamar; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Check In</td>
                    <td>: <?php echo $modelTransaksiPemesanan->tanggal_checkin; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Check Out</td>
                    <td>: <?php echo $modelTransaksiPemesanan->tanggal_checkout; ?></td>
                </tr>
                <tr>
                    <td>Jumlah Kamar</td>
                    <td>: <?php echo $modelKamarPesanan->jumlah_kamar_dipesan; ?></td>
                </tr>
                <tr>
                    <td>Total Harga</td>
                    <td>: Rp <?php echo $modelTransaksiPemesanan->total_pembayaran; ?></td>
                </tr>
                <tr>
                    <td>Pesanan Khusus</td>
                    <td>: <?php echo $modelTransaksiPemesanan->deskripsi; ?></td>
                </tr>
               <!--  <tr>
                    <td>Tgl check in</td>
                    <td><input type='date'  id="myDate" class="form-control" value="<?php echo $_SESSION['checkin']; ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Tgl check out</td>
                    <td><input type='date' id="myDate2" class="form-control" value="<?php echo $_SESSION['checkout']; ?>" readonly /></td>
                </tr> -->
            </table>
            <form action="<?php echo Yii::app()->createUrl('customer/customer/edit', array('order_id'=>$modelTransaksiPemesanan->kode_reservasi)); ?>">
                <div class="col-md-1 col-md-offset-8">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
            <form class="form-group" action="<?php echo Yii::app()->createUrl('customer/payment/payment', array('kode_reservasi'=>$modelTransaksiPemesanan->kode_reservasi)); ?>">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Lanjutkan Pembayaran</button>
                </div>
            </form>
        </div>
    </div>
</div>