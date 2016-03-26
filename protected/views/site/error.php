<div class="alert alert-danger fade in" role="alert">
  <h4>Maaf! Error - <?php echo $code; ?></h4>
    <div class="error">
    <?php echo CHtml::encode($message); ?>
    </div>
  <p>Halaman tidak dapat diakses... Silahkan kembali ke Home.</p>
  <p>
    
    <a href="<?php echo Yii::app()->createUrl('customer'); ?>"><button type="button" class="btn btn-default">Home</button></a>
  </p>
</div>
