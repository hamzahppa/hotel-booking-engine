<?php

/**
 * This is the model class for table "kamar".
 *
 * The followings are the available columns in table 'kamar':
 * @property string $id_hotel
 * @property string $id_kamar
 * @property string $jenis_kamar
 * @property integer $jumlah_kamar
 * @property string $harga
 * @property string $deskripsi
 * @property integer $ekstra_bed
 * @property string $harga_ekstra_bed
 * @property string $status
 *
 * The followings are the available model relations:
 * @property FileKamar[] $fileKamars
 * @property Admin $idHotel
 * @property KamarHarian[] $kamarHarians
 * @property KamarPesanan[] $kamarPesanans
 */
class Kamar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kamar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_kamar', 'required'),
			array('jumlah_kamar, ekstra_bed', 'numerical', 'integerOnly'=>true),
			array('id_hotel', 'length', 'max'=>11),
			array('id_kamar', 'length', 'max'=>13),
			array('jenis_kamar', 'length', 'max'=>30),
			array('harga, harga_ekstra_bed', 'length', 'max'=>10),
			array('status', 'length', 'max'=>14),
			array('deskripsi', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_hotel, id_kamar, jenis_kamar, jumlah_kamar, harga, deskripsi, ekstra_bed, harga_ekstra_bed, status', 'safe', 'on'=>'search'),
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
			'fileKamars' => array(self::HAS_MANY, 'FileKamar', 'id_kamar'),
			'idHotel' => array(self::BELONGS_TO, 'Admin', 'id_hotel'),
			'kamarHarians' => array(self::HAS_MANY, 'KamarHarian', 'id_kamar'),
			'kamarPesanans' => array(self::HAS_MANY, 'KamarPesanan', 'id_kamar'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_hotel' => 'Id Hotel',
			'id_kamar' => 'Id Kamar',
			'jenis_kamar' => 'Jenis Kamar',
			'jumlah_kamar' => 'Jumlah Kamar',
			'harga' => 'Harga',
			'deskripsi' => 'Deskripsi',
			'ekstra_bed' => 'Ekstra Bed',
			'harga_ekstra_bed' => 'Harga Ekstra Bed',
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

		$criteria->compare('id_hotel',$this->id_hotel,true);
		$criteria->compare('id_kamar',$this->id_kamar,true);
		$criteria->compare('jenis_kamar',$this->jenis_kamar,true);
		$criteria->compare('jumlah_kamar',$this->jumlah_kamar);
		$criteria->compare('harga',$this->harga,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('ekstra_bed',$this->ekstra_bed);
		$criteria->compare('harga_ekstra_bed',$this->harga_ekstra_bed,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function cekAvailable($jumlah)
	{
		$criteria=new CDbCriteria;

		$criteria->addCondition('jumlah_kamar >='.$jumlah);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function findKamar($id)
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id_kamar',$id,true);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kamar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
