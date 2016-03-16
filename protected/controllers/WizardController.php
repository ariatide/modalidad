<?php

class WizardController extends CController {

    public $layout = '//layouts/registroModalidad';
    private $_indexFiles = 'runtime.search';

    /*
      public function init(){
      Yii::import('application.vendors.*');
      require_once('Zend/Search/Lucene.php');
      require_once('Zeflnd/Search/Lucene/Analysis/TokenFilter/StopWords.php');
      parent::init();
      }
     */

    /**
     * @return array action filters
     */
//	public function filters()
//	{
//		return array(
//			'accessControl'
//		);
//	}

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function filters() {
        return array(array('CrugeAccessControlFilter'));
    }

    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('proyecto'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function behaviors() {
        return array(
            'proyecto' => array(
                'class' => 'application.components.WizardBehavior',
                'steps' => array('postulante', array('proyectoTesis' => array('Proyecto' => 'proyectoTesis'), 'proyectoAdscripcion' => array('Proyecto' => 'proyectoAdscripcion'), 'proyectoTDirigido' => array('Proyecto' => 'proyectoTDirigido')), array('tesis' => array('tesis'), 'adscripcion' => array('adscripcion'), 'trabajoDirigido' => array('trabajoDirigido')), 'verificacion'),
                'events' => array(
                    'onStart' => 'wizardStart',
                    'onProcessStep' => 'registrationWizardProcessStep',
                    'onFinished' => 'wizardFinished',
                    'onInvalidStep' => 'wizardInvalidStep',
                    'onSaveDraft' => 'wizardSaveDraft'
                ),
                'menuLastItem' => 'Finalizo'
            )
        );
    }

    public function actionProyecto($step = null) {
        $this->pageTitle = 'Registro Proyecto';
        $this->process($step);
    }

    public function wizardStart($event) {
        $event->handled = true;

        /*
          //$event->handled = false;

          echo "Ingrea a iniciar el flujo del wizard";

          //nuebo = 66;

          if(!empty($_GET['carrera'])) {
          $model->carrera = $_GET['carrera'];
          Yii::app()->session['carrera'] = $_GET['carrera'];
          }


          if(!empty($_GET['modalidad'])) {
          $modalidad = $_GET['modalidad'];

          if ($modalidad==='Tesis')
          $event->sender->branch(array(
          'proyectoTesis'=>WizardBehavior::BRANCH_SELECT,
          'proyectoAdscripcion'=>WizardBehavior::BRANCH_DESELECT,
          'proyectoTDirigido'=>WizardBehavior::BRANCH_DESELECT,
          'tesis'=>WizardBehavior::BRANCH_SELECT,
          'adscripcion'=>WizardBehavior::BRANCH_DESELECT,
          'trabajoDirigido'=>WizardBehavior::BRANCH_DESELECT,
          ));
          elseif ($modalidad==='Adscripcion')
          $event->sender->branch(array(
          'proyectoAdscripcion'=>WizardBehavior::BRANCH_SELECT,
          'proyectoTDirigido'=>WizardBehavior::BRANCH_DESELECT,
          'proyectoTesis'=>WizardBehavior::BRANCH_DESELECT,
          'tesis'=>WizardBehavior::BRANCH_DESELECT,
          'adscripcion'=>WizardBehavior::BRANCH_SELECT,
          'trabajoDirigido'=>WizardBehavior::BRANCH_DESELECT,
          ));
          elseif ($modalidad==='Trabajo Dirigido')
          $event->sender->branch(array(
          'proyectoTDirigido'=>WizardBehavior::BRANCH_SELECT,
          'proyectoAdscripcion'=>WizardBehavior::BRANCH_DESELECT,
          'proyectoTesis'=>WizardBehavior::BRANCH_DESELECT,
          'tesis'=>WizardBehavior::BRANCH_DESELECT,
          'adscripcion'=>WizardBehavior::BRANCH_DESELECT,
          'trabajoDirigido'=>WizardBehavior::BRANCH_SELECT,
          ));

          // Se guarda la modalidad en la session para recuperalo despues
          Yii::app()->session['modalidad'] = $modalidad;


          }
         */
    }

    public function registrationWizardProcessStep($event) {

// Se obtiene la session para recuperar datos de la misma
        $session_yii = Yii::app()->getSession();

        $formName = 'Form' . ucfirst($event->step);
        $model = new $formName();



//echo "Ingresa a manejar el paso del proceso";
//print_r($_GET);
// Aqui se define el camino del wizard
        $modalidad = $modalidad = Yii::app()->session['modalidad'];

//echo 'modalidad:'.$modalidad;

        if (!empty($modalidad)) {
            if ($modalidad === 'Tesis') {
                $event->sender->branch(array(
                    'proyectoTesis' => WizardBehavior::BRANCH_SELECT,
                    'proyectoAdscripcion' => WizardBehavior::BRANCH_DESELECT,
                    'proyectoTDirigido' => WizardBehavior::BRANCH_DESELECT,
                    'tesis' => WizardBehavior::BRANCH_SELECT,
                    'adscripcion' => WizardBehavior::BRANCH_DESELECT,
                    'trabajoDirigido' => WizardBehavior::BRANCH_DESELECT,
                ));
            } elseif ($modalidad === 'Adscripcion') {
                $event->sender->branch(array(
                    'proyectoAdscripcion' => WizardBehavior::BRANCH_SELECT,
                    'proyectoTDirigido' => WizardBehavior::BRANCH_DESELECT,
                    'proyectoTesis' => WizardBehavior::BRANCH_DESELECT,
                    'tesis' => WizardBehavior::BRANCH_DESELECT,
                    'adscripcion' => WizardBehavior::BRANCH_SELECT,
                    'trabajoDirigido' => WizardBehavior::BRANCH_DESELECT,
                ));
            } elseif ($modalidad === 'Trabajo Dirigido') {
                $event->sender->branch(array(
                    'proyectoTDirigido' => WizardBehavior::BRANCH_SELECT,
                    'proyectoAdscripcion' => WizardBehavior::BRANCH_DESELECT,
                    'proyectoTesis' => WizardBehavior::BRANCH_DESELECT,
                    'tesis' => WizardBehavior::BRANCH_DESELECT,
                    'adscripcion' => WizardBehavior::BRANCH_DESELECT,
                    'trabajoDirigido' => WizardBehavior::BRANCH_SELECT,
                ));
            }
            if ($modalidad === 'Tesis') {
                unset(Yii::app()->session['Wizard.steps']['proyectoTDirigido']);
                unset(Yii::app()->session['Wizard.steps']['proyectoAdscripcion']);
            } elseif ($modalidad === 'Adscripcion') {
                unset(Yii::app()->session['Wizard.steps']['proyectoTDirigido']);
                unset(Yii::app()->session['Wizard.steps']['proyectoTesis']);
            } else {
                unset(Yii::app()->session['Wizard.steps']['proyectoTesis']);
                unset(Yii::app()->session['Wizard.steps']['proyectoAdscripcion']);
            }
        }





        if ($event->step === 'postulante') {

            /*

              if(!empty($_GET['carrera'])) {
              $model->carrera = $_GET['carrera'];
              Yii::app()->session['carrera'] = $_GET['carrera'];
              }

              if(!empty($_GET['modalidad'])) {
              $modalidad = $_GET['modalidad'];

              if ($modalidad==='Tesis')
              $event->sender->branch(array(
              'proyectoTesis'=>WizardBehavior::BRANCH_SELECT,
              'proyectoAdscripcion'=>WizardBehavior::BRANCH_DESELECT,
              'proyectoTDirigido'=>WizardBehavior::BRANCH_DESELECT,
              'tesis'=>WizardBehavior::BRANCH_SELECT,
              'adscripcion'=>WizardBehavior::BRANCH_DESELECT,
              'trabajoDirigido'=>WizardBehavior::BRANCH_DESELECT,
              ));
              elseif ($modalidad==='Adscripcion')
              $event->sender->branch(array(
              'proyectoAdscripcion'=>WizardBehavior::BRANCH_SELECT,
              'proyectoTDirigido'=>WizardBehavior::BRANCH_DESELECT,
              'proyectoTesis'=>WizardBehavior::BRANCH_DESELECT,
              'tesis'=>WizardBehavior::BRANCH_DESELECT,
              'adscripcion'=>WizardBehavior::BRANCH_SELECT,
              'trabajoDirigido'=>WizardBehavior::BRANCH_DESELECT,
              ));
              elseif ($modalidad==='Trabajo Dirigido')
              $event->sender->branch(array(
              'proyectoTDirigido'=>WizardBehavior::BRANCH_SELECT,
              'proyectoAdscripcion'=>WizardBehavior::BRANCH_DESELECT,
              'proyectoTesis'=>WizardBehavior::BRANCH_DESELECT,
              'tesis'=>WizardBehavior::BRANCH_DESELECT,
              'adscripcion'=>WizardBehavior::BRANCH_DESELECT,
              'trabajoDirigido'=>WizardBehavior::BRANCH_SELECT,
              ));

              // Se guarda la modalidad en la session para recuperalo despues
              Yii::app()->session['modalidad'] = $modalidad;

              if ($modalidad==='Tesis') {
              unset(Yii::app()->session['Wizard.steps']['proyectoTDirigido']);
              unset(Yii::app()->session['Wizard.steps']['proyectoAdscripcion']);
              } elseif($modalidad==='Adscripcion') {
              unset(Yii::app()->session['Wizard.steps']['proyectoTDirigido']);
              unset(Yii::app()->session['Wizard.steps']['proyectoTesis']);
              } else {
              unset(Yii::app()->session['Wizard.steps']['proyectoTesis']);
              unset(Yii::app()->session['Wizard.steps']['proyectoAdscripcion']);
              }
              }

             */
        }

        if ($event->step === 'tesis') {

// Se establecen por defecto los valores de ciertos elementos del fomulario
            if (!empty($session_yii['Wizard.steps']['proyectoTesis']['fechaRegistro'])) {
                $model->aprobacionPertinencia = $session_yii['Wizard.steps']['proyectoTesis']['fechaRegistro'];
            }
        }


        if ($event->step === 'postulante') {
            $model->carrera = $session_yii['carrera'];
        }

        if ($event->step === 'proyectoTesis' || $event->step === 'proyectoAdscripcion' || $event->step === 'proyectoTDirigido') {
            $model->modalidad = $session_yii['modalidad'];
        }

        $model->attributes = $event->data;

        $form = $model->getForm();

// Note that we also allow sumission via the Save button
        if (($form->submitted() || $form->submitted('save_draft')) && $form->validate()) {
            if ($event->step === 'postulante') {
                /*
                  $modalidad = Yii::app()->session['modalidad'];

                  if ($modalidad==='Tesis')
                  $event->sender->branch(array(
                  'proyectoTesis'=>WizardBehavior::BRANCH_SELECT,
                  'proyectoAdscripcion'=>WizardBehavior::BRANCH_DESELECT,
                  'proyectoTDirigido'=>WizardBehavior::BRANCH_DESELECT,
                  ));
                  elseif ($modalidad==='Adscripcion')
                  $event->sender->branch(array(
                  'proyectoAdscripcion'=>WizardBehavior::BRANCH_SELECT,
                  'proyectoTDirigido'=>WizardBehavior::BRANCH_DESELECT,
                  'proyectoTesis'=>WizardBehavior::BRANCH_DESELECT,
                  ));
                  elseif ($modalidad==='Trabajo Dirigido')
                  $event->sender->branch(array(
                  'proyectoTDirigido'=>WizardBehavior::BRANCH_SELECT,
                  'proyectoAdscripcion'=>WizardBehavior::BRANCH_DESELECT,
                  'proyectoTesis'=>WizardBehavior::BRANCH_DESELECT,
                  ));
                 */
            }


            if ($event->step === 'proyectoTesis' || $event->step === 'proyectoAdscripcion' || $event->step === 'proyectoTDirigido') {

                /*
                  if ($model->modalidad==='Tesis')
                  $event->sender->branch(array(
                  'tesis'=>WizardBehavior::BRANCH_SELECT,
                  'adscripcion'=>WizardBehavior::BRANCH_DESELECT,
                  'trabajoDirigido'=>WizardBehavior::BRANCH_DESELECT
                  ));
                  elseif ($model->modalidad==='Adscripcion')
                  $event->sender->branch(array(
                  'tesis'=>WizardBehavior::BRANCH_DESELECT,
                  'adscripcion'=>WizardBehavior::BRANCH_SELECT,
                  'trabajoDirigido'=>WizardBehavior::BRANCH_DESELECT
                  ));
                  elseif ($model->modalidad==='Trabajo Dirigido')
                  $event->sender->branch(array(
                  'tesis'=>WizardBehavior::BRANCH_DESELECT,
                  'adscripcion'=>WizardBehavior::BRANCH_DESELECT,
                  'trabajoDirigido'=>WizardBehavior::BRANCH_SELECT
                  ));
                 */
            }

            $event->sender->save($model->attributes);
//$this->data[$formName] = $event->data;
            $event->handled = true;
        } else {
            if ($event->step === 'verificacion') {

// codigo agregado para mostrar lo datos llenados en el paso verificacion
                $session_yii = Yii::app()->getSession();
                $data = array();
                $data['postulante'] = $session_yii['Wizard.steps']['postulante'];

                /*
                  if (isset($session_yii['Wizard.steps']['proyectoTesis'])) {
                  $data['proyectoTesis'] = $session_yii['Wizard.steps']['proyectoTesis'];
                  $modalidad = $data['proyectoTesis']['modalidad'];
                  } else {
                  $data['proyectoAdscripcionTDirigido'] = $session_yii['Wizard.steps']['proyectoAdscripcionTDirigido'];
                  $modalidad = $data['proyectoAdscripcionTDirigido']['modalidad'];
                  }
                 */

                $modalidad = Yii::app()->session['modalidad'];

                if ($modalidad === 'Tesis') {
                    $data['tesis'] = $session_yii['Wizard.steps']['tesis'];
                    $data['proyectoTesis'] = $session_yii['Wizard.steps']['proyectoTesis'];
                } elseif ($modalidad === 'Adscripcion') {
                    $data['adscripcion'] = $session_yii['Wizard.steps']['adscripcion'];
                    $data['proyectoAdscripcion'] = $session_yii['Wizard.steps']['proyectoAdscripcion'];
                } elseif ($modalidad === 'Trabajo Dirigido') {
                    $data['trabajoDirigido'] = $session_yii['Wizard.steps']['trabajoDirigido'];
                    $data['proyectoTDirigido'] = $session_yii['Wizard.steps']['proyectoTDirigido'];
                }

// fin del codigo agregado
                $this->render('form', compact('event', 'form', 'data'));
            } else {
                $this->render('form', compact('event', 'form'));
            }
        }
    }

    public function wizardFinished($event) {
        $data = $event->data;

        if (isset($data['proyectoTesis'])) {
            $data['proyecto'] = $data['proyectoTesis'];
        } elseif (isset($data['proyectoAdscripcion'])) {
            $data['proyecto'] = $data['proyectoAdscripcion'];
        } else {
            $data['proyecto'] = $data['proyectoTDirigido'];
        }

        $data['proyecto']['fechaRegistro'] = $this->convertirFecha($data['proyecto']['fechaRegistro']);

// Se registra los datos de postulante
        $postulante = new Postulante();
        $postulante->NOMBRE_POS = $data['postulante']['nombres'];
        $postulante->APEPAT_POS = $data['postulante']['apellidoPaterno'];
        $postulante->APEMAT_POS = $data['postulante']['apellidoMaterno'];
        $postulante->TELFIJO_POS = $data['postulante']['telefonoFijo'];
        $postulante->GENERO_POS = $data['postulante']['genero'];
        $postulante->CI_POS = $data['postulante']['ci'];
        $postulante->ID_CARRERA = $data['postulante']['carrera'];
        $postulante->OBSERVACION_POS = 'Sin Observacion';
        if (!$postulante->save()) {
            print_r($postulante->getErrors());
        }

// Se registra los datos de Registro
        $registro = new Registro();
        $registro->ID_POS = $postulante->ID_POS;
        $registro->FECHA_REGISTRO = $data['proyecto']['fechaRegistro']; //////poner fecha sistema
//	$registro->ID_USR = Yii::app()->user->idUsuario;
        $registro->ID_USR = Yii::app()->user->id;
        if (!$registro->save()) {
            print_r($registro->getErrors());
        }


// Se registra los datos de Proyecto
        $proyecto = new Proyecto();

//print_r($data['proyecto']);




        if (empty($data['proyecto']['tutorId']) && empty($data['proyecto']['tutor'])) {

//echo "No tiene datos de tutor1";

            $proyecto->ID_TUTOR = new CDbExpression('NULL');
        } else {

//echo "Tiene datos de tutor2";
// Se verifica si se ha seleccionado un tutor existente un se quiere crear un nuevo

            $docenteId = '';
// Si es vacio es un nuevo docente que hay que crear
            if (empty($data['proyecto']['tutorId'])) {
// Se procede a crear el nuevo docente
                $docente = new Docente();
                $docente->NOMBRE_DOCENTE = $data['proyecto']['tutor'];
                $docente->save();
                $docenteId = $docente->ID_DOCENTE;
            } else {
                $docenteId = $data['proyecto']['tutorId'];
            }

//echo "DocenteId:".$docenteId;
// Se registra la relacion con el Tutor
            $tutor = new Tutor();
//$tutor->ID_DOCENTE  = $data['proyecto']['tutor'];
            $tutor->ID_DOCENTE = $docenteId;
            $tutor->FECHA_ASIGN_TUTOR = $data['proyecto']['fechaRegistro'];
            if (!$tutor->save()) {
                print_r($tutor->getErrors());
            }

//echo "ID_TUTOR:".$tutor->ID_TUTOR;

            $proyecto->ID_TUTOR = $tutor->ID_TUTOR;
        }



        $proyecto->ID_POS = $postulante->ID_POS;
        $proyecto->ID_AREA = $data['proyecto']['areaJuridica'];
        $proyecto->TEMA_PROYECTO = $data['proyecto']['titulo'];
        $proyecto->NRO_FOLDER = $data['proyecto']['numeroConvenio'];
        $proyecto->ESTADO_PROY = $data['proyecto']['estado'];
// Esto hay que aumentar campo en la base de datos para registrar
        $proyecto->FECHA_INSCRIP_PROY = $data['proyecto']['fechaRegistro'];
        $proyecto->OBSERVACION_PROYECTO = $data['proyecto']['observaciones'];

        $proyecto->MODALIDAD = $data['proyecto']['modalidad'];
        if (!$proyecto->save(false)) {
            print_r($proyecto->getErrors());
        }

// Se procede a registrar los datos especificos de la modalidad de titulacion
        if ($data['proyecto']['modalidad'] === 'Tesis') {



            $tesis = new ProyectoTesis();
            $tesis->ID_PROYECTO = $proyecto->ID_PROYECTO;
            $tesis->APROBACIONPERTINENCIA = $this->convertirFecha($data['tesis']['aprobacionPertinencia']);
            if (!empty($data['tesis']['informeFinTutor']))
                $tesis->FECHA_INFORMEFIN_TUTOR = $this->convertirFecha($data['tesis']['informeFinTutor']);
            if (!empty($data['tesis']['fechaInformeFinal']))
                $tesis->FECHA_INFORMEFINALIIJP = $this->convertirFecha($data['tesis']['fechaInformeFinal']);


            $tesis->RESUMEN_TESIS = $data['tesis']['resumenTesis'];
            /*
              $data['proyecto']['documento']=CUploadedFile::getInstance(new C,'tesisfile');
              if( CUploadedFile::getInstance($data['tesis'],'tesisfile')) {
              }else{
              }
             */
            // $proyecto->DOCUMENTO= CUploadedFile :: getInstance ( $proyecto,$data['tesis']['tesis']) ;
            // $proyecto->DOCUMENTO->saveAs(Yii::app()->basePath . '/documentos/' . $proyecto->DOCUMENTO->name);


            $tesis->save();
// Se procede a registrar los datos especificos de la modalidad de Adscripcion
        } elseif ($data['proyecto']['modalidad'] === 'Adscripcion') {
            $adscripcion = new ProyectoAdscripcion();
            $adscripcion->ID_PROYECTO = $proyecto->ID_PROYECTO;

            if (empty($data['proyectoAdscripcion']['unidadPatrocinadoraId']) && empty($data['proyectoAdscripcion']['unidadPatrocinadora'])) {
                $adscripcion->ID_UP = new CDbExpression('NULL');
            } else {
// Se pregunta si se ha seleccioando un lugar de ejecucion existente o se tiene que crear uno nuevo
                if (empty($data['proyectoAdscripcion']['unidadPatrocinadoraId'])) {
// Se procede a crear el nuevo docente
                    $unidadPatrocinadora = new UnidadPatrocinadora();
                    $unidadPatrocinadora->NOMBRE_UP = $data['proyectoAdscripcion']['unidadPatrocinadora'];
                    $unidadPatrocinadora->save();
                    $unidadPatrocinadoraId = $unidadPatrocinadora->ID_UP;
                } else {
                    $unidadPatrocinadoraId = $data['proyectoAdscripcion']['unidadPatrocinadoraId'];
                }
                $adscripcion->ID_UP = $unidadPatrocinadoraId;
            }

            $adscripcion->ID_SECCION = $data['proyectoAdscripcion']['provincia'];
            $adscripcion->FECHA_SUBSCRIPCIONCONVENIO_ADS = $this->convertirFecha($data['adscripcion']['subscripcionConvenio']);
            $adscripcion->NOMBRE_SUPERVISOR_ADS = $data['proyectoAdscripcion']['nombreSupervisor'];
            if (!empty($data['adscripcion']['primeraListaCotejo']))
                $adscripcion->FECHA_INFORME1_ADS = $this->convertirFecha($data['adscripcion']['primeraListaCotejo']);
            if (!empty($data['adscripcion']['primerInformeAvance']))
                $adscripcion->FECHA_INFORME2_ADS = $this->convertirFecha($data['adscripcion']['primerInformeAvance']);
            if (!empty($data['adscripcion']['informeFinal']))
                $adscripcion->FECHA_INFORMEFIN_ADS = $this->convertirFecha($data['adscripcion']['informeFinal']);
            if (!empty($data['adscripcion']['informeFinalForma']))
                $adscripcion->FECHA_INFORMEFINFORMA_ADS = $this->convertirFecha($data['adscripcion']['informeFinalForma']);

//$adscripcion->save();

            if (!$adscripcion->save(false)) {

                print_r($adscripcion->getErrors());
            }



// Se procede a registrar los datos especificos de la modalidad de Trabajo Dirigido
        } elseif ($data['proyecto']['modalidad'] === 'Trabajo Dirigido') {
            $dirigido = new ProyectoTdirigido();
            $dirigido->ID_PROYECTO = $proyecto->ID_PROYECTO;
            $dirigido->SUSCRIPCIONCONVENIO = $this->convertirFecha($data['trabajoDirigido']['suscripcionConvenio']);
            $dirigido->PRIMERALISTACOTEJO = $this->convertirFecha($data['trabajoDirigido']['primeraListaCotejo']);
            $dirigido->INFORMEFINAL = $this->convertirFecha($data['trabajoDirigido']['informeFinal']);
            $dirigido->INFORMEFINALFORMA = $this->convertirFecha($data['trabajoDirigido']['informeFinalForma']);
            $dirigido->ID_SECCION = $data['proyectoTDirigido']['provincia'];


            if (empty($data['proyectoTDirigido']['lugarEjecucionId']) && empty($data['proyectoTDirigido']['lugarEjecucion'])) {

                $dirigido->ID_LE = new CDbExpression('NULL');
            } else {

// Se pregunta si se ha seleccioando un lugar de ejecucion existente o se tiene que crear uno nuevo
                if (empty($data['proyectoTDirigido']['lugarEjecucionId'])) {
// Se procede a crear el nuevo docente
                    $lugarEjecucion = new LugarEjecucion();
                    $lugarEjecucion->NOMBRE_LE = $data['proyectoTDirigido']['lugarEjecucion'];
                    $lugarEjecucion->save();
                    $lugarEjecucionId = $lugarEjecucion->ID_LE;
                } else {
                    $lugarEjecucionId = $data['proyectoTDirigido']['lugarEjecucionId'];
                }

                $dirigido->ID_LE = $lugarEjecucionId;
            }


            $dirigido->NOMBRE_SUPERVISOR_TD = $data['proyectoTDirigido']['nombreSupervisor'];

            if (!empty($data['trabajoDirigido']['primeraListaCotejo'])) {
                $dirigido->PRIMERALISTACOTEJO = $this->convertirFecha($data['trabajoDirigido']['primeraListaCotejo']);
            } else {
                $dirigido->PRIMERALISTACOTEJO = new CDbExpression('NULL');
            }
            if (!empty($data['trabajoDirigido']['primerInformeAvance'])) {
                $dirigido->PRIMERINFORMEAVANCE = $this->convertirFecha($data['trabajoDirigido']['primerInformeAvance']);
            } else {
                $dirigido->PRIMERINFORMEAVANCE = new CDbExpression('NULL');
            }
            if (!empty($data['trabajoDirigido']['informeFinal'])) {
                $dirigido->INFORMEFINAL = $this->convertirFecha($data['trabajoDirigido']['informeFinal']);
            } else {
                $dirigido->INFORMEFINAL = new CDbExpression('NULL');
            }
            if (!empty($data['trabajoDirigido']['informeFinalForma'])) {
                $dirigido->INFORMEFINALFORMA = $this->convertirFecha($data['trabajoDirigido']['informeFinalForma']);
            } else {
                $dirigido->INFORMEFINALFORMA = new CDbExpression('NULL');
            }
            $dirigido->save(false);
        }

//$this->agregarIndiceLucene($proyecto->TEMA_PROYECTO, $postulante->NOMBRE_POS, $postulante->APEPAT_POS, $postulante->APEMAT_POS, $proyecto->ID_PROYECTO,
//	$proyecto->MODALIDAD, $postulante->ID_CARRERA);

        Util::agregarIndiceLucene($proyecto->TEMA_PROYECTO, $postulante->NOMBRE_POS, $postulante->APEPAT_POS, $postulante->APEMAT_POS, $proyecto->ID_PROYECTO, $proyecto->MODALIDAD, $postulante->ID_CARRERA);

        if ($event->step === true)
            $this->render('completed', compact('event'));
        else
            $this->render('finished', compact('event'));

        $event->sender->reset();
        Yii::app()->end();
    }

    /*
      private function agregarIndiceLucene($titulo, $nombrePostulante, $apellidoPaternoPostulante,
      $apellidoMaternoPostulante, $idProyecto, $modalidad, $carrera) {

      $stopWordsFilter = new Zend_Search_Lucene_Analysis_TokenFilter_StopWords();
      $stopWordsFilter->loadFromFile(YiiBase::getPathOfAlias('application.config').'/stopwords.txt');

      Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding('utf-8');
      $analyzer = new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive();
      $analyzer->addFilter($stopWordsFilter);
      Zend_Search_Lucene_Analysis_Analyzer::setDefault($analyzer);

      if (!empty($titulo)) {
      // Esto solo se va ha ejecutar la primera vez
      //$index = Zend_Search_Lucene::create(Yii::getPathOfAlias('application.' . $this->_indexFiles));
      $index = Zend_Search_Lucene::open(Yii::getPathOfAlias('application.' . $this->_indexFiles));

      // Se procede a agregar un elemento al indice de busqueda
      $doc = new Zend_Search_Lucene_Document();
      $doc->addField(Zend_Search_Lucene_Field::Text('titulo', CHtml::encode(strtolower($titulo)), 'utf-8'));
      $doc->addField(Zend_Search_Lucene_Field::Text('nombrePostulante', CHtml::encode(strtolower($nombrePostulante)), 'utf-8'));
      $doc->addField(Zend_Search_Lucene_Field::Text('apellidoPaternoPostulante', CHtml::encode(strtolower($apellidoPaternoPostulante)), 'utf-8'));
      $doc->addField(Zend_Search_Lucene_Field::Text('apellidoMaternoPostulante', CHtml::encode(strtolower($apellidoMaternoPostulante)), 'utf-8'));

      $doc->addField(Zend_Search_Lucene_Field::UnIndexed('idProyecto', CHtml::encode($idProyecto), 'utf-8'));
      $doc->addField(Zend_Search_Lucene_Field::UnIndexed('modalidad', CHtml::encode($modalidad), 'utf-8'));
      $doc->addField(Zend_Search_Lucene_Field::UnIndexed('carrera', CHtml::encode($carrera), 'utf-8'));
      $index->addDocument($doc);
      $index->commit();
      }
      }
     */

    public function wizardInvalidStep($event) {
        Yii::app()->getUser()->setFlash('notice', $event->step . ' is not a vaild step in this wizard');
    }

    private function convertirFecha($fecha) {
        $fechaConvertida = '';
        $valuesFecha = explode('/', $fecha);
        if (!empty($fecha)) {
            $fechaConvertida = $valuesFecha[2] . '/' . $valuesFecha[1] . '/' . $valuesFecha[0];
        }
        return $fechaConvertida;
    }

}
