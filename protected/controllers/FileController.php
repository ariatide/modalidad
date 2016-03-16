<?php

class FileController extends CController {

    public $layout = '//layouts/vacio';

    public function actionindex() {
        $ar = fopen("datFile.txt", "a") or die("Problemas en la creacion");
        fputs($ar, ' ');
        $model = new file();
        $form = new CForm('application.views.file.upform', $model);
        if ($form->submitted('submit') && $form->validate()) {
            $form->model->imagenes = CUploadedFile::getInstance($form->model, 'imagenes');
            if (CUploadedFile::getInstance($form->model, 'imagenes')) {
                fputs($ar, $form->model->imagenes);
                fputs($ar, "\n");
                $form->model->imagenes->saveAs('filesss/' . $form->model->imagenes);
                fputs($ar, 'subiooooo');
                fputs($ar, "\n");
            } else {
                fputs($ar, ' noo');
                fputs($ar, "\n");
            }
            Yii::app()->user->setFlash('success', 'File Uploaded');
            $this->redirect(array('index'));
        }
        $this->render('index', array('form' => $form));
    }

    public function actionProyecto($id = null, $id2 = null) {
        $ar = fopen("datFile.txt", "a") or die("Problemas en la creacion");
        fputs($ar, ' ');
        $model = new file();
        $img = new imagen();
        $form = new CForm('application.views.file.upform', $model);
        if ($form->submitted('submit') && $form->validate()) {
            $form->model->imagenes = CUploadedFile::getInstance($form->model, 'imagenes');
            if (CUploadedFile::getInstance($form->model, 'imagenes')) {

                fputs($ar, $form->model->imagenes);
                fputs($ar, "\n");

                $img->NOMBRE_IMAGEN = $form->model->imagenes;
                $img->imagen_nombre_tabla = "proy_invest";
                if ($img->save()) {
                    if ($id2 === null) {
                        $ss = $img->ID_IMAGEN;
                    } else {
                        $ss = $id2 . "a" . $img->ID_IMAGEN;
                    }
                    fputs($ar, $ss);
                    $form->model->imagenes->saveAs('images/proyectos/' . $form->model->imagenes);

                    $this->redirect(array('administrador/createproy/1/' . $ss));
                } else {
                    $this->redirect(array('vacio/proyecto'));
                }
            } else {
                fputs($ar, ' noo');
                fputs($ar, "\n");
            }
            Yii::app()->user->setFlash('success', 'File Uploaded');
            $this->redirect(array('index'));
        }
        $this->render('index', array('form' => $form));
    }

    public function actionProyectoUp($id = null, $id2 = null) {
        $ar = fopen("datFilepu.txt", "a") or die("Problemas en la creacion");
        fputs($ar, ' ');
        $model = new file();
        $img = new imagen();
        $form = new CForm('application.views.file.upform', $model);
        if ($form->submitted('submit') && $form->validate()) {
            $form->model->imagenes = CUploadedFile::getInstance($form->model, 'imagenes');
            if (CUploadedFile::getInstance($form->model, 'imagenes')) {

                fputs($ar, $form->model->imagenes);
                fputs($ar, "\n");

                $img->NOMBRE_IMAGEN = $form->model->imagenes;
                $img->imagen_nombre_tabla = "proy_invest";
                if ($img->save()) {
                    if ($id2 === null) {
                        $ss = $img->ID_IMAGEN;
                    } else {
                        $ss = $id2 . "a" . $img->ID_IMAGEN;
                    }
                    fputs($ar, $ss);
                    $form->model->imagenes->saveAs('images/proyectos/' . $form->model->imagenes);

                    $this->redirect(array('administrador/UpdateProy/' . $id . '/' . $ss));
                } else {
                    $this->redirect(array('vacio/proyecto'));
                }
            } else {
                fputs($ar, ' noo');
                fputs($ar, "\n");
            }
            Yii::app()->user->setFlash('success', 'File Uploaded');
            $this->redirect(array('index'));
        }
        $this->render('index', array('form' => $form));
    }

    public function actionUnidad($id = null, $id2 = null) {
         $ar = fopen("Fileuni.txt", "a") or die("Problemas en la creacion");
        fputs($ar, ' ');
        $model = new file();
        $img = new imagen();
        $form = new CForm('application.views.file.upformUni', $model);
        if ($form->submitted('submit') && $form->validate()) {
            $form->model->imagenes = CUploadedFile::getInstance($form->model, 'imagenes');
            if (CUploadedFile::getInstance($form->model, 'imagenes')) {

                fputs($ar, $form->model->imagenes);
                fputs($ar, $form->model->titulo);
                fputs($ar, "\n");

                $img->NOMBRE_IMAGEN = $form->model->imagenes;
                $img->titulo_imagen = $form->model->titulo;
                $img->imagen_nombre_tabla = "unidad";
                if ($img->save()) {
                    if ($id2 == null) {
                        $ss = $img->ID_IMAGEN;
                    } else {
                        $ss = $id2 . "a" . $img->ID_IMAGEN;
                    }
                    fputs($ar, $ss);
                    $form->model->imagenes->saveAs('images/unidades/' . $form->model->imagenes);

                    $this->redirect(array('administrador/createunidad/1/' . $ss));
                } else {
                    $this->redirect(array('vacio/proyecto'));
                }
            } else {
                fputs($ar, ' noo');
                fputs($ar, "\n");
            }
            Yii::app()->user->setFlash('success', 'File Uploaded');
            $this->redirect(array('index'));
        }
        $this->render('indexUni', array('form' => $form));
    }

