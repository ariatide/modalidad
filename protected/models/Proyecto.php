<?php

/**
 * This is the model class for table "PROYECTO".
 *
 * The followings are the available columns in table 'PROYECTO':
 * @property integer $ID_PROYECTO
 * @property integer $ID_AREA
 * @property integer $ID_POS
 * @property integer $ID_TUTOR
 * @property integer $ID_DESISTIMIENTO
 * @property string $NRO_FOLDER
 * @property string $TEMA_PROYECTO
 * @property string $FECHA_INSCRIP_PROY
 * @property string $OBSERVACION_PROYECTO
 * @property string $OBJGRAL
 * @property string $OBJESP
 * @property string $DOCUMENTO
 * @property string $PRORROGA
 * @property string $ESTADO_PROY
 * @property string $MODALIDAD
 */
class Proyecto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Proyecto the static model class
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
		return 'PROYECTO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_AREA, ID_POS', 'required'),
			array('ID_AREA, ID_POS, ID_TUTOR, ID_DESISTIMIENTO', 'numerical', 'integerOnly'=>true),
			array('NRO_FOLDER', 'length', 'max'=>15),
			array('TEMA_PROYECTO', 'length', 'max'=>400),
			array('DOCUMENTO, MODALIDAD', 'length', 'max'=>200),
			array('ESTADO_PROY', 'length', 'max'=>50),
			array('FECHA_INSCRIP_PROY, OBSERVACION_PROYECTO, OBJGRAL, OBJESP, PRORROGA', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_PROYECTO, ID_AREA, ID_POS, ID_TUTOR, ID_DESISTIMIENTO, NRO_FOLDER, TEMA_PROYECTO, FECHA_INSCRIP_PROY, OBSERVACION_PROYECTO, OBJGRAL, OBJESP, DOCUMENTO, PRORROGA, ESTADO_PROY, MODALIDAD', 'safe', 'on'=>'search'),
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
			//'AREA' => array(self::BELONGS_TO, 'A', 'author_id'),
			'POSTULANTE' => array(self::BELONGS_TO, 'Postulante', 'ID_POS'),
			'TUTOR' => array(self::BELONGS_TO, 'Tutor', 'ID_TUTOR'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_PROYECTO' => 'Id Proyecto',
			'ID_AREA' => 'Id Area',
			'ID_POS' => 'Id Pos',
			'ID_TUTOR' => 'Id Tutor',
			'ID_DESISTIMIENTO' => 'Id Desistimiento',
			'NRO_FOLDER' => 'Nro Folder',
			'TEMA_PROYECTO' => 'Tema Proyecto',
			'FECHA_INSCRIP_PROY' => 'Fecha Inscrip Proy',
			'OBSERVACION_PROYECTO' => 'Observacion Proyecto',
			'OBJGRAL' => 'Objgral',
			'OBJESP' => 'Objesp',
			'DOCUMENTO' => 'Documento',
			'PRORROGA' => 'Prorroga',
			'ESTADO_PROY' => 'Estado Proy',
			'MODALIDAD' => 'Modalidad',
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

		$criteria->compare('ID_PROYECTO',$this->ID_PROYECTO);
		$criteria->compare('ID_AREA',$this->ID_AREA);
		$criteria->compare('ID_POS',$this->ID_POS);
		$criteria->compare('ID_TUTOR',$this->ID_TUTOR);
		$criteria->compare('ID_DESISTIMIENTO',$this->ID_DESISTIMIENTO);
		$criteria->compare('NRO_FOLDER',$this->NRO_FOLDER,true);
		$criteria->compare('TEMA_PROYECTO',$this->TEMA_PROYECTO,true);
		$criteria->compare('FECHA_INSCRIP_PROY',$this->FECHA_INSCRIP_PROY,true);
		$criteria->compare('OBSERVACION_PROYECTO',$this->OBSERVACION_PROYECTO,true);
		$criteria->compare('OBJGRAL',$this->OBJGRAL,true);
		$criteria->compare('OBJESP',$this->OBJESP,true);
		$criteria->compare('DOCUMENTO',$this->DOCUMENTO,true);
		$criteria->compare('PRORROGA',$this->PRORROGA,true);
		$criteria->compare('ESTADO_PROY',$this->ESTADO_PROY,true);
		$criteria->compare('MODALIDAD',$this->MODALIDAD,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
