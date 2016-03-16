<?php

/**
 * This is the model class for table "REGISTRO".
 *
 * The followings are the available columns in table 'REGISTRO':
 * @property integer $ID_REGISTRO
 * @property integer $ID_USR
 * @property integer $ID_POS
 * @property string $FECHA_REGISTRO
 * @property string $OBSERVACION_REGISTRO
 */
class Registro extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Registro the static model class
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
		return 'REGISTRO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_USR, ID_POS', 'required'),
			array('ID_USR, ID_POS', 'numerical', 'integerOnly'=>true),
			array('OBSERVACION_REGISTRO', 'length', 'max'=>100),
			array('FECHA_REGISTRO', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_REGISTRO, ID_USR, ID_POS, FECHA_REGISTRO, OBSERVACION_REGISTRO', 'safe', 'on'=>'search'),
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
			'ID_REGISTRO' => 'Id Registro',
			'ID_USR' => 'Id Usr',
			'ID_POS' => 'Id Pos',
			'FECHA_REGISTRO' => 'Fecha Registro',
			'OBSERVACION_REGISTRO' => 'Observacion Registro',
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

		$criteria->compare('ID_REGISTRO',$this->ID_REGISTRO);
		$criteria->compare('ID_USR',$this->ID_USR);
		$criteria->compare('ID_POS',$this->ID_POS);
		$criteria->compare('FECHA_REGISTRO',$this->FECHA_REGISTRO,true);
		$criteria->compare('OBSERVACION_REGISTRO',$this->OBSERVACION_REGISTRO,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}