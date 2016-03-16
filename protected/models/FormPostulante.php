<?php

class FormPostulante extends CFormModel {
	public $nombres;
	public $apellidoPaterno;
	public $apellidoMaterno;
	//public $direccion;
	public $telefonoFijo;
	//public $telefonoMovil;
	public $genero;
	//public $fechaNacimiento;
	//public $fechaEgreso;
	public $ci;
	public $carrera;
	public $observaciones;
	//public $email;
	

	public function rules() {
		return array(
			array('telefonoFijo,apellidoMaterno, ci', 'safe'),
			array('telefonoFijo,ci', 'numerical'),
			array('nombres,apellidoPaterno,genero,carrera', 'required'),
			//array('email', 'email'),
			//array('fechaNacimiento,fechaEgreso', 'date', 'format'=>Yii::app()->locale->getDateFormat()),
		);
	}

	public function getForm() {
            return new CForm(array(
			'showErrorSummary'=>true,
			'elements'=>array(
				'nombres'=>array(
                                        'label'=>'',
					'size'=>60,
                                        'placeholder'=>'Nombres'
				),
                               'apellidoPaterno'=>array(
                                        'label'=>'',
					'size'=>60,
                                        'placeholder'=>'Apellido Paterno'
				),
				'apellidoMaterno'=>array(
                                        'label'=>'',
					'size'=>60,
                                        'placeholder'=>'Apellido Materno'
				),	
				'telefonoFijo'=>array(
                                        'label'=>'',
					'size'=>60,
                                        'placeholder'=>'Telefono Fijo'
				),
				'genero'=>array(
                                        'style'=>" width:15px; margin: 0px ; display:inline-block",
                                        'label'=>'',
					'type'=>'radiolist',
					'items'=>array ('M' => 'Masculino', 'F' => 'Femenino'),
					
				),
				/*
				'fechaNacimiento'=>array(
					'label'=>'Fecha Nacimiento',
					'class'=>'datepicker',
				),
				'fechaEgreso'=>array(
					'label'=>'Fecha Egreso',
					'class'=>'datepicker',
				),
				*/
				'ci'=>array(
                                        'label'=>'',
					'size'=>30,
                                        'placeholder'=>'CI'
				),
				/*
				'carrera'=>array(
					'label'=>'Carrera',
					'type'=>'dropdownlist',
					'items'=>CHtml::listData(Carrera::model()->findAll(),'ID_CARRERA', 'NOMBRE_CARRERA'),
					'prompt'=>'Seleccione una Carrera',
				),
				*/
				
				'carrera'=>array(
					'type'=>'hidden'
				),
				/*
				'observaciones'=>array(
					'label'=>'Observaciones',
					'type'=>'textarea',
				),
				*/
				/*
				'email'=>array(
					'label'=>'Email'
				),
				*/
			),
			'buttons'=>array(
				'submit'=>array(
					'type'=>'submit',
					'label'=>'Siguiente'
				),
			)
		), $this);
	}
}
