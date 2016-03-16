<?php

/**
 * This is the model class for table "PROYECTO_TDIRIGIDO".
 *
 * The followings are the available columns in table 'PROYECTO_TDIRIGIDO':
 * @property integer $ID_PROYECTO
 * @property integer $ID_LE
 * @property string $PRIMERALISTACOTEJO
 * @property string $PRIMERINFORMEAVANCE
 * @property string $INFORMEFINAL
 * @property string $INFORMEFINALFORMA
 * @property string $SUSCRIPCIONCONVENIO
 * @property integer $ID_SECCION
 * @property string $CAMBIO_TITULO_TD
 * @property string $TEMA_ANTERIOR_TD
 * @property string $PRORROGA_TD
 * @property string $NOMBRE_SUPERVISOR_TD
 */
class ProyectoTdirigido extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProyectoTdirigido the static model class
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
		return 'PROYECTO_TDIRIGIDO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('SUSCRIPCIONCONVENIO, ID_PROYECTO, ID_LE', 'required'),
			array('ID_PROYECTO, ID_LE, ID_SECCION', 'numerical', 'integerOnly'=>true),
			array('CAMBIO_TITULO_TD', 'length', 'max'=>5),
			array('TEMA_ANTERIOR_TD', 'length', 'max'=>250),
			array('NOMBRE_SUPERVISOR_TD', 'length', 'max'=>200),
			array('PRIMERALISTACOTEJO, PRIMERINFORMEAVANCE, INFORMEFINAL, INFORMEFINALFORMA, PRORROGA_TD', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_PROYECTO, ID_LE, PRIMERALISTACOTEJO, PRIMERINFORMEAVANCE, INFORMEFINAL, INFORMEFINALFORMA, ID_SECCION, CAMBIO_TITULO_TD, TEMA_ANTERIOR_TD, PRORROGA_TD, NOMBRE_SUPERVISOR_TD', 'safe', 'on'=>'search'),
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
			'ID_LE' => 'Id Le',
			'PRIMERALISTACOTEJO' => 'Primeralistacotejo',
			'PRIMERINFORMEAVANCE' => 'Primerinformeavance',
			'INFORMEFINAL' => 'Informefinal',
			'INFORMEFINALFORMA' => 'Informefinalforma',
			'SUSCRIPCIONCONVENIO' => 'Suscripcionconvenio',
			'ID_SECCION' => 'Id Seccion',
			'CAMBIO_TITULO_TD' => 'Cambio Titulo Td',
			'TEMA_ANTERIOR_TD' => 'Tema Anterior Td',
			'PRORROGA_TD' => 'Prorroga Td',
			'NOMBRE_SUPERVISOR_TD' => 'Nombre Supervisor Td',
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
		$criteria->compare('ID_LE',$this->ID_LE);
		$criteria->compare('PRIMERALISTACOTEJO',$this->PRIMERALISTACOTEJO,true);
		$criteria->compare('PRIMERINFORMEAVANCE',$this->PRIMERINFORMEAVANCE,true);
		$criteria->compare('INFORMEFINAL',$this->INFORMEFINAL,true);
		$criteria->compare('INFORMEFINALFORMA',$this->INFORMEFINALFORMA,true);
		$criteria->compare('SUSCRIPCIONCONVENIO',$this->SUSCRIPCIONCONVENIO,true);
		$criteria->compare('ID_SECCION',$this->ID_SECCION);
		$criteria->compare('CAMBIO_TITULO_TD',$this->CAMBIO_TITULO_TD,true);
		$criteria->compare('TEMA_ANTERIOR_TD',$this->TEMA_ANTERIOR_TD,true);
		$criteria->compare('PRORROGA_TD',$this->PRORROGA_TD,true);
		$criteria->compare('NOMBRE_SUPERVISOR_TD',$this->NOMBRE_SUPERVISOR_TD,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
