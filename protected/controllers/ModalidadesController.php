<?php

class ModalidadesController extends Controller {

    public $layout = '//layouts/modalidades';

    public function filters() {
        return array(array('CrugeAccessControlFilter'));
    }

    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    public function actiontesisDescarga() {
        $this->render('tesisDescarga');
    }

    public function actiondirigidoDescarga() {
        $this->render('dirigidoDescarga');
    }

    public function actionadscripcionDescarga() {
        $this->render('adscripcionDescarga');
    }

    public function actiontesis() {
        $dsn = "mysql:host=localhost;dbname=mod_tit4_mod";
        $username = "root";
        $password = "";
        $connection = new CDbConnection($dsn, $username, $password);

        $connection->active = true;
        $sql = "SELECT TEMA_PROYECTO FROM `proyecto` WHERE MODALIDAD = 'Tesis'
ORDER BY `proyecto`.`TEMA_PROYECTO` ASC";
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();

        $this->render('tesis', array('temas' => $dataReader));
    }

    public function actiondirigido() {

        $dsn = "mysql:host=localhost;dbname=mod_tit4_mod";
        $username = "root";
        $password = "";
        $connection = new CDbConnection($dsn, $username, $password);

        $connection->active = true;
        $sql = "SELECT TEMA_PROYECTO FROM `proyecto` WHERE MODALIDAD = 'Trabajo Dirigido'
ORDER BY `proyecto`.`TEMA_PROYECTO` ASC";
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();


        $this->render('dirigido', array('temas' => $dataReader));
    }

    public function actionadscripcion() {
        $dsn = "mysql:host=localhost;dbname=mod_tit4_mod";
        $username = "root";
        $password = "";
        $connection = new CDbConnection($dsn, $username, $password);

        $connection->active = true;
        $sql = "SELECT TEMA_PROYECTO FROM `proyecto` WHERE MODALIDAD = 'Adscripcion'
ORDER BY `proyecto`.`TEMA_PROYECTO` ASC";
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();


        $this->render('adscripcion', array('temas' => $dataReader));
    }

}

?>
