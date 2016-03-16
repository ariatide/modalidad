<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class FormVerificacion extends CFormModel {
	/*
	public $titulo;
	public $areaJuridica;
	public $tutor;
	public $numeroConvenio;
	public $fechaRegistro;
	public $modalidad;
	*/
	
	
	

	public function rules() {
		return array(
			//array('titulo,areaJuridica,tutor,numeroConvenio,fechaRegistro,modalidad', 'required'),
			//array('fechaRegistro', 'date'),
		);
	}

	public function getForm() {
		return new CForm(array(
			'showErrorSummary'=>true,
			'elements'=>array(),
			'buttons'=>array(
				'submit'=>array(
					'type'=>'submit',
					'label'=>'Finalizar Registro'
				),
			)
		), $this);
	}

	
}
