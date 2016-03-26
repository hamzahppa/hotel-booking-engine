<?php 
	// $arrayRating = $data->idHotel->idHotel->reviewRatings;
	// $jml = 0;
	// $arrayLength = count($arrayRating);
	// for ($i=0; $i < $arrayLength; $i++) { 
	// 	$jml = $jml+$arrayRating[$i]->rating;
	// }
	// $avgJml = $jml/$arrayLength;
?>
	<div class="panel panel-primary">
		<div class="panel-body">
			<div id="gambar">
				<img src="<?php echo Yii::app()->request->baseUrl ?>/images/kamar/
				<?php  
					$array = $data->fileKamars;
					for ($i=0; $i < count($array); $i++) { 
						echo $array[0]->file_kamar;
					}
				?>">
			</div>

			<div id="keterangan">
				<p>
					<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_kamar')); ?>:</b>
					<?php echo CHtml::encode($data->jenis_kamar); ?>
				</p>
				<p>
					<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_tersedia')); ?>:</b>
					<?php echo CHtml::encode($data->jumlah_kamar); ?>
				</p>
				<p>
					<b><?php echo CHtml::encode($data->getAttributeLabel('harga')); ?>:</b>
					Rp <?php echo CHtml::encode($data->harga); ?>
				</p>
				<p>
					<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
					<?php echo CHtml::encode($data->deskripsi); ?>
				</p>
			</div>
			<a href="<?php echo Yii::app()->createUrl('customer/customer/customers', array('id'=>$data->id_kamar)); ?>"><button class="col-sm-offset-10 btn btn3 btn-primary">Reservasi</button></a>
		</div>
	</div>