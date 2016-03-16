<?php

/**
 * This is the model class for table "PROVINCIA".
 *
 * The followings are the available columns in table 'PROVINCIA':
 * @property integer $ID_PROVINCIA
 * @property integer $ID_DEPTO
 * @property string $NOMBRE_PROVINCIA
 */
class Provincia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Provincia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'PROVINCIA';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_DEPTO', 'required'),
			array('ID_DEPTO', 'numerical', 'integerOnly'=>true),
			array('NOMBRE_PROVINCIA', 'length', 'max'=>60),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_PROVINCIA, ID_DEPTO, NOMBRE_PROVINCIA', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_PROVINCIA' => 'Id Provincia',
			'ID_DEPTO' => 'Id Depto',
			'NOMBRE_PROVINCIA' => 'Nombre Provincia',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID_PROVINCIA',$this->ID_PROVINCIA);
		$criteria->compare('ID_DEPTO',$this->ID_DEPTO);
		$criteria->compare('NOMBRE_PROVINCIA',$this->NOMBRE_PROVINCIA,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}