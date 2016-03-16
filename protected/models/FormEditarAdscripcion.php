<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class FormEditarAdscripcion extends CFormModel {

    public $fechaInforme1;
    public $fechaInforme2;
    public $fechaInformeFin;
    public $fechaInformeFinForma;
    public $prorroga;
    public $estado;
    public $temaNuevoProyecto;
    public $objgral;
    public $objesp;
    public $documento;
    public $tutor;
    public $supervisor;

    public function rules() {
        return array(
            array('fechaInformeFinForma, fechaInformeFin, fechaInforme2, fechaInforme1', 'date', 'format' => Yii::app()->locale->getDateFormat()),
            array('fechaInformeFinForma, fechaInformeFin, fechaInforme2, fechaInforme1, estado, temaNuevoProyecto, temaAnteriorProyecto, objgral, objesp, documento, prorroga, tutor, supervisor', 'safe'),
        );
    }

}
