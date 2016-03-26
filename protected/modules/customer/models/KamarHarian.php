<?php

/**
 * This is the model class for table "kamar_harian".
 *
 * The followings are the available columns in table 'kamar_harian':
 * @property string $id_kamar
 * @property integer $id_kamar_harian
 * @property integer $jumlah
 * @property string $tanggal_awal
 * @property string $tanggal_akhir
 * @property string $harga
 * @property string $harga_promo
 * @property string $deskripsi
 *
 * The followings are the available model relations:
 * @property Kamar $idKamar
 */
class KamarHarian extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kamar_harian';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_kamar, jumlah, tanggal_awal, tanggal_akhir, harga, deskripsi', 'required'),
			array('jumlah', 'numerical', 'integerOnly'=>true),
			array('id_kamar', 'length', 'max'=>13),
			array('harga, harga_promo', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_kamar, id_kamar_harian, jumlah, tanggal_awal, tanggal_akhir, harga, harga_promo, deskripsi', 'safe', 'on'=>'search'),
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
			'idKamar' => array(self::BELONGS_TO, 'Kamar', 'id_kamar'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_kamar' => 'Id Kamar',
			'id_kamar_harian' => 'Id Kamar Harian',
			'jumlah' => 'Jumlah',
			'tanggal_awal' => 'Tanggal Awal',
			'tanggal_akhir' => 'Tanggal Akhir',
			'harga' => 'Harga',
			'harga_promo' => 'Harga Promo',
			'deskripsi' => 'Deskripsi',
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

		$criteria->compare('id_kamar',$this->id_kamar,true);
		$criteria->compare('id_kamar_harian',$this->id_kamar_harian);
		$criteria->compare('jumlah',$this->jumlah);
		$criteria->compare('tanggal_awal',$this->tanggal_awal,true);
		$criteria->compare('tanggal_akhir',$this->tanggal_akhir,true);
		$criteria->compare('harga',$this->harga,true);
		$criteria->compare('harga_promo',$this->harga_promo,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function cekAvailable($checkin, $checkout, $jumlah)
	{
		$criteria = new CDbCriteria;

		// susah banget -.-
		// $criteria->addBetweenCondition($checkin,'tanggal_awal','tanggal_akhir');
		// $criteria->addBetweenCondition($checkout,'tanggal_awal','tanggal_akhir');
		$criteria->addCondition('tanggal_awal <= '."'$checkin'");
		$criteria->addCondition('tanggal_akhir >= '."'$checkout'");
		$criteria->addCondition('jumlah >= '.$jumlah);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KamarHarian the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
