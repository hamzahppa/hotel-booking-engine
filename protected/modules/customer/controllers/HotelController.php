<?php
session_start();

class HotelController extends Controller
{
	public $layout = 'hasil';
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	// public $layout='hasil';

	/**
	 * @return array action filters
	 */
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
				'actions'=>array('hasil','index'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	// kondisi pencarian belum
	public function actionHasil($checkin, $checkout, $jumlah)
	{
		$_SESSION["checkin"] = $checkin;
		$_SESSION["checkout"] = $checkout;
		$_SESSION["jumlah"] = $jumlah;

		if ($checkin < $checkout and $jumlah>0) {
			$modelKamarHarian = new KamarHarian('search');
			$modelKamarHarian->unsetAttributes();
			$dataProvider = $modelKamarHarian->cekAvailable($checkin, $checkout, $jumlah);
			if ($dataProvider->totalItemCount < 1) {
				$modelKamar = new Kamar('search');
				$modelKamar->unsetAttributes();
				$dataProviderKamar = $modelKamar->cekAvailable($jumlah);
				$this->render('hasil2', array('dataProviderKamar'=>$dataProviderKamar));
				// echo "cari di kamar";
			}else{
				$modelKamar = new Kamar('search');
				$modelKamar->unsetAttributes();
				$dataProviderKamar = $modelKamar->cekAvailable($jumlah);
				$this->render('hasil', array(
					'dataProvider'=>$dataProvider,
					'dataProviderKamar'=>$dataProviderKamar,
				));
			}
		}else{
			$this->redirect(array(
				'//customer',
			));
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Hotel the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Hotel::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Hotel $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='hotel-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
