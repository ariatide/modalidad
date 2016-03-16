<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class FormTesis extends CFormModel {
	
	public $aprobacionPertinencia;
	public $informeFinTutor;
	public $fechaInformeFinal;
	public $resumenTesis;
	public $tesisfile;

	public function rules() {
		return array(
			array('resumenTesis, aprobacionPertinencia', 'safe'),
			array('tesisfile', 'file', 'allowEmpty' => True, 'types' => 'pdf,doc,docx'),
			array('aprobacionPertinencia,informeFinTutor,fechaInformeFinal', 'date', 'format'=>Yii::app()->locale->getDateFormat()),
		);
	}

	public function getForm() {
		return new CForm(array(
			'showErrorSummary'=>true,
 			'attributes'=> array(
        			'enctype' => 'multipart/form-data',
    			),
			'elements'=>array(
				'aprobacionPertinencia'=>array(
					'label'=>'Aprobacion Pertinencia',
					'class'=>'datepicker',
				),
				'informeFinTutor'=>array(
					'label'=>'Informe Final Tutor',
					'class'=>'datepicker',
				),
				'fechaInformeFinal'=>array(
					'label'=>'Fecha de Informe Final',
					'class'=>'datepicker',
				),
				'resumenTesis'=>array(
					'label'=>'',
					'placeholder'=>'Resumen Tesis',
					'type'=>'textarea',
				),
				'tesisfile'=>array(
					'type'=>'file',
				),
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
