<?php
/* @var $this ReviewRatingController */
/* @var $modelRating ReviewRating */
/* @var $form CActiveForm */
?>
<h4>Rating dan Review</h4>
<div class="panel panel-default">
    <div class="panel-heading">
        Rating dan Review Kamar yang telah dipesan
    </div>
    <div class="panel-body">
        <div class="form-horizontal" role="form">

        <?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'review-rating-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'enableAjaxValidation'=>false,
		)); ?>

		<!-- <?php echo $form->errorSummary($modelRating); ?> -->

		<div class="form-group">
			<p class="col-sm-1 col-sm-offset-1">Rating<p>
			<div class="score col-sm-4">
				<?php $this->widget('CStarRating',array(
			                      'model'=>$modelRating,
			                      'attribute'=>'rating',
			                      'minRating'=>1,
			                      'maxRating'=>5,
			                      'starCount'=>5,
			                      'readOnly'=>false,
			                    )); ?>
				<?php echo $form->error($modelRating,'rating'); ?>
			</div>
			<br>
		</div>

		<div class="form-group">
			<p class="col-sm-1 col-sm-offset-1 ">Komentar</p>
			<div class="col-sm-8">
				<?php echo $form->textArea($modelRating,'review',array('class'=>'form-control', 'rows'=>7, 'required'=>'true')); ?>
				<?php echo $form->error($modelRating,'review'); ?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-10">
				<button class="btn btn-primary ">Kirim
				<?php ($modelRating->isNewRecord ? 'Create' : 'Save'); ?>
				</button>
			</div>
		</div>

		<?php $this->endWidget(); ?>

        <!-- <div class="form-group asu">
            <p class="col-sm-1 col-sm-offset-1">Rating</p>
            <fieldset class="score col-sm-4">
              
              <input type="radio" id="score-5" name="score" value="5"/>
              <label title="5 stars" for="score-5">5 stars</label>
              
              <input type="radio" id="score-4" name="score" value="4"/>
              <label title="4 stars" for="score-4">4 stars</label>
              
              <input type="radio" id="score-3" name="score" value="3"/>
              <label title="3 stars" for="score-3">3 stars</label>
              
              <input type="radio" id="score-2" name="score" value="2"/>
              <label title="2 stars" for="score-2">2 stars</label>
              
              <input type="radio" id="score-1" name="score" value="1"/>
              <label title="1 stars" for="score-1">1 stars</label>
              
            </fieldset>
        </div> -->

	        <!-- <div class="form-group">
	            <p class="col-sm-1 col-sm-offset-1 ">Komentar</p>
	            <div class="col-sm-8">
	            <textarea class="form-control" rows="7"></textarea>
	            </div>
	        </div>
	        <br>
	        <div class="form-group">
	            <div class="col-sm-offset-10">
	            	<a href="#"><button class="btn btn-primary "> kirim </button></a>
	            </div>
	        </div> -->
       </div>
    </div>
</div>