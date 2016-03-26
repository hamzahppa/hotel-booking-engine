<?php 
	$this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_tampilan',
	)); 
	// print_r($dataProvider);
	$this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProviderKamar,
		'itemView'=>'tampil/_tampilan'
	));
?>