<?php

class DefaultController extends Controller
{
	public $layout = 'index';

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$now=date_create(date('Y-m-d'));
		$add=date_add($now,date_interval_create_from_date_string('90 days'));
		$maxDate=date_format($add,'Y-m-d');

		$this->render('index',array(
			'now'=>$now,
			'add'=>$add,
			'maxDate'=>$maxDate,
		));
	}
}