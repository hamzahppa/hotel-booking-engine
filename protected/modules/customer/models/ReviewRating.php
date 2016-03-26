<?php

/**
 * This is the model class for table "review_rating".
 *
 * The followings are the available columns in table 'review_rating':
 * @property integer $id_customer
 * @property string $id_hotel
 * @property integer $id_review_rating
 * @property string $review
 * @property integer $rating
 *
 * The followings are the available model relations:
 * @property Customer $idCustomer
 * @property Hotel $idHotel
 */
class ReviewRating extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'review_rating';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_customer, id_hotel, review, rating', 'required'),
			array('id_customer, rating', 'numerical', 'integerOnly'=>true),
			array('id_hotel', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_customer, id_hotel, id_review_rating, review, rating', 'safe', 'on'=>'search'),
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
			'idCustomer' => array(self::BELONGS_TO, 'Customer', 'id_customer'),
			'idHotel' => array(self::BELONGS_TO, 'Hotel', 'id_hotel'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_customer' => 'Id Customer',
			'id_hotel' => 'Id Hotel',
			'id_review_rating' => 'Id Review Rating',
			'review' => 'Review',
			'rating' => 'Rating',
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
		$criteria->compare('id_hotel',$this->id_hotel,true);
		$criteria->compare('id_review_rating',$this->id_review_rating);
		$criteria->compare('review',$this->review,true);
		$criteria->compare('rating',$this->rating);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ReviewRating the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
