<?php

/**
 * This is the model class for table "LUGAR_EJECUCION".
 *
 * The followings are the available columns in table 'LUGAR_EJECUCION':
 * @property integer $ID_LE
 * @property integer $ID_SECCION
 * @property string $NOMBRE_LE
 * @property string $DIRECCION_LE
 * @property string $RESPONSABLE_LE
 */
class LugarEjecucion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LugarEjecucion the static model class
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
		return 'LUGAR_EJECUCION';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_SECCION', 'numerical', 'integerOnly'=>true),
			array('NOMBRE_LE, DIRECCION_LE', 'length', 'max'=>100),
			array('RESPONSABLE_LE', 'length', 'max'=>80),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_LE, ID_SECCION, NOMBRE_LE, DIRECCION_LE, RESPONSABLE_LE', 'safe', 'on'=>'search'),
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
			'ID_LE' => 'Id Le',
			'ID_SECCION' => 'Id Seccion',
			'NOMBRE_LE' => 'Nombre Le',
			'DIRECCION_LE' => 'Direccion Le',
			'RESPONSABLE_LE' => 'Responsable Le',
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

		$criteria->compare('ID_LE',$this->ID_LE);
		$criteria->compare('ID_SECCION',$this->ID_SECCION);
		$criteria->compare('NOMBRE_LE',$this->NOMBRE_LE,true);
		$criteria->compare('DIRECCION_LE',$this->DIRECCION_LE,true);
		$criteria->compare('RESPONSABLE_LE',$this->RESPONSABLE_LE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}