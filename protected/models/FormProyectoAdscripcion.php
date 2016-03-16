<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class FormProyectoAdscripcion extends CFormModel {

    public $titulo;
    public $areaJuridica;
    public $tutorId;
    public $tutor;
    public $numeroConvenio;
    public $fechaRegistro;
    public $modalidad;
//	public $objetivoGeneral;
// public $objetivosEspecificos;

    public $observaciones;
    public $estado;
    public $unidadPatrocinadora;
    public $unidadPatrocinadoraId;
    public $nombreSupervisor;
    public $departamento;
    public $provincia;
    public $seccion;

    public function rules() {
        return array(
            array('titulo,fechaRegistro, numeroConvenio,modalidad,estado,areaJuridica', 'required'), //objetivoGeneral,objetivosEspecificos
            array('fechaRegistro', 'date', 'format' => Yii::app()->locale->getDateFormat()),
            array('observaciones,departamento,provincia,seccion,tutorId, nombreSupervisor,unidadPatrocinadora,tutor, unidadPatrocinadoraId', 'safe')
        );
    }

    public function getForm() {

        return new CForm(array(
            'showErrorSummary' => true,
            'elements' => array(
                'titulo' => array(
                    'placeholder' => 'Titulo',
                    'type' => 'textarea',
                    'textarea' => 'Titulo',
                    'rows' => 5,
                    'cols' => 60,
                ),
                /*
                  'unidadPatrocinadora'=>array(
                  'label'=>'Unidad Patrocinadora',
                  'type'=>'dropdownlist',
                  'items'=>CHtml::listData(UnidadPatrocinadora::model()->findAll(),'ID_UP', 'NOMBRE_UP'),
                  'prompt'=>'Seleccione una Unidad Patrocinadora',
                  ),
                 */
                'unidadPatrocinadora' => array(
                    'label' => 'Unidad Patrocinadora',
                    'placeholder' => 'Unidad Patrocinadora',
                    'size' => 60
                ),
                'unidadPatrocinadoraId' => array(
                    'label' => 'Unidad Patrocinadora Id',
                    'type' => 'hidden',
                ),
                /*
                  'lugarEjecucion'=>array(
                  'label'=>'Lugar Ejecucion',
                  'type'=>'dropdownlist',
                  'items'=>CHtml::listData(LugarEjecucion::model()->findAll(),'ID_LE', 'NOMBRE_LE'),
                  'prompt'=>'Seleccione un Lugar de Ejecucion',
                  ),
                 */
                'provincia' => array(
                    'label' => 'Provincia',
                    'type' => 'dropdownlist',
                    'items' => CHtml::listData(Provincia::model()->findAll(), 'ID_PROVINCIA', 'NOMBRE_PROVINCIA'),
                    'prompt' => 'Seleccione una Provincia',
                ),
              
                'nombreSupervisor' => array(
                    'label' => 'Nombre Supervisor',
                    'placeholder' => 'Nombre Supervisor'
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
                    'label' => 'Nro. Folder',
                    'placeholder' => 'Nro Folder'
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
                    'label' => 'Observaciones',
                    'placeholder' => 'Observaciones',
                    'type' => 'textarea',
                ),
                'estado' => array(
                    'style' => " width:15px; margin: 0px ; display:inline-block",
                    'label' => 'Estado',
                    'type' => 'radiolist',
                    'separator' => ' ',
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
