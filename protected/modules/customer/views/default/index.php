<?php
?>
<div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Pencarian Kamar</h3>
        </div>

        <div class="panel-body">
          <form class="form-horizontal" role="form" action="<?php echo Yii::app()->createUrl('customer/hotel/hasil') ?>">
            <div class="form-group">
              <label class='col-md-2 control-label'>
                Check in
              </label>
                <div class='col-md-4'>
                  <!-- <input type='date'  class="form-control" /> -->
                  <?php 
					$this->widget('zii.widgets.jui.CJuiDatePicker',array(
						'name'=>'checkin',
						'language'=>'id',
						// 'themeUrl'=>Yii::app()->baseUrl.'/assets/theme/js',
						// 'cssFile'=>'jquery-1.11.0.js',
						'options'=>array(
							'dateFormat'=>'yy-mm-dd',
							'minDate'=>date('Y-m-d'),
							'maxDate'=>$maxDate,
							),
						'htmlOptions'=>array(
							'style'=>'auto;',
							'class'=>'form-control',
							'placeholder'=>'Check In',
							'required'=>'true',
							),
						));
					?>
                </div>
              <label class='col-md-2 control-label'>
                Check out
              </label>
                <div class='col-md-4'>
                  <!-- <input type='date'  class="form-control" /> -->
				<?php 
					$this->widget('zii.widgets.jui.CJuiDatePicker',array(
						'name'=>'checkout',
						'language'=>'id',
						// 'themeUrl'=>Yii::app()->baseUrl.'/assets/theme/js',
						// 'cssFile'=>'jquery-1.11.0.js',
						'options'=>array(
							'dateFormat'=>'yy-mm-dd',
							'minDate'=>date('Y-m-d'),
							'maxDate'=>$maxDate,
							),
						'htmlOptions'=>array(
							'style'=>'auto;',
							'class'=>'form-control',
							'placeholder'=>'Check Out',
							'required'=>'true',
							),
						));
					?>
                </div>
            </div>					   		
            
            <div class="form-group">
              <label class="col-sm-2 control-label" for="jumlah-kamar">Jumlah Kamar</label>
              <div class="col-sm-4">
                <input type="number" min="1" max="99"  class="form-control" name="jumlah" id="jumlah-kamar" placeholder="Jumlah" required>
              </div>
            </div>
	          <div class="form-group">
	            <div class="col-md-3 col-md-offset-9">
	            	<button class="btn btn-primary btn-block" type="submit">Cari</button>
	            </div>
	          </div>
          </form>

        </div>
</div>