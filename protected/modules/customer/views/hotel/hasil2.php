<?php 
	$this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProviderKamar,
		'itemView'=>'tampil/_tampilan'
	));
?>