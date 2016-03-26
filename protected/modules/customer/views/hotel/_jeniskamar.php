<?php 
	
?>

<div id="bot">
	<div class="panel panel-primary">
		<div class="panel-body">
        	<div id="gambar">
        		<img src="">
			</div>

			<div id="keterangan">
				<p>
					<b>
						<?php echo CHtml::encode($data->getAttributeLabel('jenis_kamar')); ?>:
					</b>
					<?php echo CHtml::encode($data->jenis_kamar); ?>
				</p>
				<p>
					<b>
						<?php echo CHtml::encode($data->getAttributeLabel('jumlah_kamar')); ?>:
					</b>
					<?php echo CHtml::encode($data->jumlah_kamar); ?>			
				</p>
				<p>
					<b>
						<?php echo CHtml::encode($data->getAttributeLabel('harga')); ?>:
					</b>
					<?php echo CHtml::encode($data->harga); ?>
				</p>
				<p>
					<b>
						<?php echo CHtml::encode($data->getAttributeLabel('deskripsi')); ?>:
					</b>
					<?php echo CHtml::encode($data->deskripsi); ?>
				</p>
			</div>
			<a href="<?php echo Yii::app()->createUrl('customer/transaksiPemesanan/pesan', array('id'=>$data->id_kamar,)) ?>"><button class="btn btn3 btn-primary">Reservasi</button></a>
		</div>
	</div>
</div>