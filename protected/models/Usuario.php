<?php

/**
 * This is the model class for table "USUARIO".
 *
 * The followings are the available columns in table 'USUARIO':
 * @property integer $ID_USR
 * @property integer $ID_ACCESO
 * @property string $NOMBRE_USR
 * @property string $APEPAT_USR
 * @property string $APEMAT_USR
 * @property string $NICKNAME_USR
 * @property string $PASSWORD_USR
 * @property string $ROL
 * @property string $PERMISO
 * @property integer $ESTADO_USR
 */

DEFINE('SALT_LENGTH',10);
 
class Usuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuario the static model class
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
		return 'USUARIO';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_ACCESO', 'required'),
			array('ID_ACCESO, ESTADO_USR', 'numerical', 'integerOnly'=>true),
			array('NOMBRE_USR, NICKNAME_USR, ROL', 'length', 'max'=>30),
			array('APEPAT_USR, APEMAT_USR', 'length', 'max'=>50),
			array('PASSWORD_USR', 'length', 'max'=>300),
			array('PERMISO', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID_USR, ID_ACCESO, NOMBRE_USR, APEPAT_USR, APEMAT_USR, NICKNAME_USR, PASSWORD_USR, ROL, PERMISO, ESTADO_USR', 'safe', 'on'=>'search'),
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
			'ID_USR' => 'Id Usr',
			'ID_ACCESO' => 'Id Acceso',
			'NOMBRE_USR' => 'Nombre Usr',
			'APEPAT_USR' => 'Apepat Usr',
			'APEMAT_USR' => 'Apemat Usr',
			'NICKNAME_USR' => 'Nickname Usr',
			'PASSWORD_USR' => 'Password Usr',
			'ROL' => 'Rol',
			'PERMISO' => 'Permiso',
			'ESTADO_USR' => 'Estado Usr',
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

		$criteria->compare('ID_USR',$this->ID_USR);
		$criteria->compare('ID_ACCESO',$this->ID_ACCESO);
		$criteria->compare('NOMBRE_USR',$this->NOMBRE_USR,true);
		$criteria->compare('APEPAT_USR',$this->APEPAT_USR,true);
		$criteria->compare('APEMAT_USR',$this->APEMAT_USR,true);
		$criteria->compare('NICKNAME_USR',$this->NICKNAME_USR,true);
		$criteria->compare('PASSWORD_USR',$this->PASSWORD_USR,true);
		$criteria->compare('ROL',$this->ROL,true);
		$criteria->compare('PERMISO',$this->PERMISO,true);
		$criteria->compare('ESTADO_USR',$this->ESTADO_USR);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/* Funcione Agregadas para manejar la autenticacion de los Usuarios */
	
	
	/**
	 * @return boolean validate user
	 */
	public function validatePassword($password, $username){
		return $this->hashPassword($password, $username) === $this->PASSWORD_USR;
	}
	    
	
	public function hashPassword($phrase, $salt = null){
		$key = 'Gf;B&yXL|beJUf-K*PPiU{wf|@9K9j5?d+YW}?VAZOS%e2c -:11ii<}ZM?PO!96';
		if($salt == '')
				$salt = substr(hash('sha512', $key), 0, SALT_LENGTH);
		else
				$salt = substr($salt, 0, SALT_LENGTH);
		return hash('sha512', $salt . $key . $phrase);
	}
}
