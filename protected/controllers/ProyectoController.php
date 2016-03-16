<?php

class ProyectoController extends Controller {

    public $layout = '//layouts/modalidades';

    public function filters() {
        return array(array('CrugeAccessControlFilter'));
    }

    public function actionModificarTrabajoDirigido($id) {
// Se procede a cargar los datos del proyecto y trabajo dirigido
        $proyecto = $this->loadModel($id);
        $trabajoDirigido = ProyectoTdirigido::model()->findByAttributes(array('ID_PROYECTO' => $proyecto->ID_PROYECTO));

        $model = new FormEditarTrabajoDirigido();

        if (isset($_POST['FormEditarTrabajoDirigido'])) {
//echo "Se han envaido los datos al formulario";
//	print_r($_POST);

            $model->attributes = $_POST['FormEditarTrabajoDirigido'];
            if ($model->validate()) {
// Se procede a guardar los datos del proyecto
                $proyecto->ESTADO_PROY = $model->estado;
                $proyecto->TEMA_PROYECTO = $model->temaProyecto;
                $this->guardarArchivo($proyecto, $model);


// Se procede a guardar los datos del trabajo dirigido

                $trabajoDirigido->PRIMERALISTACOTEJO = empty($model->primeraListaCotejo) ? new CDbExpression('NULL') : Util::convertirFecha($model->primeraListaCotejo);
                $trabajoDirigido->PRIMERINFORMEAVANCE = empty($model->listaCotejoSeguimiento) ? new CDbExpression('NULL') : Util::convertirFecha($model->listaCotejoSeguimiento);
                $trabajoDirigido->INFORMEFINAL = empty($model->listaCotejoInformeFinal) ? new CDbExpression('NULL') : Util::convertirFecha($model->listaCotejoInformeFinal);
                $trabajoDirigido->INFORMEFINALFORMA = empty($model->informeFinalForma) ? new CDbExpression('NULL') : Util::convertirFecha($model->informeFinalForma);
                $proyecto->PRORROGA = empty($model->prorroga) ? new CDbExpression('NULL') : Util::convertirFecha($model->prorroga);
                $trabajoDirigido->TEMA_ANTERIOR_TD = $model->temaAnterior;


                $trabajoDirigido->save();
                $proyecto->save();

                $postulante = Postulante::model()->findByPk($proyecto->ID_POS);

                Util::actualizarIndiceBulk($proyecto->TEMA_PROYECTO, $postulante->NOMBRE_POS, $postulante->APEPAT_POS, $postulante->APEMAT_POS, $proyecto->ID_PROYECTO, $proyecto->MODALIDAD, $postulante->ID_CARRERA);
                $this->redirect(array('verProyectoTrabajoDirigido', 'id' => $proyecto->ID_PROYECTO));
            }
        } else {
// Cargamos los datos del proyecto y trabajo dirigido en el formulario
            $model->estado = $proyecto->ESTADO_PROY;
            $model->temaProyecto = $proyecto->TEMA_PROYECTO;
            $model->documento = $proyecto->DOCUMENTO;
            $model->idProyecto = $proyecto->ID_PROYECTO;


            $model->primeraListaCotejo = Util::convertirFechaMostrarInterfaz($trabajoDirigido->PRIMERALISTACOTEJO);
            $model->listaCotejoSeguimiento = Util::convertirFechaMostrarInterfaz($trabajoDirigido->PRIMERINFORMEAVANCE);
            $model->listaCotejoInformeFinal = Util::convertirFechaMostrarInterfaz($trabajoDirigido->INFORMEFINAL);
            $model->informeFinalForma = Util::convertirFechaMostrarInterfaz($trabajoDirigido->INFORMEFINALFORMA);
            $model->prorroga = Util::convertirFechaMostrarInterfaz($proyecto->PRORROGA);
            $model->temaAnterior = $trabajoDirigido->TEMA_ANTERIOR_TD;
        }

        $this->render('modificarTrabajoDirigido', array(
            'model' => $model,'id' => $id,
        ));
    }

