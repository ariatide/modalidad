<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class FormTrabajoDirigido extends CFormModel {

    //public $lugarEjecucion;
    //public $direccionLugarEjecucion;
    /*
      public $departamento;
      public $provincia;
      public $seccion;
     */



    //public $nombreSupervisor;
    //public $telefonoLugarEjecucion;
    public $primeraListaCotejo;
    public $primerInformeAvance;
    public $informeFinal;
    public $informeFinalForma;
    public $documento;
    public $suscripcionConvenio;

    public function rules() {
        return array(
            array('suscripcionConvenio', 'required'),
            array('primeraListaCotejo,primerInformeAvance,informeFinal,informeFinalForma,suscripcionConvenio', 'date', 'format' => Yii::app()->locale->getDateFormat()), 
            array('documento', 'file', 'allowEmpty' => true, 'types' => 'pdf,doc,docx'),
            array('', 'safe'),
        );
    }

    public function getForm() {
        return new CForm(array(
            'showErrorSummary' => true,
            'attributes' => array(
                'enctype' => 'multipart/form-data',
            ),
            'elements' => array(
                /*
                  'lugarEjecucion'=>array(
                  'label'=>'Lugar Ejecucion',
                  'type'=>'dropdownlist',
                  'items'=>CHtml::listData(LugarEjecucion::model()->findAll(),'ID_LE', 'NOMBRE_LE'),
                  'prompt'=>'Seleccione un Lugar de Ejecucion',
                  ),
                 */
                /*
                  'direccionLugarEjecucion'=>array(
                  'label'=>'Direccion Lugar Ejecucion'
                  ),
                 */
                /*
                  'departamento'=>array(
                  'label'=>'Departamento',
                  'type'=>'dropdownlist',
                  'items'=>CHtml::listData(Departamento::model()->findAll(),'ID_DEPTO', 'NOMBRE_DEPTO'),
                  'prompt'=>'Seleccione un Departamento',
                  ),
                  'provincia'=>array(
                  'label'=>'Provincia',
                  'type'=>'dropdownlist',
                  'items'=>CHtml::listData(Provincia::model()->findAll(),'ID_PROVINCIA', 'NOMBRE_PROVINCIA'),
                  'prompt'=>'Seleccione una Provincia',
                  ),
                  'seccion'=>array(
                  'label'=>'Seccion',
                  'type'=>'dropdownlist',
                  'items'=>CHtml::listData(Seccion::model()->findAll(),'ID_SECCION', 'NOMBRE_SECCION'),
                  'prompt'=>'Seleccione una Seccion',
                  ),
                 */
                /*
                  'nombreSupervisor'=>array(
                  'label'=>'Nombre Supervisor'
                  ),
                 */
                /*
                  'telefonoLugarEjecucion'=>array(
                  'label'=>'Telefono Lugar Ejecucion'
                  ),
                 */
                'suscripcionConvenio' => array(
                    'label' => 'Suscripcion Convenio',
                    'class' => 'datepicker',
                ),
                'primeraListaCotejo' => array(
                    'label' => 'Lista Cotejo de Seguimiento',
                    'class' => 'datepicker',
                ),
                  'primerInformeAvance'=>array(
                  'label'=>'Primer Informe Avance',//borrar
                  'class'=>'datepicker',
                  ),
                'informeFinal' => array(
                    'label' => 'Informe Final',
                    'class' => 'datepicker',
                ),
                'informeFinalForma' => array(
                    'label' => 'Informe Final de Forma',
                    'class' => 'datepicker',
                ),
                'documento' => array(
                    'label' => 'Documento',
                    'type' => 'file',
                ),
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
