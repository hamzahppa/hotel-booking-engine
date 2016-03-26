<?php

/**
 * This is the model class for table "transaksi_pemesanan".
 *
 * The followings are the available columns in table 'transaksi_pemesanan':
 * @property string $kode_reservasi
 * @property integer $id_kamar_pesanan
 * @property integer $id_customer
 * @property string $tanggal_checkin
 * @property string $tanggal_checkout
 * @property string $deskripsi
 * @property string $total_pembayaran
 * @property string $status
 *
 * The followings are the available model relations:
 * @property KamarPesanan $idKamarPesanan
 * @property Customer $idCustomer
 */
class TransaksiPemesanan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transaksi_pemesanan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode_reservasi, id_kamar_pesanan, id_customer, tanggal_checkin, tanggal_checkout, deskripsi, total_pembayaran, status', 'required'),
			array('id_kamar_pesanan, id_customer', 'numerical', 'integerOnly'=>true),
			array('kode_reservasi', 'length', 'max'=>14),
			array('total_pembayaran, status', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('kode_reservasi, id_kamar_pesanan, id_customer, tanggal_checkin, tanggal_checkout, deskripsi, total_pembayaran, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idKamarPesanan' => array(self::BELONGS_TO, 'KamarPesanan', 'id_kamar_pesanan'),
			'idCustomer' => array(self::BELONGS_TO, 'Customer', 'id_customer'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'kode_reservasi' => 'Kode Reservasi',
			'id_kamar_pesanan' => 'Id Kamar Pesanan',
			'id_customer' => 'Id Customer',
			'tanggal_checkin' => 'Tanggal Checkin',
			'tanggal_checkout' => 'Tanggal Checkout',
			'deskripsi' => 'Deskripsi',
			'total_pembayaran' => 'Total Pembayaran',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('kode_reservasi',$this->kode_reservasi,true);
		$criteria->compare('id_kamar_pesanan',$this->id_kamar_pesanan);
		$criteria->compare('id_customer',$this->id_customer);
		$criteria->compare('tanggal_checkin',$this->tanggal_checkin,true);
		$criteria->compare('tanggal_checkout',$this->tanggal_checkout,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('total_pembayaran',$this->total_pembayaran,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TransaksiPemesanan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
