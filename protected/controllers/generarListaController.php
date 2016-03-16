<?php

class generarListaController extends Controller {

    public $layout = '//layouts/modalidades';

    public function actionIndex() {
        $this->render('index');
    }

    public function actionGenerar() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        //$this->render('index');

        $this->generarTesis();
        $this->generarAdscripcion();
        $this->generarDirigido();
        $this->comprimir();
        $this->iniciarDescaga();
    }

    private function generartesis() {
        $dsn = "mysql:host=localhost;dbname=modalidades";
        $username = "root";
        $password = "";
        $connection = new CDbConnection($dsn, $username, $password);

        $connection->active = true;
        $sql = "SELECT TEMA_PROYECTO FROM `proyecto` WHERE MODALIDAD = 'Tesis'
ORDER BY `proyecto`.`TEMA_PROYECTO` ASC";
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $html = "
      
        <table>";
        $f = true;
        $cont = 1;
        foreach ($dataReader as $tema) {
            if ($f) {
                $f = FALSE;
                $html = $html . "<tr>";
            } else {
                $f = true;
                $html = $html . "<tr class ='tableFila'>";
            }
            $html = $html . "<td> $cont</td>";
            $cont++;
            $tem = Util::remplazarCaracteresEspecialesReporte($tema['TEMA_PROYECTO']);
            $html = $html . "<td> $tem</td>";
            $html = $html . "</tr>";
        }
        $html = $html . "</table>";

        unlink('listas/listaTesis.html');
        $fp = fopen("listas/listaTesis.html", "x");
        fwrite($fp, $html);
        fclose($fp);
    }

        private function generarAdscripcion() {
        $dsn = "mysql:host=localhost;dbname=modalidades";
        $username = "root";
        $password = "";
        $connection = new CDbConnection($dsn, $username, $password);

        $connection->active = true;
        $sql = "SELECT TEMA_PROYECTO FROM `proyecto` WHERE MODALIDAD = 'Adscripcion'
ORDER BY `proyecto`.`TEMA_PROYECTO` ASC";
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $html = "
      
        <table>";
        $f = true;
        $cont = 1;
        foreach ($dataReader as $tema) {
            if ($f) {
                $f = FALSE;
                $html = $html . "<tr>";
            } else {
                $f = true;
                $html = $html . "<tr class ='tableFila'>";
            }
            $html = $html . "<td> $cont</td>";
            $cont++;
            $tem = Util::remplazarCaracteresEspecialesReporte($tema['TEMA_PROYECTO']);
            $html = $html . "<td> $tem</td>";
            $html = $html . "</tr>";
        }
        $html = $html . "</table>";

        unlink('listas/listaAdscripcion.html');
        $fp = fopen("listas/listaAdscripcion.html", "x");
        fwrite($fp, $html);
        fclose($fp);
    }
        private function generarDirigido() {
        $dsn = "mysql:host=localhost;dbname=modalidades";
        $username = "root";
        $password = "";
        $connection = new CDbConnection($dsn, $username, $password);

        $connection->active = true;
        $sql = "SELECT TEMA_PROYECTO FROM `proyecto` WHERE MODALIDAD = 'Trabajo Dirigido'
ORDER BY `proyecto`.`TEMA_PROYECTO` ASC";
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $html = "
       
        <table>";
        $f = true;
        $cont = 1;
        foreach ($dataReader as $tema) {
            if ($f) {
                $f = FALSE;
                $html = $html . "<tr>";
            } else {
                $f = true;
                $html = $html . "<tr class ='tableFila'>";
            }
            $html = $html . "<td> $cont</td>";
            $cont++;
            $tem = Util::remplazarCaracteresEspecialesReporte($tema['TEMA_PROYECTO']);
            $html = $html . "<td> $tem</td>";
            $html = $html . "</tr>";
        }
        $html = $html . "</table>";

        unlink('listas/listaDirigido.html');
        $fp = fopen("listas/listaDirigido.html", "x");
        fwrite($fp, $html);
        fclose($fp);
    }
    private function comprimir() {


        $zip = new ZipArchive();

        $filename = 'listas/listas.zip';

        if ($zip->open($filename, ZIPARCHIVE::CREATE) === true) {
            $zip->addFile('listas/listaTesis.html');
            $zip->addFile('listas/listaAdscripcion.html');
            $zip->addFile('listas/listaDirigido.html');
            $zip->close();
            $this->render('index');
        } else {
            echo 'Error creando ' . $filename;
        }
    }

    private function iniciarDescaga() {
        echo "<script language=\"javascript\">
window.location.href=\"../../listas/listas.zip\";
</script>";
    }

}
?>
