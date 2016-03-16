<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class FormEditarTrabajoDirigido extends CFormModel 
{
	
	public $estado;
	public $primeraListaCotejo;
	public $listaCotejoSeguimiento;
	public $listaCotejoInformeFinal;
	public $informeFinalForma;
	public $prorroga;
	public $temaAnterior;
	public $temaProyecto;
	public $documento;
	public $idProyecto;
	
	public function rules() {
		return array(
			array('estado', 'required'),
			array('primeraListaCotejo,listaCotejoSeguimiento,listaCotejoInformeFinal,informeFinalForma,prorroga', 'date', 'format'=>Yii::app()->locale->getDateFormat()),
			array('temaAnterior, temaProyecto, documento', 'safe'),
		);
	}

	
}
