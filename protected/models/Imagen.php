<?php

/**
 * This is the model class for table "imagen".
 *
 * The followings are the available columns in table 'imagen':
 * @property integer $ID_IMAGEN
 * @property integer $IMAGEN_ID
 * @property string $NOMBRE_IMAGEN
 * @property string $imagen_nombre_tabla
 * @property string $titulo_imagen
 */
class Imagen extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Imagen the static model class
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
		return 'imagen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.

                return array(
                    	array('NOMBRE_IMAGEN, imagen_nombre_tabla', 'required'),
			array('NOMBRE_IMAGEN', 'file', 'allowEmpty' => true, 'types' => 'jpg, jpeg, gif, png'),
			array('imagen_nombre_tabla', 'length', 'max'=>20),
                    	array('NOMBRE_IMAGEN', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_IMAGEN, IMAGEN_ID, NOMBRE_IMAGEN, imagen_nombre_tabla, titulo_imagen', 'safe', 'on'=>'search'),
		
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
			'ID_IMAGEN' => 'Id Imagen',
			'IMAGEN_ID' => 'Imagen',
			'NOMBRE_IMAGEN' => 'Nombre Imagen',
			'imagen_nombre_tabla' => 'Imagen Nombre Tabla',
			'titulo_imagen' => 'Titulo Imagen',
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

		$criteria->compare('ID_IMAGEN',$this->ID_IMAGEN);
		$criteria->compare('IMAGEN_ID',$this->IMAGEN_ID);
		$criteria->compare('NOMBRE_IMAGEN',$this->NOMBRE_IMAGEN,true);
		$criteria->compare('imagen_nombre_tabla',$this->imagen_nombre_tabla,true);
		$criteria->compare('titulo_imagen',$this->titulo_imagen,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}