<?php



class MenuIijpWidget extends CWidget {

    public function run() {
		
		$carreras = Carrera::model()->findAll();
		
        $this->render('menuIijp', array('carreras' => $carreras));
    }
}


?>
