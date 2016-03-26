<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property integer $id_customer
 * @property string $nama
 * @property string $gender
 * @property string $alamat
 * @property string $no_telp
 * @property string $email
 * @property string $kewarganegaraan
 *
 * The followings are the available model relations:
 * @property ReviewRating[] $reviewRatings
 * @property TransaksiPemesanan[] $transaksiPemesanans
 */
class Customer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, gender, alamat, no_telp, email, kewarganegaraan', 'required'),
			array('nama, alamat, email', 'length', 'max'=>50),
			array('gender', 'length', 'max'=>5),
			array('no_telp', 'length', 'max'=>13),
			array('kewarganegaraan', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_customer, nama, gender, alamat, no_telp, email, kewarganegaraan', 'safe', 'on'=>'search'),
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
			'reviewRatings' => array(self::HAS_MANY, 'ReviewRating', 'id_customer'),
			'transaksiPemesanans' => array(self::HAS_MANY, 'TransaksiPemesanan', 'id_customer'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_customer' => 'Id Customer',
			'nama' => 'Nama',
			'gender' => 'Gender',
			'alamat' => 'Alamat',
			'no_telp' => 'No Telp',
			'email' => 'Email',
			'kewarganegaraan' => 'Kewarganegaraan',
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

		$criteria->compare('id_customer',$this->id_customer);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('no_telp',$this->no_telp,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('kewarganegaraan',$this->kewarganegaraan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Customer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