    public function actionModificarTesis($id) {
        $proyecto = $this->loadModel($id);
        $proyectoTesis = ProyectoTesis::model()->findByAttributes(array('ID_PROYECTO' => $proyecto->ID_PROYECTO));

        $model = new FormEditarTesis();

        if (isset($_POST['FormEditarTesis'])) {
            $model->attributes = $_POST['FormEditarTesis'];

            $proyectoTesis->FECHA_INFORMEFIN_TUTOR = empty($model->fechaInformeFinTutor) ? new CDbExpression('NULL') : Util::convertirFecha($model->fechaInformeFinTutor);
            $proyectoTesis->FECHA_INFORMEFINALIIJP = empty($model->fechaInformeFinal) ? new CDbExpression('NULL') : Util::convertirFecha($model->fechaInformeFinal);
            $proyecto->ESTADO_PROY = $model->estado;
            $proyectoTesis->RESUMEN_TESIS = $model->resumenTesis;
            $proyecto->TEMA_PROYECTO = $model->temaProyecto;

            $this->guardarArchivo($proyecto, $model);
            $proyecto->save();
            $proyectoTesis->save();

            $postulante = Postulante::model()->findByPk($proyecto->ID_POS);

            Util::actualizarIndiceBulk($proyecto->TEMA_PROYECTO, $postulante->NOMBRE_POS, $postulante->APEPAT_POS, $postulante->APEMAT_POS, $proyecto->ID_PROYECTO, $proyecto->MODALIDAD, $postulante->ID_CARRERA);

            $this->redirect(array('verProyectoTesis', 'id' => $proyecto->ID_PROYECTO, ''));
        } else {

// Cargamos los datos del proyecto y trabajo dirigido en el formulario
            $model->fechaInformeFinTutor = Util::convertirFechaMostrarInterfaz($proyectoTesis->FECHA_INFORMEFIN_TUTOR);
            $model->fechaInformeFinal = Util::convertirFechaMostrarInterfaz($proyectoTesis->FECHA_INFORMEFINALIIJP);
            $model->estado = "$proyecto->ESTADO_PROY";
            $model->resumenTesis = $proyectoTesis->RESUMEN_TESIS;
            $model->temaProyecto = $proyecto->TEMA_PROYECTO;
            $model->documento = $proyecto->DOCUMENTO;
        }

        $this->render('modificarTesis', array(
            'model' => $model,'id' => $id,
        ));
    }

    public function actionModificarAdscripcion($id) {
        $proyecto = $this->loadModel($id);
        $proyectoAdscripcion = ProyectoAdscripcion::model()->findByAttributes(array('ID_PROYECTO' => $proyecto->ID_PROYECTO));
        $tutor = Tutor::model()->findByAttributes(array('ID_TUTOR' => $proyecto->ID_TUTOR));
        $docente = Docente::model()->findByAttributes(array('ID_DOCENTE' => $tutor->ID_DOCENTE));

        $docentes = new CDbCriteria();
        $docentes->select = '*';
        $docentes = Docente::model()->findAll($docentes);
        $docentess = array();
        foreach ($docentes as $d) {
            $docentess[$d->ID_DOCENTE] = $d->NOMBRE_DOCENTE;
        }

        $model = new FormEditarAdscripcion();

        if (isset($_POST['FormEditarAdscripcion'])) {
            $model->attributes = $_POST['FormEditarAdscripcion'];

            $tut = Tutor::model()->findByAttributes(array('ID_DOCENTE' => $model->tutor));
            $proyecto->ID_TUTOR = $tut->ID_TUTOR;
            $proyectoAdscripcion->TEMA_ANTERIOR_ADS = $proyecto->TEMA_PROYECTO;
            $proyecto->TEMA_PROYECTO = $model->temaNuevoProyecto;
            $proyecto->OBJGRAL = $model->objgral;
            $proyecto->OBJESP = $model->objesp;
            $proyecto->DOCUMENTO = $model->documento;
            $proyecto->ESTADO_PROY = $model->estado;
            $proyecto->PRORROGA = empty($model->prorroga) ? new CDbExpression('NULL') : Util::convertirFecha($model->prorroga);
            $proyectoAdscripcion->FECHA_INFORME1_ADS = empty($model->fechaInforme1) ? new CDbExpression('NULL') : Util::convertirFecha($model->fechaInforme1);
            $proyectoAdscripcion->FECHA_INFORME2_ADS = empty($model->fechaInforme2) ? new CDbExpression('NULL') : Util::convertirFecha($model->fechaInforme2);
            $proyectoAdscripcion->FECHA_INFORMEFIN_ADS = empty($model->fechaInformeFin) ? new CDbExpression('NULL') : Util::convertirFecha($model->fechaInformeFin);
            $proyectoAdscripcion->FECHA_INFORMEFINFORMA_ADS = empty($model->fechaInformeFinForma) ? new CDbExpression('NULL') : Util::convertirFecha($model->fechaInformeFinForma);
            $proyectoAdscripcion->NOMBRE_SUPERVISOR_ADS = $model->supervisor;

            $this->guardarArchivo($proyecto, $model);
            $proyecto->save();
            $proyectoAdscripcion->save();

            $postulante = Postulante::model()->findByPk($proyecto->ID_POS);

            Util::actualizarIndiceBulk($proyecto->TEMA_PROYECTO, $postulante->NOMBRE_POS, $postulante->APEPAT_POS, $postulante->APEMAT_POS, $proyecto->ID_PROYECTO, $proyecto->MODALIDAD, $postulante->ID_CARRERA);

            $this->redirect(array('verProyectoAdscripcion', 'id' => $proyecto->ID_PROYECTO, 'id2' => $model->fechaInforme1,));
        } else {

            $model->tutor = $docente->ID_DOCENTE;
            $model->temaNuevoProyecto = $proyecto->TEMA_PROYECTO;
            $model->objgral = $proyecto->OBJGRAL;
            $model->objesp = $proyecto->OBJESP;
            $model->documento = $proyecto->DOCUMENTO;
            $model->prorroga = Util::convertirFechaMostrarInterfaz($proyecto->PRORROGA);
            $model->estado = $proyecto->ESTADO_PROY;
            $model->fechaInforme1 = Util::convertirFechaMostrarInterfaz($proyectoAdscripcion->FECHA_INFORME1_ADS);
            $model->fechaInforme2 = Util::convertirFechaMostrarInterfaz($proyectoAdscripcion->FECHA_INFORME2_ADS);
            $model->fechaInformeFin = Util::convertirFechaMostrarInterfaz($proyectoAdscripcion->FECHA_INFORMEFIN_ADS);
            $model->fechaInformeFinForma = Util::convertirFechaMostrarInterfaz($proyectoAdscripcion->FECHA_INFORMEFINFORMA_ADS);
            $model->supervisor = $proyectoAdscripcion->NOMBRE_SUPERVISOR_ADS;
        }

        $this->render('modificarAdscripcion', array(
            'model' => $model, 'docentes' => $docentess,'id' => $id,
        ));
    }

