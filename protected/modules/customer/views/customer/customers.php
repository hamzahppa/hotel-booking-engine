<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $form CActiveForm */
$url = Yii::app()->request->baseUrl.'/images/kamar/';
$file = $modelKamar->fileKamars[0]->file_kamar;
?>

<h4>Reservasi Kamar</h4>
<div class="panel panel-default">
    <div class="panel-heading">
        Informasi Kamar yang ingin dipesan
    </div>
    <div class="panel-body">
        
        <div id="keterangan">

            <div id="gambar">
                <img src="<?php echo $url.$file; ?>">
            </div>
            <table cellspacing="10">
                <tr>
                    <td>Jenis Kamar</td>
                    <td>: <?php echo $modelKamar->jenis_kamar; ?></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>: <?php echo $modelKamar->harga; ?></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td>: <?php echo $modelKamar->deskripsi ?></td>
                </tr>
                <tr>
                    <td>Tgl check in</td>
                    <td><input type='date'  id="myDate" class="form-control" value="<?php echo $_SESSION['checkin']; ?>" readonly /></td>
                </tr>
                <tr>
                    <td>Tgl check out</td>
                    <td><input type='date' id="myDate2" class="form-control" value="<?php echo $_SESSION['checkout']; ?>" readonly /></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        Data Pemesanan
    </div>
        <div class="panel-body">
            <div class="form-horizontal" role="form">
        	<?php $form=$this->beginWidget('CActiveForm', array(
        		'id'=>'customer-customer-form',
        		// Please note: When you enable ajax validation, make sure the corresponding
        		// controller action is handling ajax validation correctly.
        		// See class documentation of CActiveForm for details on this,
        		// you need to use the performAjaxValidation()-method described there.
        		'enableAjaxValidation'=>false,
        	)); ?>

        	<!-- <?php echo $form->errorSummary($model); ?> -->

                    <div class="form-group">
                        <label class='col-md-2 control-label'>
        					<?php echo $form->labelEx($model,'nama'); ?>
                        </label>
                        <div class='col-md-2'>
                           <select name="Customer[gender]" class="form-control">
                            <option value="Tn.">
                                Tn.
                            </option>
                            <option value="Ny.">
                                Ny.
                            </option>
                            <option value="Nn.">
                                Nn.
                            </option>
                           </select>
                        </div>
                        <div class='col-md-6'>
                           <!-- <input type='text'  class="form-control" /> -->
                           <?php echo $form->textField($model,'nama',array('class'=>'form-control', 'required'=>'true')); ?>
                           <?php echo $form->error($model,'nama'); ?>               
                        </div>
                    </div>
                    <div class="form-group">
                        <label class='col-md-2 control-label'>
        					<?php echo $form->labelEx($model,'alamat'); ?>
                        </label>
                        <div class='col-md-8'>
                            <!-- <input type='text'  class="form-control" /> -->
        					<?php echo $form->textField($model,'alamat',array('class'=>'form-control', 'required'=>'true')); ?>
        					<?php echo $form->error($model,'alamat'); ?>
                        </div>

                    </div>                          
            
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="jumlah-kamar">
        				<?php echo $form->labelEx($model,'no_telp'); ?>
                    </label>
                    <div class="col-sm-8">
                    	<!-- <input type="tel" class="form-control" placeholder="080989999"> -->
        				<?php echo $form->textField($model,'no_telp',array('class'=>'form-control', 'required'=>'true')); ?>
        				<?php echo $form->error($model,'no_telp'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="jumlah-kamar">
                    	<?php echo $form->labelEx($model,'email'); ?>
                    </label>
                    <div class="col-sm-8">
                      <!-- <input type="email" class="form-control" placeholder="budi@anduk.com"> -->
        				<?php echo $form->emailField($model,'email',array('class'=>'form-control', 'required'=>'true')); ?>
        				<?php echo $form->error($model,'email'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="jumlah-kamar">
                    	<?php echo $form->labelEx($model,'kewarganegaraan'); ?>
                    </label>
                    <div class="col-sm-8">
                      <!-- <input type="email" class="form-control" placeholder="budi@anduk.com"> -->
        				<?php echo $form->textField($model,'kewarganegaraan',array('class'=>'form-control', 'required'=>'true')); ?>
        				<?php echo $form->error($model,'kewarganegaraan'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="jumlah-kamar">
                        <?php echo $form->labelEx($modelTransaksiPemesanan,'pesanan_lain'); ?>
                    </label>
                    <div class="col-sm-8">
                      <!-- <input type="email" class="form-control" placeholder="budi@anduk.com"> -->
                        <?php echo $form->textArea($modelTransaksiPemesanan,'deskripsi',array('class'=>'form-control', 'required'=>'true', 'rows'=>'5', 'value'=>'Tidak ada')); ?>
                        <?php echo $form->error($modelTransaksiPemesanan,'deskripsi'); ?>
                    </div>
                  </div>
                  <!-- <div class="row buttons">
                  	<?php echo CHtml::submitButton('Submit'); ?>
                  </div> -->
                  <button class="col-sm-offset-11 btn btn3 btn-primary" type="submit">Lanjut</button>
        	<?php $this->endWidget(); ?>
        	</div>
        </div>
</div>