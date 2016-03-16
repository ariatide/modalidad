<?php

/**
 * This is the model class for table "TUTOR".
 *
 * The followings are the available columns in table 'TUTOR':
 * @property integer $ID_TUTOR
 * @property string $FECHA_ASIGN_TUTOR
 * @property integer $ID_DOCENTE
 */
class Tutor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tutor the static model class
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
		return 'TUTOR';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_DOCENTE', 'numerical', 'integerOnly'=>true),
			array('FECHA_ASIGN_TUTOR', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_TUTOR, FECHA_ASIGN_TUTOR, ID_DOCENTE', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		/*
		return array(
		);
		*/
		
		return array(
			'DOCENTE' => array(self::BELONGS_TO, 'Docente', 'ID_DOCENTE'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_TUTOR' => 'Id Tutor',
			'FECHA_ASIGN_TUTOR' => 'Fecha Asign Tutor',
			'ID_DOCENTE' => 'Id Docente',
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

		$criteria->compare('ID_TUTOR',$this->ID_TUTOR);
		$criteria->compare('FECHA_ASIGN_TUTOR',$this->FECHA_ASIGN_TUTOR,true);
		$criteria->compare('ID_DOCENTE',$this->ID_DOCENTE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
