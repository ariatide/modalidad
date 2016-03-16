<?php

class VacioController extends Controller {

    public $layout='//layouts/vacio';
//    public function filters() {
//        return array('accessControl', array('CrugeAccessControlFilter'));
//    }

       public function actionCreateImagen() {
        $model = new imagen;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['imagen'])) {
            $model->attributes = $_POST['imagen'];
            if ($model->save())
                $form->model->NOMBRE_IMAGEN = CUploadedFile::getInstance($form->model, 'NOMBRE_IMAGEN');
            CUploadedFile::getInstance($form->model, 'image');
                $this->redirect(array('administrador/createproy'));
        }

        $this->render('createImagen', array(
            'model' => $model,
        ));
    }
}

?>