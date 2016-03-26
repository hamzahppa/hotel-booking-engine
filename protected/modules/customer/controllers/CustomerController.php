<?php
session_start();

class CustomerController extends Controller
{
	public $layout = 'reservasi';
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
				'actions'=>array('customer','customers','pesanan','pesanans','edit','rating','berhasil'),
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

	public function actionCustomer($id)
	{
	    $model=new Customer;
	    $modelKamarPesanan=new KamarPesanan;
	    $modelTransaksiPemesanan=new TransaksiPemesanan;
	    $modelKamarHarian=KamarHarian::model()->findByPk($id);

	    // uncomment the following code to enable ajax-based validation
	    /*
	    if(isset($_POST['ajax']) && $_POST['ajax']==='customer-customer-form')
	    {
	        echo CActiveForm::validate($model);
	        Yii::app()->end();
	    }
	    */

	    if(isset($_POST['Customer']))
	    {
	        $model->attributes=$_POST['Customer'];
	        $model->attributes=array(
	        	'id_customer'=>date('Hs').rand(10,99),
	        );
	        if($model->validate())
	        {
	            $model->save();
	            $modelKamarPesanan->attributes = array(
	            	'id_kamar'=>$modelKamarHarian->id_kamar,
	            	'id_kamar_pesanan'=>date('ymdHs'),
	            	'jumlah_kamar_dipesan'=>$_SESSION['jumlah'],
	            );
	            $modelKamarPesanan->save();

	            $checkin = strtotime($_SESSION['checkin']);
	            $checkout = strtotime($_SESSION['checkout']);

	            $diff = $checkout - $checkin;
	            $days = abs($diff/(24*60*60));

	            $totalBayar = $modelKamarHarian->harga * $days * $_SESSION['jumlah'];

	            $modelTransaksiPemesanan->attributes=$_POST['TransaksiPemesanan'];
	            $modelTransaksiPemesanan->attributes = array(
	            	'kode_reservasi'=>$modelKamarHarian->id_kamar.date('mdHs'),
	            	'id_kamar_pesanan'=>$modelKamarPesanan->id_kamar_pesanan,
	            	'id_customer'=>$model->id_customer,
	            	'tanggal_checkin'=>$_SESSION['checkin'],
	            	'tanggal_checkout'=>$_SESSION['checkout'],
	            	'total_pembayaran'=>$totalBayar,
	            	'status'=>'pending',
	            );
	            $modelTransaksiPemesanan->save();
	            $_SESSION['kode_reservasi'] = $modelTransaksiPemesanan->kode_reservasi;
	            echo "Berhasil semua";
	            $this->redirect(array('customer/pesanan',
	            	'id'=>$model->id_customer,
	            	'kode_reservasi'=>$modelTransaksiPemesanan->kode_reservasi,
	            	'id_kamar_harian'=>$id,
	            	'id_kamar_pesanan'=>$modelKamarPesanan->id_kamar_pesanan,
	            ));
	        }
	    }
	    $this->render('customer',array('model'=>$model,'modelTransaksiPemesanan'=>$modelTransaksiPemesanan,'modelKamarHarian'=>$modelKamarHarian));
	}

