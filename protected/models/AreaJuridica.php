<?php

/**
 * This is the model class for table "AREA_JURIDICA".
 *
 * The followings are the available columns in table 'AREA_JURIDICA':
 * @property integer $ID_AREA
 * @property string $NOMBRE_AREA
 */
class AreaJuridica extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AreaJuridica the static model class
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
		return 'AREA_JURIDICA';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NOMBRE_AREA', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_AREA, NOMBRE_AREA', 'safe', 'on'=>'search'),
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
			'ID_AREA' => 'Id Area',
			'NOMBRE_AREA' => 'Nombre Area',
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

		$criteria->compare('ID_AREA',$this->ID_AREA);
		$criteria->compare('NOMBRE_AREA',$this->NOMBRE_AREA,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}