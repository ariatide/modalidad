<?php

class AdministradorController extends Controller {

    public $layout = '//layouts/modalidades';

//    public function filters() {
//        return array('accessControl', array('CrugeAccessControlFilter'));
//    }
    public function filters() {
        return array(array('CrugeAccessControlFilter'));
    }

    public function actionIndex() {


        $this->render('index');
    }

    /*     * ************  fin otras funciones**************** */
}

?>
