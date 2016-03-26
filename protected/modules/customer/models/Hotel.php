<?php

/**
 * This is the model class for table "hotel".
 *
 * The followings are the available columns in table 'hotel':
 * @property string $id_hotel
 * @property string $nama
 * @property string $alamat
 * @property string $no_telp
 * @property string $email
 * @property string $deskripsi
 * @property string $status
 *
 * The followings are the available model relations:
 * @property Admin[] $admins
 * @property FileHotel[] $fileHotels
 * @property ReviewRating[] $reviewRatings
 */
class Hotel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hotel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_hotel', 'required'),
			array('id_hotel, status', 'length', 'max'=>11),
			array('nama, email', 'length', 'max'=>50),
			array('alamat', 'length', 'max'=>100),
			array('no_telp', 'length', 'max'=>12),
			array('deskripsi', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_hotel, nama, alamat, no_telp, email, deskripsi, status', 'safe', 'on'=>'search'),
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
			'admins' => array(self::HAS_MANY, 'Admin', 'id_hotel'),
			'fileHotels' => array(self::HAS_MANY, 'FileHotel', 'id_hotel'),
			'reviewRatings' => array(self::HAS_MANY, 'ReviewRating', 'id_hotel'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_hotel' => 'Id Hotel',
			'nama' => 'Nama',
			'alamat' => 'Alamat',
			'no_telp' => 'No Telp',
			'email' => 'Email',
			'deskripsi' => 'Deskripsi',
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
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('no_telp',$this->no_telp,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Hotel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
