<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ReporteForm extends CFormModel
{
	public $modalidad;
	public $estado;
	public $carrera;
	public $area;
	public $fechaIni;
	public $fechaFin;
	public $check1;
	public $check2;
	public $check3;
	public $check4;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('check1,check2,check3,check4,modalidad, estado, carrera,area, fechaIni, fechaFin', 'required'),
			array('fechaIni, fechaFin', 'date','format' => Yii::app()->locale->getDateFormat()),
			);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Verification Code',
		);
	}
}