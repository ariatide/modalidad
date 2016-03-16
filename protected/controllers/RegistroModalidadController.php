<?php


class RegistroModalidadController extends Controller
{
	
	public $layout='//layouts/registroModalidad';
	
	
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');


	}
}
?>