	public function actionCustomers($id)
	{
	    $model=new Customer;
	    $modelKamarPesanan=new KamarPesanan;
	    $modelTransaksiPemesanan=new TransaksiPemesanan;
	    $modelKamar=Kamar::model()->findByPk($id);

	    // uncomment the following code to enable ajax-based validation
	    /*
	    if(isset($_POST['ajax']) && $_POST['ajax']==='customer-customer-form')
	    {
	        echo CActiveForm::validate($model);
	        Yii::app()->end();
	    }
	    */

	    if(isset($_POST['Customer']))
	    {
	        $model->attributes=$_POST['Customer'];
	        $model->attributes=array(
	        	'id_customer'=>date('Hs').rand(10,99),
	        );
	        if($model->validate())
	        {
	            $model->save();
	            $modelKamarPesanan->attributes = array(
	            	'id_kamar'=>$id,
	            	'id_kamar_pesanan'=>date('ymdHs'),
	            	'jumlah_kamar_dipesan'=>$_SESSION['jumlah'],
	            );
	            $modelKamarPesanan->save();

	            $checkin = strtotime($_SESSION['checkin']);
	            $checkout = strtotime($_SESSION['checkout']);

	            $diff = $checkout - $checkin;
	            $days = abs($diff/(24*60*60));

	            $totalBayar = $modelKamar->harga * $days * $_SESSION['jumlah'];

	            $modelTransaksiPemesanan->attributes=$_POST['TransaksiPemesanan'];
	            $modelTransaksiPemesanan->attributes = array(
	            	'kode_reservasi'=>$id.date('mdHs'),
	            	'id_kamar_pesanan'=>$modelKamarPesanan->id_kamar_pesanan,
	            	'id_customer'=>$model->id_customer,
	            	'tanggal_checkin'=>$_SESSION['checkin'],
	            	'tanggal_checkout'=>$_SESSION['checkout'],
	            	'total_pembayaran'=>$totalBayar,
	            	'status'=>'pending',
	            );
	            $modelTransaksiPemesanan->save();
	            $_SESSION['kode_reservasi'] = $modelTransaksiPemesanan->kode_reservasi;
	            $this->redirect(array('customer/pesanans',
	            	'id'=>$model->id_customer,
	            	'kode_reservasi'=>$modelTransaksiPemesanan->kode_reservasi,
	            	'id_kamar'=>$id,
	            	'id_kamar_pesanan'=>$modelKamarPesanan->id_kamar_pesanan,
	            ));
	        }
	    }
	    $this->render('customers',array('model'=>$model,'modelTransaksiPemesanan'=>$modelTransaksiPemesanan,'modelKamar'=>$modelKamar));
	}

	public function actionEdit($order_id)
	{
		$modelTransaksiPemesanan=TransaksiPemesanan::model()->findByPk($order_id);
		$model=Customer::model()->findByPk($modelTransaksiPemesanan->id_customer);

		if (isset($_POST['Customer'])) 
		{
			$model->attributes=$_POST['Customer'];
			if ($model->validate()) {
				$model->save();

				$modelTransaksiPemesanan->attributes=$_POST['TransaksiPemesanan'];
				$modelTransaksiPemesanan->save();

				$this->redirect(array('customer/pesanans',
					'id'=>$model->id_customer,
	            	'kode_reservasi'=>$modelTransaksiPemesanan->kode_reservasi,
	            	'id_kamar'=>$modelTransaksiPemesanan->idKamarPesanan->id_kamar,
	            	'id_kamar_pesanan'=>$modelTransaksiPemesanan->id_kamar_pesanan,
				));
			}
		}

		$this->render('edit', array(
			'modelTransaksiPemesanan'=>$modelTransaksiPemesanan,
			'model'=>$model,
		));
	}

	public function actionPesanan($id, $kode_reservasi, $id_kamar_harian, $id_kamar_pesanan)
	{
		$modelCustomer=Customer::model()->findByPk($id);
		$modelTransaksiPemesanan=TransaksiPemesanan::model()->findByPk($kode_reservasi);
		$modelKamarHarian=KamarHarian::model()->findByPk($id_kamar_harian);
		$modelKamarPesanan=KamarPesanan::model()->findByPk($id_kamar_pesanan);

		$this->render('pesanan', array(
			'modelCustomer'=>$modelCustomer,
			'modelTransaksiPemesanan'=>$modelTransaksiPemesanan,
			'modelKamarHarian'=>$modelKamarHarian,
			'modelKamarPesanan'=>$modelKamarPesanan,
		));
	}

	public function actionPesanans($id, $kode_reservasi, $id_kamar, $id_kamar_pesanan)
	{
		$modelCustomer=Customer::model()->findByPk($id);
		$modelTransaksiPemesanan=TransaksiPemesanan::model()->findByPk($kode_reservasi);
		$modelKamar=Kamar::model()->findByPk($id_kamar);
		$modelKamarPesanan=KamarPesanan::model()->findByPk($id_kamar_pesanan);

		$this->render('pesanan', array(
			'modelCustomer'=>$modelCustomer,
			'modelTransaksiPemesanan'=>$modelTransaksiPemesanan,
			'modelKamar'=>$modelKamar,
			'modelKamarPesanan'=>$modelKamarPesanan,
		));
	}

