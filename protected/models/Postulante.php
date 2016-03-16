<?php

/**
 * This is the model class for table "POSTULANTE".
 *
 * The followings are the available columns in table 'POSTULANTE':
 * @property integer $ID_POS
 * @property integer $ID_CARRERA
 * @property integer $CI_POS
 * @property string $NOMBRE_POS
 * @property string $APEPAT_POS
 * @property string $APEMAT_POS
 * @property integer $TELFIJO_POS
 * @property integer $TELMOVIL_POS
 * @property string $GENERO_POS
 * @property string $OBSERVACION_POS
 */
class Postulante extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Postulante the static model class
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
		return 'POSTULANTE';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_CARRERA', 'required'),
			array('ID_CARRERA, CI_POS, TELFIJO_POS, TELMOVIL_POS', 'numerical', 'integerOnly'=>true),
			array('NOMBRE_POS, APEMAT_POS', 'length', 'max'=>60),
			array('APEPAT_POS', 'length', 'max'=>80),
			array('GENERO_POS', 'length', 'max'=>1),
			array('OBSERVACION_POS', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_POS, ID_CARRERA, CI_POS, NOMBRE_POS, APEPAT_POS, APEMAT_POS, TELFIJO_POS, TELMOVIL_POS, GENERO_POS, OBSERVACION_POS', 'safe', 'on'=>'search'),
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
			'CARRERA' => array(self::BELONGS_TO, 'Carrera', 'ID_CARRERA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_POS' => 'Id Pos',
			'ID_CARRERA' => 'Id Carrera',
			'CI_POS' => 'Ci Pos',
			'NOMBRE_POS' => 'Nombre Pos',
			'APEPAT_POS' => 'Apepat Pos',
			'APEMAT_POS' => 'Apemat Pos',
			'TELFIJO_POS' => 'Telfijo Pos',
			'TELMOVIL_POS' => 'Telmovil Pos',
			'GENERO_POS' => 'Genero Pos',
			'OBSERVACION_POS' => 'Observacion Pos',
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

		$criteria->compare('ID_POS',$this->ID_POS);
		$criteria->compare('ID_CARRERA',$this->ID_CARRERA);
		$criteria->compare('CI_POS',$this->CI_POS);
		$criteria->compare('NOMBRE_POS',$this->NOMBRE_POS,true);
		$criteria->compare('APEPAT_POS',$this->APEPAT_POS,true);
		$criteria->compare('APEMAT_POS',$this->APEMAT_POS,true);
		$criteria->compare('TELFIJO_POS',$this->TELFIJO_POS);
		$criteria->compare('TELMOVIL_POS',$this->TELMOVIL_POS);
		$criteria->compare('GENERO_POS',$this->GENERO_POS,true);
		$criteria->compare('OBSERVACION_POS',$this->OBSERVACION_POS,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
