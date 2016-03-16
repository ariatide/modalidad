<?php

/**
 * This is the model class for table "UNIDAD_PATROCINADORA".
 *
 * The followings are the available columns in table 'UNIDAD_PATROCINADORA':
 * @property integer $ID_UP
 * @property integer $ID_SECCION
 * @property string $NOMBRE_UP
 * @property integer $DIRECCION_UP
 * @property integer $TELEFONO_UP
 * @property string $RESPONSABLE_UP
 */
class UnidadPatrocinadora extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UnidadPatrocinadora the static model class
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
		return 'UNIDAD_PATROCINADORA';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_SECCION, DIRECCION_UP, TELEFONO_UP', 'numerical', 'integerOnly'=>true),
			array('NOMBRE_UP, RESPONSABLE_UP', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_UP, ID_SECCION, NOMBRE_UP, DIRECCION_UP, TELEFONO_UP, RESPONSABLE_UP', 'safe', 'on'=>'search'),
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
			'ID_UP' => 'Id Up',
			'ID_SECCION' => 'Id Seccion',
			'NOMBRE_UP' => 'Nombre Up',
			'DIRECCION_UP' => 'Direccion Up',
			'TELEFONO_UP' => 'Telefono Up',
			'RESPONSABLE_UP' => 'Responsable Up',
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

		$criteria->compare('ID_UP',$this->ID_UP);
		$criteria->compare('ID_SECCION',$this->ID_SECCION);
		$criteria->compare('NOMBRE_UP',$this->NOMBRE_UP,true);
		$criteria->compare('DIRECCION_UP',$this->DIRECCION_UP);
		$criteria->compare('TELEFONO_UP',$this->TELEFONO_UP);
		$criteria->compare('RESPONSABLE_UP',$this->RESPONSABLE_UP,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}