	public function actionRating($kode_reservasi)
	{
		$modelRating = new ReviewRating;
		$modelTransaksiPemesanan = TransaksiPemesanan::model()->findByPk($kode_reservasi);

		if (isset($_POST['ReviewRating'])) {
			$modelRating->attributes=$_POST['ReviewRating'];
			$modelRating->attributes=array(
				'id_customer'=>$modelTransaksiPemesanan->id_customer,
				'id_hotel'=>$modelTransaksiPemesanan->idKamarPesanan->idKamar->id_hotel,
			);
			if ($modelRating->save()) {
				$this->redirect(array('customer/berhasil'));
			}
		}

		$this->render('rating', array(
			'modelRating'=>$modelRating,
			'modelTransaksiPemesanan'=>$modelTransaksiPemesanan,
		));
	}

	public function actionBerhasil()
	{
		$notification = 'Terima Kasih telah mengisi review dan rating.';
		$this->render('berhasil', array(
			'notification'=>$notification,
		));
	}

	// public function actionPayment($kode_reservasi)
	// {
	// 	$modelTransaksiPemesanan=TransaksiPemesanan::model()->findByPk($kode_reservasi);

	// 	require_once(dirname(__FILE__) . '/../../../vendor/veritrans-php-master/Veritrans.php');

	// 	Veritrans_Config::$serverKey = 'VT-server-yJRUO_SuweZXzOOXj64v0Xwr';


	// 	// Veritrans_Config::$isProduction = true;

	// 	// Veritrans_Config::$isSanitized = true;

	// 	// Veritrans_Config::$is3ds = true;

	// 	if (Veritrans_Config::$serverKey == '<your server key>') {
	// 		echo "<code>";
	// 		echo "<h4>Please set real server key from sandbox</h4>";
	// 		echo "In file: " . __FILE__;
	// 		echo "<br>";
	// 		echo "<br>";
	// 		echo htmlspecialchars('Veritrans_Config::$serverKey = \'<your server key>\';');
	// 		die();
	// 	}

	// 	$params = array(
	// 		'transaction_details' => array(
	// 			'order_id' => $kode_reservasi,
	// 			'gross_amount' => $modelTransaksiPemesanan->total_pembayaran,
	// 		)
	// 	);

	// 	try {
	// 		// menuju web pembayaran di veritrans
	// 		header('Location: ' . Veritrans_VtWeb::getRedirectionUrl($params));
	// 	} catch (Exception $e) {
	// 		echo $e->getMessage();
	// 	}
	// }

	// public function actionUnfinished($order_id)
	// {
	// 	$modelTransaksiPemesanan = TransaksiPemesanan::model()->findByPk($order_id]);
	// 	$this->render('pembayaran',array(
	// 		'modelTransaksiPemesanan'=>$modelTransaksiPemesanan,
	// 	));
	// }

	// public function actionError()
	// {
	// 	$this->render('error');
	// }

	// public function actionFinished($order_id, $status_code, $transaction_status)
	// {
	// 	$this->render('success');
	// }

	// public function actionNotification()
	// {
	// 	require_once(dirname(__FILE__) . '/../../../vendor/veritrans-php-master/Veritrans.php');

	// 	$notif = new Veritrans_Notification();

	// 	$transaction = $notif->transaction_status;
	// 	$fraud = $notif->fraud_status;

	// 	error_log("Kode reservasi $notif->order_id: " . "transaction status = $transaction, fraud staus = $fraud");

	// 	if ($transaction=='capture') {
	// 		if ($fraud=='challenge') {
	// 			echo $transaction;
	// 			echo "<br/>";
	// 			echo $fraud;
	// 			echo "<br/>";
	// 		}else if ($fraud=='accept') {
	// 			echo $transaction;
	// 			echo "<br/>";
	// 			echo $fraud;
	// 			echo "<br/>";
	// 		}
	// 	}else if ($transaction=='cancel') {
	// 		if ($fraud=='challenge') {
	// 			echo $transaction;
	// 			echo "<br/>";
	// 			echo $fraud;
	// 			echo "<br/>";
	// 		}else if ($fraud=='accept') {
	// 			echo $transaction;
	// 			echo "<br/>";
	// 			echo $fraud;
	// 			echo "<br/>";
	// 		}
	// 	}else if ($transaction=='deny') {
	// 		echo $transaction;
	// 	}
	// }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Hotel the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Customer::model()->findByPk($id);
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
