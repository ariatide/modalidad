<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class FormEditarTesis extends CFormModel 
{
	public $fechaInformeFinTutor;
	public $fechaInformeFinal;
	public $resumenTesis;
	public $documento;
	public $estado;
	public $temaProyecto;
        
	public function rules() {
		return array(
			array('fechaInformeFinTutor,fechaInformeFinal', 'date', 'format'=>Yii::app()->locale->getDateFormat()),
			array('fechaInformeFinTutor, fechaInformeFinal, resumenTesis, documento, estado, temaProyecto', 'safe'),
		);
	}

	
}
