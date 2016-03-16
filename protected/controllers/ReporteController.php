<?php

class ReporteController extends Controller {

    public $layout = '//layouts/reporte';

    public function filters() {
        return array(array('CrugeAccessControlFilter'));
    }

    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'

        $area = new CDbCriteria();
        $area->select = '*';
        $areas = AreaJuridica::model()->findAll($area);
        $areass = array();
        $areass['vacio'] = 'Seleccione un Area';
        foreach ($areas as $a) {
            $areass[$a->ID_AREA] = $a->NOMBRE_AREA;
        }
        $v = true;
        $model = new ReporteForm;
        if (isset($_POST['ReporteForm'])) {
            $model->attributes = $_POST['ReporteForm'];
            if ($model->validate()) {
                $consulta = $this->con($model);
                $this->render('vistaReporte', array('consulta' => $consulta, 'model' => $model, 'areas' => $areass));
                $v = FALSE;
            }
        }
        if ($v)
            $this->render('index', array('model' => $model, 'areas' => $areass));
    }

    public function con($model) {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $dsn = Yii::app()->db->connectionString;
        $username = Yii::app()->db->username;
        $password = Yii::app()->db->password;
        $connection = new CDbConnection($dsn, $username, $password);

        $connection->active = true;
        $sql = '';
        $estado = '';
        if ($model->estado != 'vacio') {
            $estado = "and `ESTADO_PROY`= '$model->estado'";
        }
        $carrera = '';
        if ($model->carrera != 'vacio') {
            $estado = "and post.ID_CARRERA = $model->carrera";
        }
        $area = '';
        if ($model->carrera != 'vacio') {
            $estado = "and area.ID_AREA = $model->area";
        }
        $fechai = $this->convertirFecha($model->fechaIni);
        $fechaf = $this->convertirFecha($model->fechaFin);
        switch ($model->modalidad) {
            case 'adscripcion':
                $sql = "SELECT post.nombre_pos, post.apepat_pos, post.apemat_pos,proy.tema_proyecto, proy.estado_proy, proy.modalidad, ca.nombre_carrera, area.nombre_area,pa.fecha_subscripcionconvenio_ads as 'fecha'
FROM `PROYECTO` as `proy`,`POSTULANTE` as `post`, `AREA_JURIDICA` as `area`, `carrera` as `ca`, `PROYECTO_ADSCRIPCION` as `pa`
WHERE `MODALIDAD`='Adscripcion' $estado and proy.ID_POS = post.ID_POS $carrera and proy.ID_AREA = area.ID_AREA  $area and post.id_carrera = ca.id_carrera and proy.id_proyecto = pa.id_proyecto and pa.fecha_subscripcionconvenio_ads between '$fechai' and '$fechaf'
ORDER BY `pa`.`fecha_subscripcionconvenio_ads` ASC";
                break;
            case 'tesis':
                $sql = "SELECT post.nombre_pos, post.apepat_pos, post.apemat_pos,proy.tema_proyecto, proy.estado_proy, proy.modalidad, ca.nombre_carrera, area.nombre_area, proy.fecha_inscrip_proy as 'fecha'
FROM `PROYECTO` as `proy`,`POSTULANTE` as `post`, `AREA_JURIDICA` as `area`, `carrera` as `ca`
WHERE `MODALIDAD`='tesis' $estado and proy.ID_POS = post.ID_POS  $carrera and proy.ID_AREA = area.ID_AREA $area and post.id_carrera = ca.id_carrera and proy.fecha_inscrip_proy between '$fechai' and '$fechaf'
ORDER BY `proy`.`fecha_inscrip_proy` ASC";
                break;
            case 'dirigido':
                $sql = "SELECT post.nombre_pos, post.apepat_pos, post.apemat_pos,proy.tema_proyecto, proy.estado_proy, proy.modalidad, ca.nombre_carrera, area.nombre_area, pt.suscripcionconvenio as 'fecha'
FROM `PROYECTO` as `proy`,`POSTULANTE` as `post`, `AREA_JURIDICA` as `area`, `carrera` as `ca`, `PROYECTO_TDIRIGIDO` as `pt`
WHERE `MODALIDAD`='Trabajo Dirigido' $estado and proy.ID_POS = post.ID_POS  $carrera and proy.ID_AREA = area.ID_AREA $area and post.id_carrera = ca.id_carrera and proy.id_proyecto = pt.id_proyecto and pt.suscripcionconvenio between '$fechai' and '$fechaf'
ORDER BY `pt`.`suscripcionconvenio` ASC";
                break;
            case 'vacio':
                $sql = " ( SELECT post.nombre_pos, post.apepat_pos, post.apemat_pos,proy.tema_proyecto, proy.estado_proy, proy.modalidad, ca.nombre_carrera, area.nombre_area,pa.fecha_subscripcionconvenio_ads as 'fecha'
FROM `PROYECTO` as `proy`,`POSTULANTE` as `post`, `AREA_JURIDICA` as `area`, `carrera` as `ca`, `PROYECTO_ADSCRIPCION` as `pa`
WHERE `MODALIDAD`='Adscripcion' $estado and proy.ID_POS = post.ID_POS $carrera and proy.ID_AREA = area.ID_AREA  $area and post.id_carrera = ca.id_carrera and proy.id_proyecto = pa.id_proyecto and pa.fecha_subscripcionconvenio_ads between '$fechai' and '$fechaf'
ORDER BY `pa`.`fecha_subscripcionconvenio_ads` ASC) 
union 
(SELECT post.nombre_pos, post.apepat_pos, post.apemat_pos,proy.tema_proyecto, proy.estado_proy, proy.modalidad, ca.nombre_carrera, area.nombre_area, proy.fecha_inscrip_proy as 'fecha'
FROM `PROYECTO` as `proy`,`POSTULANTE` as `post`, `AREA_JURIDICA` as `area`, `carrera` as `ca`
WHERE `MODALIDAD`='tesis' $estado and proy.ID_POS = post.ID_POS  $carrera and proy.ID_AREA = area.ID_AREA $area and post.id_carrera = ca.id_carrera and proy.fecha_inscrip_proy between '$fechai' and '$fechaf'
ORDER BY `proy`.`fecha_inscrip_proy` ASC) 
union
(SELECT post.nombre_pos, post.apepat_pos, post.apemat_pos,proy.tema_proyecto, proy.estado_proy, proy.modalidad, ca.nombre_carrera, area.nombre_area, pt.suscripcionconvenio as 'fecha'
FROM `PROYECTO` as `proy`,`POSTULANTE` as `post`, `AREA_JURIDICA` as `area`, `carrera` as `ca`, `PROYECTO_TDIRIGIDO` as `pt`
WHERE `MODALIDAD`='Trabajo Dirigido' $estado and proy.ID_POS = post.ID_POS  $carrera and proy.ID_AREA = area.ID_AREA $area and post.id_carrera = ca.id_carrera and proy.id_proyecto = pt.id_proyecto and pt.suscripcionconvenio between '$fechai' and '$fechaf'
ORDER BY `pt`.`suscripcionconvenio` ASC)";
                break;
        }



        $command = $connection->createCommand($sql);
        $dataReader = $command->query();

        $resp = array();
        $cont = '1';
        foreach ($dataReader as $fila) {
            $c = 3;
            $n = '';
            $b = true;
            $reps2 = array();
            $reps2[] = $cont;
            $cont++;
            foreach ($fila as $col) {
                if ($c > 0) {
                    $c--;
                    $n .=$col . ' ';
                } else {
                    if ($c == 0 && $b) {
                        $reps2[] = $n;
                        $reps2[] = $col;
                        $b = FALSE;
                    } else {
                        $reps2[] = $col;
                    }
                }
            }
            $resp[] = $reps2;
        }
        return $resp;
    }

    private function convertirFecha($fecha) {
        $fechaConvertida = '';
        $valuesFecha = explode('/', $fecha);
        if (!empty($fecha)) {
            $fechaConvertida = $valuesFecha[2] . '-' . $valuesFecha[1] . '-' . $valuesFecha[0];
        }
        return $fechaConvertida;
    }

}