    private function guardarArchivo($proyecto, $model) {
        $uploadDocumento = CUploadedFile::getInstance($model, 'documento');
// Se pregunta si se ha seleccionado un archivo si es asi se procede a seleccionar el mismo
        if (!empty($uploadDocumento)) {
// Se establece la direccion base donde se guardaran los documentos del Trabajo dirigido (en este caso la carpeta proeycto)
            $pathTrabajoDirigido = Yii::getPathOfAlias('webroot') . '/upload/proyecto/' . $proyecto->ID_PROYECTO . '/';
// Si el proyecto ya tenia un documento se procede a eliminar el mismo
            if (!empty($proyecto->DOCUMENTO) && file_exists($pathTrabajoDirigido . $proyecto->DOCUMENTO))
                unlink($pathTrabajoDirigido . $proyecto->DOCUMENTO);
// Se procede a establecer el nueco doicumento del proyecto
            $proyecto->DOCUMENTO = $uploadDocumento;
// Se verific si existe el directorio del prpoyecto, si no existe se crea el mismo
            if (!file_exists($pathTrabajoDirigido))
                mkdir($pathTrabajoDirigido);
            $ubicacionArchivo = $pathTrabajoDirigido . $proyecto->DOCUMENTO;
// Se procede a guarda el archivo del proyecto en el directorio del proyecto
            $proyecto->DOCUMENTO->saveAs($ubicacionArchivo);
        }
    }

    public function actionVerProyectoTrabajoDirigido($id) {
        $proyecto = $this->loadModel($id);
        $trabajoDirigido = ProyectoTdirigido::model()->findByAttributes(array('ID_PROYECTO' => $proyecto->ID_PROYECTO));

        $this->render('verProyectoTrabajoDirigido', array(
            'proyecto' => $proyecto,
            'trabajoDirigido' => $trabajoDirigido,
        ));
    }

    public function actionVerProyectoTesis($id) {
        $proyecto = $this->loadModel($id);
        $proyectoTesis = ProyectoTesis::model()->findByAttributes(array('ID_PROYECTO' => $proyecto->ID_PROYECTO));


        $this->render('verProyectoTesis', array(
            'proyecto' => $proyecto,
            'proyectoTesis' => $proyectoTesis,
        ));
    }

    public function actionverProyectoAdscripcion($id) {
        $proyecto = $this->loadModel($id);
        $proyectoAdscripcion = ProyectoAdscripcion::model()->findByAttributes(array('ID_PROYECTO' => $proyecto->ID_PROYECTO));
        $tutor = Tutor::model()->findByAttributes(array('ID_TUTOR' => $proyecto->ID_TUTOR));
        $docente = Docente::model()->findByAttributes(array('ID_DOCENTE' => $tutor->ID_DOCENTE));

        $this->render('verProyectoAdscripcion', array(
            'proyecto' => $proyecto,
            'proyectoAdscripcion' => $proyectoAdscripcion,
            'docente' => $docente,
        ));
    }

    public function loadModel($id) {
        $model = Proyecto::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}
