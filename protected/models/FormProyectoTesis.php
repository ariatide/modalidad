<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class FormProyectoTesis extends CFormModel {

    public $titulo;
    public $areaJuridica;
    public $tutorId;
    public $tutor;
    public $numeroConvenio;
    public $fechaRegistro;
    public $modalidad;
    //public $objetivoGeneral;
    // public $ambito;
// public $objetivosEspecificos;

    public $observaciones;
    public $estado;

    public function rules() {
        return array(
            array('titulo,numeroConvenio,modalidad,areaJuridica, estado, fechaRegistro', 'required'), //objetivoGeneral,objetivosEspecificos
            array('fechaRegistro', 'date', 'format' => Yii::app()->locale->getDateFormat()),
            array('observaciones, tutor,tutorId', 'safe')
        );
    }

    public function getForm() {
        return new CForm(array(
            'showErrorSummary' => true,
            'elements' => array(
                'titulo' => array(
                    'placeholder' => 'Titulo',
                    'type' => 'textarea',
                    'rows' => 10,
                    'cols' => 80,
                ),
                'areaJuridica' => array(
                    'label' => 'Area Juridica',
                    'type' => 'dropdownlist',
                    'items' => CHtml::listData(AreaJuridica::model()->findAll(), 'ID_AREA', 'NOMBRE_AREA'),
                    'prompt' => 'Seleccione un Area Juridica',
                ),
                /*
                  'tutor'=>array(
                  'label'=>'Tutor',
                  'type'=>'dropdownlist',
                  'items'=>CHtml::listData(Docente::model()->findAll(),'ID_DOCENTE', 'NOMBRE_DOCENTE'),
                  'prompt'=>'Seleccione un Tutor',
                  ),
                 */
                'tutor' => array(
                    'label' => 'Tutor',
                    'placeholder' => 'Tutor',
                ),
                'tutorId' => array(
                    'label' => 'Tutor Id',
                    'type' => 'hidden',
                ),
                'numeroConvenio' => array(
                    'label' => 'Nro. Floder',
                    'placeholder' => 'Nro. Folder',
                ),
                'fechaRegistro' => array(
                    'placeholder' => 'Fecha Registro',
                    'class' => 'datepicker',
                ),
                /*
                  'modalidad'=>array(
                  'label'=>'Modalidad',
                  'type'=>'dropdownlist',
                  'items'=>array('Trabajo Dirigido' => 'Trabajo Dirigido', 'Adscripcion' => 'Adscripcion', 'Tesis' => 'Tesis'),
                  'prompt'=>'Seleccione una Modalidad',
                  ),
                 */
                'modalidad' => array(
                    'label' => 'Modalidad',
                    'type' => 'hidden',
                ),
                /*
                  'objetivoGeneral'=>array(
                  'label'=>'Objetivo General'
                  ),
                  'objetivosEspecificos'=>array(
                  'label'=>'Objetivos Especificos',
                  'type'=>'textarea',
                  ),
                 */
                'observaciones' => array(
                    'label' => '',
                    'placeholder' => 'Observaciones',
                    'type' => 'textarea',
                ),
                'estado' => array(
                    'style' => " width:15px; margin: 0px ; display:inline-block",
                    'label' => 'Estado',
                    'type' => 'radiolist',
                    'items' => array('Ejecucion' => 'Ejecucion', 'Desistido' => 'Desistido', 'Concluido' => 'Concluido')),
            /*
              'ambito'=>array(
              'label'=>'Ambito',
              'type'=>'dropdownlist',
              'items'=>CHtml::listData(Ambito::model()->findAll(),'ID_AMBITO', 'NOMBRE_AMBITO'),
              'prompt'=>'Seleccione un Ambito',
              ),
             */
            ),
            'buttons' => array(
                'submit' => array(
                    'type' => 'submit',
                    'label' => 'Siguiente'
                ),
            )
                ), $this);
    }

}
