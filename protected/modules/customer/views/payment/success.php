<?php 

?>
<div class="panel panel-default ">
    <?php
        if ($status_code==="PAID") {
            echo "<div class='panel-heading'>";
            echo "<b>Konfirmasi Pembayaran Sedang dalam proses...</b>";
            echo "</div>";
        }
    ?>
</div>
<div class="col-md-3">
    Kode Reservasi : <?php echo $modelTransaksiPemesanan->kode_reservasi; ?>
</div>
<div class="col-md-offset-11">
    Status : <font color="green"><b><?php echo $status_code ?></b></font>

</div>
<section>
    <div class="panel panel-default">
        <div class="panel-heading">
            Detail Pemesanan
        </div>
        <div class="panel-body">
            
            <div id="keterangan">

                
                <table cellspacing="10">
                    <tr>
                        <td>Nama</td>
                        <td>: <?php echo $modelTransaksiPemesanan->idCustomer->nama; ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Kamar</td>
                        <td>: <?php echo $modelTransaksiPemesanan->idKamarPesanan->jumlah_kamar_dipesan; ?></td>
                    </tr>
                    <tr>
                        <td>Tipe Kamar</td>
                        <td>: <?php echo $modelTransaksiPemesanan->idKamarPesanan->idKamar->jenis_kamar; ?></td>
                    </tr>
                    <tr>
                        
                        <td>Total Harga</td>
                        <td>: Rp <?php echo $modelTransaksiPemesanan->total_pembayaran; ?></td>
                    </tr>
                 
                    <tr>
                        <td>Tgl check in</td>
                        <td colspan="2"><input type='date' class="form-control" value="<?php echo $modelTransaksiPemesanan->tanggal_checkin; ?>" /></td>
                    </tr>
                    <tr>
                        <td>Tgl check out</td>
                        <td colspan="2"><input type='date' class="form-control" value="<?php echo $modelTransaksiPemesanan->tanggal_checkout; ?>" /></td>
                    </tr>
                </table>
            </div>

           
        </div>
    </div>
</section>
<section>
    <div class="panel panel-default">
        <div class="panel-heading">
            Detail Hotel
        </div>
        <div class="panel-body">
            <div id="keterangan">
                <table cellspacing="10">
                    <tr>
                        <td>Nama Hotel</td>
                        <td>: <?php echo $modelTransaksiPemesanan->idKamarPesanan->idKamar->idHotel->idHotel->nama ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: <?php echo $modelTransaksiPemesanan->idKamarPesanan->idKamar->idHotel->idHotel->alamat ?></td>
                    </tr>
                    <tr>
                        <td>No Telepon</td>
                        <td>: <?php echo $modelTransaksiPemesanan->idKamarPesanan->idKamar->idHotel->idHotel->no_telp ?></td>
                    </tr>
                </table>
                <br><br><br><br><br><br>
            </div>
            
        </div>
    </div>
</section>