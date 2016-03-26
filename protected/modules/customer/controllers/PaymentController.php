<?php 

class PaymentController extends Controller
{
	public $layout = 'payment';
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
				'actions'=>array('payment','unfinished','error','notification','finished'),
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

	public function actionPayment($kode_reservasi)
	{
		$modelTransaksiPemesanan=TransaksiPemesanan::model()->findByPk($kode_reservasi);

		$checkin = strtotime($modelTransaksiPemesanan->tanggal_checkin);
		$checkout = strtotime($modelTransaksiPemesanan->tanggal_checkout);

		$diff = $checkout - $checkin;
		$days = abs($diff/(24*60*60));

		$quantitydays = $modelTransaksiPemesanan->idKamarPesanan->jumlah_kamar_dipesan*$days;

		require_once(dirname(__FILE__) . '/../../../vendor/veritrans-php-master/Veritrans.php');

		Veritrans_Config::$serverKey = 'VT-server-yJRUO_SuweZXzOOXj64v0Xwr';


		// Veritrans_Config::$isProduction = true;

		// Veritrans_Config::$isSanitized = true;

		// Veritrans_Config::$is3ds = true;

		if (Veritrans_Config::$serverKey == '<your server key>') {
			echo "<code>";
			echo "<h4>Please set real server key from sandbox</h4>";
			echo "In file: " . __FILE__;
			echo "<br>";
			echo "<br>";
			echo htmlspecialchars('Veritrans_Config::$serverKey = \'<your server key>\';');
			die();
		}

		$transaction_details = array(
			'order_id' => $kode_reservasi,
			'gross_amount' => $modelTransaksiPemesanan->total_pembayaran,
		);

		$item_detail = array(
			'id' => $modelTransaksiPemesanan->idKamarPesanan->id_kamar,
			'price' => $modelTransaksiPemesanan->idKamarPesanan->idKamar->harga,
			'quantity'=> $quantitydays,
			'name'=> $modelTransaksiPemesanan->idKamarPesanan->idKamar->jenis_kamar,
		);


		$params = array(
			'transaction_details' => $transaction_details,
			'item_details' => $item_detail,
		);

		try {
			// menuju web pembayaran di veritrans
			header('Location: ' . Veritrans_VtWeb::getRedirectionUrl($params));
		} catch (Exception $e) {
			echo $e->getMessage();
			echo $transaction_details['gross_amount'];
			echo $item_detail['quantity'];
			echo $item_detail['price'];
			print_r($modelTransaksiPemesanan);
		}
	}

	public function actionUnfinished($order_id)
	{
		$modelTransaksiPemesanan = TransaksiPemesanan::model()->findByPk($order_id);
		$this->render('pembayaran',array(
			'modelTransaksiPemesanan'=>$modelTransaksiPemesanan,
		));
	}

	public function actionError()
	{
		$this->render('error');
	}

	public function actionFinished($order_id, $status_code, $transaction_status)
	{
		$modelTransaksiPemesanan=TransaksiPemesanan::model()->findByPk($order_id);
		if ($status_code == 200) {
			$status_code="PAID";
			$this->render('success', array(
				'modelTransaksiPemesanan'=>$modelTransaksiPemesanan,
				'status_code'=>$status_code,
				'$transaction_status'=>$transaction_status,
			));
		}
		else{
			$status_code="PENDING";
			$this->render('success', array(
				'modelTransaksiPemesanan'=>$modelTransaksiPemesanan,
				'status_code'=>$status_code,
				'transaction_status'=>$transaction_status,
			));
		}
	}

	public function actionNotification()
	{
		require_once(dirname(__FILE__) . '/../../../vendor/veritrans-php-master/Veritrans.php');

		$notif = new Veritrans_Notification();

		$transaction = $notif->transaction_status;
		$fraud = $notif->fraud_status;

		error_log("Kode reservasi $notif->order_id: " . "transaction status = $transaction, fraud staus = $fraud");

		if ($transaction=='capture') {
			if ($fraud=='challenge') {
				echo $transaction;
				echo "<br/>";
				echo $fraud;
				echo "<br/>";
			}else if ($fraud=='accept') {
				echo $transaction;
				echo "<br/>";
				echo $fraud;
				echo "<br/>";
			}
		}else if ($transaction=='cancel') {
			if ($fraud=='challenge') {
				echo $transaction;
				echo "<br/>";
				echo $fraud;
				echo "<br/>";
			}else if ($fraud=='accept') {
				echo $transaction;
				echo "<br/>";
				echo $fraud;
				echo "<br/>";
			}
		}else if ($transaction=='deny') {
			echo $transaction;
		}
	}
}

?>