<?php

/**
 * This is the model class for table "file_hotel".
 *
 * The followings are the available columns in table 'file_hotel':
 * @property string $id_hotel
 * @property integer $id_file_hotel
 * @property string $file_hotel
 *
 * The followings are the available model relations:
 * @property Hotel $idHotel
 */
class FileHotel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'file_hotel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_hotel', 'length', 'max'=>11),
			array('file_hotel', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_hotel, id_file_hotel, file_hotel', 'safe', 'on'=>'search'),
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
			'idHotel' => array(self::BELONGS_TO, 'Hotel', 'id_hotel'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_hotel' => 'Id Hotel',
			'id_file_hotel' => 'Id File Hotel',
			'file_hotel' => 'File Hotel',
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
		$criteria->compare('id_file_hotel',$this->id_file_hotel);
		$criteria->compare('file_hotel',$this->file_hotel,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FileHotel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
