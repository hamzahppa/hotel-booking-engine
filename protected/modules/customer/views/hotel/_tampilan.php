	<div class="panel panel-primary">
		<div class="panel-body">
			<div id="gambar">
				<img src="<?php echo Yii::app()->request->baseUrl ?>/assets/theme/img/hotel1.jpg">
			</div>

			<div id="keterangan">
				<p>
					<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_kamar')); ?>:</b>
					<?php echo CHtml::encode($data->idKamar->jenis_kamar); ?>
				</p>
				<p>
					<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_tersedia')); ?>:</b>
					<?php echo CHtml::encode($data->jumlah); ?>
				</p>
				<p>
					<b><?php echo CHtml::encode($data->getAttributeLabel('harga')); ?>:</b>
					Rp <?php echo CHtml::encode($data->harga); ?>
				</p>
				<p>
					<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
					<?php echo CHtml::encode($data->deskripsi); ?>
				</p>
				<p>
					<b>
						<?php 
							// echo CHtml::encode($data->getAttributeLabel('deskripsi'));
						?>
					</b>
					<?php 
						// echo CHtml::encode($data->idKamar->fileKamars[0]->file_kamar);
					?>
				</p>
				<?php 
				// echo count($data->idKamar->fileKamars); ?>
			</div>
			<a href="<?php echo Yii::app()->createUrl('customer/customer/customer', array('id'=>$data->id_kamar_harian)); ?>"><button class="col-sm-offset-10 btn btn3 btn-primary">Reservasi</button></a>
		</div>
	</div>