<?php

class SiteController extends Controller {

   // public $layout = '//layouts/inicio';

    public $layout = '//layouts/modalidades';
    /**
     * @return array action filters
     */
//    public function filters() {
//        return array('accessControl', array('CrugeAccessControlFilter'));
//    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('contact,index'),
                'users' => array('admin'),
            ),
        );
    }

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        
        
                
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $headers = "From: {$model->email}\r\nReply-To: {$model->email}";
                mail(Yii::app()->params['adminEmail'], $model->subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
       $this->redirect(Yii::app()->homeUrl);
    }

    public function actionPagina($id) {
        $pagina = Pagina::model()->findByPk($id);
        $this->render('pagina', array('pagina' => $pagina));
    }

    // Funcion para que funcione el autocomplter de supervisor


    public function actionObtenerSupervisoresAdscripcion() {
        $sql = "SELECT DISTINCT(NOMBRE_SUPERVISOR_ADS) AS 'label' FROM PROYECTO_ADSCRIPCION WHERE NOMBRE_SUPERVISOR_ADS IS NOT NULL AND NOMBRE_SUPERVISOR_ADS <> '' AND NOMBRE_SUPERVISOR_ADS LIKE :qterm ORDER BY NOMBRE_SUPERVISOR_ADS";
        $command = Yii::app()->db->createCommand($sql);
        $qterm = '%' . $_GET['term'] . '%';
        $command->bindParam(":qterm", $qterm, PDO::PARAM_STR);
        $result = $command->queryAll();
        echo CJSON::encode($result);
        exit;
    }

    public function actionObtenerSupervisoresTDirigido() {
        $sql = "SELECT DISTINCT(NOMBRE_SUPERVISOR_TD) AS 'label' FROM PROYECTO_TDIRIGIDO WHERE NOMBRE_SUPERVISOR_TD IS NOT NULL AND NOMBRE_SUPERVISOR_TD <> '' AND NOMBRE_SUPERVISOR_TD LIKE :qterm ORDER BY NOMBRE_SUPERVISOR_TD";
        $command = Yii::app()->db->createCommand($sql);
        $qterm = '%' . $_GET['term'] . '%';
        $command->bindParam(":qterm", $qterm, PDO::PARAM_STR);
        $result = $command->queryAll();
        echo CJSON::encode($result);
        exit;
    }

    public function actionObtenerTutores() {
        $sql = "SELECT DISTINCT(NOMBRE_DOCENTE) AS 'label', NOMBRE_DOCENTE AS 'value', ID_DOCENTE AS 'id' FROM DOCENTE WHERE NOMBRE_DOCENTE IS NOT NULL AND NOMBRE_DOCENTE <> '' AND NOMBRE_DOCENTE LIKE :qterm ORDER BY NOMBRE_DOCENTE";
        $command = Yii::app()->db->createCommand($sql);
        $qterm = '%' . $_GET['term'] . '%';
        $command->bindParam(":qterm", $qterm, PDO::PARAM_STR);
        $result = $command->queryAll();
        echo CJSON::encode($result);
        exit;
    }

    public function actionObtenerLugaresEjecucion() {
        $sql = "SELECT DISTINCT(NOMBRE_LE) AS 'label', NOMBRE_LE AS 'value', ID_LE AS 'id' FROM LUGAR_EJECUCION WHERE NOMBRE_LE IS NOT NULL AND NOMBRE_LE <> '' AND NOMBRE_LE LIKE :qterm ORDER BY NOMBRE_LE";
        $command = Yii::app()->db->createCommand($sql);
        $qterm = '%' . $_GET['term'] . '%';
        $command->bindParam(":qterm", $qterm, PDO::PARAM_STR);
        $result = $command->queryAll();
        echo CJSON::encode($result);
        exit;
    }

    public function actionObtenerUnidadesPatrocinadoras() {
        $sql = "SELECT DISTINCT(NOMBRE_UP) AS 'label', NOMBRE_UP AS 'value', ID_UP AS 'id' FROM UNIDAD_PATROCINADORA WHERE NOMBRE_UP IS NOT NULL AND NOMBRE_UP <> '' AND NOMBRE_UP LIKE :qterm ORDER BY NOMBRE_UP";
        $command = Yii::app()->db->createCommand($sql);
        $qterm = '%' . $_GET['term'] . '%';
        $command->bindParam(":qterm", $qterm, PDO::PARAM_STR);
        $result = $command->queryAll();
        echo CJSON::encode($result);
        exit;
    }

}