    public function actionUnidadUp($id = null, $id2 = null) {
         $ar = fopen("Fileuni.txt", "a") or die("Problemas en la creacion");
        fputs($ar, ' ');
        $model = new file();
        $img = new imagen();
        $form = new CForm('application.views.file.upformUni', $model);
        if ($form->submitted('submit') && $form->validate()) {
            $form->model->imagenes = CUploadedFile::getInstance($form->model, 'imagenes');
            if (CUploadedFile::getInstance($form->model, 'imagenes')) {

                fputs($ar, $form->model->imagenes);
                fputs($ar, $form->model->titulo);
                fputs($ar, "\n");

                $img->NOMBRE_IMAGEN = $form->model->imagenes;
                $img->titulo_imagen = $form->model->titulo;
                $img->imagen_nombre_tabla = "unidad";
                if ($img->save()) {
                    if ($id2 == null) {
                        $ss = $img->ID_IMAGEN;
                    } else {
                        $ss = $id2 . "a" . $img->ID_IMAGEN;
                    }
                    fputs($ar, $ss);
                    $form->model->imagenes->saveAs('images/unidades/' . $form->model->imagenes);

                    $this->redirect(array('administrador/updateUnidad/'.$id.'/' . $ss));
                } else {
                    $this->redirect(array('vacio/proyecto'));
                }
            } else {
                fputs($ar, ' noo');
                fputs($ar, "\n");
            }
            Yii::app()->user->setFlash('success', 'File Uploaded');
            $this->redirect(array('index'));
        }
        $this->render('indexUni', array('form' => $form));
    }

    public function actionColaborador() {
        $ar = fopen("datFile.txt", "a") or die("Problemas en la creacion");
        fputs($ar, ' ');
        $model = new file();
        $img = new imagen();
        $form = new CForm('application.views.file.upform', $model);
        if ($form->submitted('submit') && $form->validate()) {
            $form->model->imagenes = CUploadedFile::getInstance($form->model, 'imagenes');
            if (CUploadedFile::getInstance($form->model, 'imagenes')) {

                fputs($ar, $form->model->imagenes);
                fputs($ar, "\n");

                $img->NOMBRE_IMAGEN = $form->model->imagenes;
                $img->imagen_nombre_tabla = "colaborador";
                if ($img->save()) {
                   
                    $form->model->imagenes->saveAs('images/auspiciadores/' . $form->model->imagenes);

                    $this->redirect(array('administrador/createColaborador/'.$img->ID_IMAGEN));
                } else {
                    $this->redirect(array('vacio/proyecto'));
                }
            } else {
                fputs($ar, ' noo');
                fputs($ar, "\n");
            }
            Yii::app()->user->setFlash('success', 'File Uploaded');
            $this->redirect(array('index'));
        }
        $this->render('index', array('form' => $form));
    }

    public function actionColaboradorUp($id = null) {
        $ar = fopen("datFile.txt", "a") or die("Problemas en la creacion");
        fputs($ar, ' ');
        $model = new file();
        $img = new imagen();
        $form = new CForm('application.views.file.upform', $model);
        if ($form->submitted('submit') && $form->validate()) {
            $form->model->imagenes = CUploadedFile::getInstance($form->model, 'imagenes');
            if (CUploadedFile::getInstance($form->model, 'imagenes')) {

                fputs($ar, $form->model->imagenes);
                fputs($ar, "\n");

                $img->NOMBRE_IMAGEN = $form->model->imagenes;
                $img->imagen_nombre_tabla = "colaborador";
                $img->IMAGEN_ID= $id;
                
                if ($img->save()) {
                   
                    $form->model->imagenes->saveAs('images/auspiciadores/' . $form->model->imagenes);

                    $this->redirect(array('administrador/UpdateColaborador/'.$id.'/'.$img->ID_IMAGEN));
                } else {
                    $this->redirect(array('vacio/proyecto'));
                }
            } else {
                fputs($ar, ' noo');
                fputs($ar, "\n");
            }
            Yii::app()->user->setFlash('success', 'File Uploaded');
            $this->redirect(array('index'));
        }
        $this->render('index', array('form' => $form));
    }
}