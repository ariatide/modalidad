<?php

/**
 * This is the model class for table "CARRERA".
 *
 * The followings are the available columns in table 'CARRERA':
 * @property integer $ID_CARRERA
 * @property string $NOMBRE_CARRERA
 * @property string $OBSERVACION_CARRERA
 */
class Carrera extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Carrera the static model class
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
		return 'CARRERA';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NOMBRE_CARRERA', 'required'),
			array('NOMBRE_CARRERA', 'length', 'max'=>50),
			array('OBSERVACION_CARRERA', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_CARRERA, NOMBRE_CARRERA, OBSERVACION_CARRERA', 'safe', 'on'=>'search'),
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
			'ID_CARRERA' => 'Id Carrera',
			'NOMBRE_CARRERA' => 'Nombre Carrera',
			'OBSERVACION_CARRERA' => 'Observacion Carrera',
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

		$criteria->compare('ID_CARRERA',$this->ID_CARRERA);
		$criteria->compare('NOMBRE_CARRERA',$this->NOMBRE_CARRERA,true);
		$criteria->compare('OBSERVACION_CARRERA',$this->OBSERVACION_CARRERA,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}