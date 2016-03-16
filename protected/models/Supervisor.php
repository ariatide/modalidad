<?php

/**
 * This is the model class for table "SUPERVISOR".
 *
 * The followings are the available columns in table 'SUPERVISOR':
 * @property integer $ID_SUP
 * @property string $NOMBRE_SUP
 */
class Supervisor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Supervisor the static model class
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
		return 'SUPERVISOR';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NOMBRE_SUP', 'length', 'max'=>70),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_SUP, NOMBRE_SUP', 'safe', 'on'=>'search'),
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
			'ID_SUP' => 'Id Sup',
			'NOMBRE_SUP' => 'Nombre Sup',
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

		$criteria->compare('ID_SUP',$this->ID_SUP);
		$criteria->compare('NOMBRE_SUP',$this->NOMBRE_SUP,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}