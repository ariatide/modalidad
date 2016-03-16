<?php

/**
 * This is the model class for table "DOCENTE".
 *
 * The followings are the available columns in table 'DOCENTE':
 * @property integer $ID_DOCENTE
 * @property string $NOMBRE_DOCENTE
 * @property integer $TELEFONO_DOCENTE
 */
class Docente extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Docente the static model class
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
		return 'DOCENTE';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('TELEFONO_DOCENTE', 'numerical', 'integerOnly'=>true),
			array('NOMBRE_DOCENTE', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_DOCENTE, NOMBRE_DOCENTE, TELEFONO_DOCENTE', 'safe', 'on'=>'search'),
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
			'ID_DOCENTE' => 'Id Docente',
			'NOMBRE_DOCENTE' => 'Nombre Docente',
			'TELEFONO_DOCENTE' => 'Telefono Docente',
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

		$criteria->compare('ID_DOCENTE',$this->ID_DOCENTE);
		$criteria->compare('NOMBRE_DOCENTE',$this->NOMBRE_DOCENTE,true);
		$criteria->compare('TELEFONO_DOCENTE',$this->TELEFONO_DOCENTE);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}