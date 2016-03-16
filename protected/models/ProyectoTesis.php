<?php

/**
 * This is the model class for table "PROYECTO_TESIS".
 *
 * The followings are the available columns in table 'PROYECTO_TESIS':
 * @property integer $ID_PROYECTO
 * @property string $APROBACIONPERTINENCIA
 * @property string $FECHA_INFORMEFIN_TUTOR
 * @property string $FECHA_INFORMEFINALIIJP
 * @property string $RESUMEN_TESIS
 */
class ProyectoTesis extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProyectoTesis the static model class
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
		return 'PROYECTO_TESIS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_PROYECTO', 'required'),
			array('ID_PROYECTO', 'numerical', 'integerOnly'=>true),
			array('APROBACIONPERTINENCIA, FECHA_INFORMEFIN_TUTOR, FECHA_INFORMEFINALIIJP, RESUMEN_TESIS', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_PROYECTO, APROBACIONPERTINENCIA, FECHA_INFORMEFIN_TUTOR, FECHA_INFORMEFINALIIJP, RESUMEN_TESIS', 'safe', 'on'=>'search'),
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
			'ID_PROYECTO' => 'Id Proyecto',
			'APROBACIONPERTINENCIA' => 'Aprobacionpertinencia',
			'FECHA_INFORMEFIN_TUTOR' => 'Fecha Informefin Tutor',
			'FECHA_INFORMEFINALIIJP' => 'Fecha Informefinaliijp',
			'RESUMEN_TESIS' => 'Resumen Tesis',
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
		$criteria->compare('APROBACIONPERTINENCIA',$this->APROBACIONPERTINENCIA,true);
		$criteria->compare('FECHA_INFORMEFIN_TUTOR',$this->FECHA_INFORMEFIN_TUTOR,true);
		$criteria->compare('FECHA_INFORMEFINALIIJP',$this->FECHA_INFORMEFINALIIJP,true);
		$criteria->compare('RESUMEN_TESIS',$this->RESUMEN_TESIS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}