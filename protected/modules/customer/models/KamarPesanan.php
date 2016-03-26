<?php

/**
 * This is the model class for table "kamar_pesanan".
 *
 * The followings are the available columns in table 'kamar_pesanan':
 * @property string $id_kamar
 * @property integer $id_kamar_pesanan
 * @property integer $jumlah_kamar_dipesan
 *
 * The followings are the available model relations:
 * @property Kamar $idKamar
 * @property TransaksiPemesanan[] $transaksiPemesanans
 */
class KamarPesanan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kamar_pesanan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_kamar, jumlah_kamar_dipesan', 'required'),
			array('jumlah_kamar_dipesan', 'numerical', 'integerOnly'=>true),
			array('id_kamar', 'length', 'max'=>13),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_kamar, id_kamar_pesanan, jumlah_kamar_dipesan', 'safe', 'on'=>'search'),
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
			'transaksiPemesanans' => array(self::HAS_MANY, 'TransaksiPemesanan', 'id_kamar_pesanan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_kamar' => 'Id Kamar',
			'id_kamar_pesanan' => 'Id Kamar Pesanan',
			'jumlah_kamar_dipesan' => 'Jumlah Kamar Dipesan',
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
		$criteria->compare('id_kamar_pesanan',$this->id_kamar_pesanan);
		$criteria->compare('jumlah_kamar_dipesan',$this->jumlah_kamar_dipesan);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KamarPesanan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
