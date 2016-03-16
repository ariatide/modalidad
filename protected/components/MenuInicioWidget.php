<?php



class MenuInicioWidget extends CWidget {

    public function run() {
		
		$menus = Menu::model()->findAll(array('order' => 'POSICION'));
		
        $this->render('menuInicio', array('menus' => $menus));
    }
}


?>
