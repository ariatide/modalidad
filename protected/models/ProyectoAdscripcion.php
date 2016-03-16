<?php

/**
 * This is the model class for table "PROYECTO_ADSCRIPCION".
 *
 * The followings are the available columns in table 'PROYECTO_ADSCRIPCION':
 * @property integer $ID_PROYECTO
 * @property integer $ID_UP
 * @property string $NUM_ADS
 * @property string $FECHA_INFORME1_ADS
 * @property string $FECHA_INFORME2_ADS
 * @property string $FECHA_INFORMEFIN_ADS
 * @property string $FECHA_INFORMEFINFORMA_ADS
 * @property string $FECHA_SUBSCRIPCIONCONVENIO_ADS
 * @property string $PRORROGA_ADS
 * @property string $CAMBIO_TITULO_ADS
 * @property string $TEMA_ANTERIOR_ADS
 * @property string $NOMBRE_SUPERVISOR_ADS
 * @property integer $ID_SECCION
 */
class ProyectoAdscripcion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProyectoAdscripcion the static model class
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
		return 'PROYECTO_ADSCRIPCION';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_PROYECTO, FECHA_SUBSCRIPCIONCONVENIO_ADS', 'required'),
			array('ID_PROYECTO, ID_UP, ID_SECCION', 'numerical', 'integerOnly'=>true),
			array('CAMBIO_TITULO_ADS', 'length', 'max'=>5),
			array('TEMA_ANTERIOR_ADS', 'length', 'max'=>250),
			array('NOMBRE_SUPERVISOR_ADS', 'length', 'max'=>200),
			array('FECHA_INFORME1_ADS, FECHA_INFORME2_ADS, FECHA_INFORMEFIN_ADS, FECHA_INFORMEFINFORMA_ADS, PRORROGA_ADS', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_PROYECTO, ID_UP, NUM_ADS, FECHA_INFORME1_ADS, FECHA_INFORME2_ADS, FECHA_INFORMEFIN_ADS, FECHA_INFORMEFINFORMA_ADS, FECHA_SUBSCRIPCIONCONVENIO_ADS, PRORROGA_ADS, CAMBIO_TITULO_ADS, TEMA_ANTERIOR_ADS, NOMBRE_SUPERVISOR_ADS, ID_SECCION', 'safe', 'on'=>'search'),
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
			'ID_UP' => 'Id Up',
			'NUM_ADS' => 'Num Ads',
			'FECHA_INFORME1_ADS' => 'Fecha Informe1 Ads',
			'FECHA_INFORME2_ADS' => 'Fecha Informe2 Ads',
			'FECHA_INFORMEFIN_ADS' => 'Fecha Informefin Ads',
			'FECHA_INFORMEFINFORMA_ADS' => 'Fecha Informefinforma Ads',
			'FECHA_SUBSCRIPCIONCONVENIO_ADS' => 'Fecha Subscripcionconvenio Ads',
			'PRORROGA_ADS' => 'Prorroga Ads',
			'CAMBIO_TITULO_ADS' => 'Cambio Titulo Ads',
			'TEMA_ANTERIOR_ADS' => 'Tema Anterior Ads',
			'NOMBRE_SUPERVISOR_ADS' => 'Nombre Supervisor Ads',
			'ID_SECCION' => 'Id Seccion',
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
		$criteria->compare('ID_UP',$this->ID_UP);
		$criteria->compare('NUM_ADS',$this->NUM_ADS,true);
		$criteria->compare('FECHA_INFORME1_ADS',$this->FECHA_INFORME1_ADS,true);
		$criteria->compare('FECHA_INFORME2_ADS',$this->FECHA_INFORME2_ADS,true);
		$criteria->compare('FECHA_INFORMEFIN_ADS',$this->FECHA_INFORMEFIN_ADS,true);
		$criteria->compare('FECHA_INFORMEFINFORMA_ADS',$this->FECHA_INFORMEFINFORMA_ADS,true);
		$criteria->compare('FECHA_SUBSCRIPCIONCONVENIO_ADS',$this->FECHA_SUBSCRIPCIONCONVENIO_ADS,true);
		$criteria->compare('PRORROGA_ADS',$this->PRORROGA_ADS,true);
		$criteria->compare('CAMBIO_TITULO_ADS',$this->CAMBIO_TITULO_ADS,true);
		$criteria->compare('TEMA_ANTERIOR_ADS',$this->TEMA_ANTERIOR_ADS,true);
		$criteria->compare('NOMBRE_SUPERVISOR_ADS',$this->NOMBRE_SUPERVISOR_ADS,true);
		$criteria->compare('ID_SECCION',$this->ID_SECCION);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}