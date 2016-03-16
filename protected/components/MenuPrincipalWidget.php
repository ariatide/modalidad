<?php



class MenuPrincipalWidget extends CWidget {

    public function run() {
		
		$menus = Menu::model()->findAll(array('order' => 'POSICION'));
		$carreras = Carrera::model()->findAll();
		
		
        $this->render('menuPrincipal', array('menus' => $menus, 'carreras' => $carreras));
    }
}


?>
