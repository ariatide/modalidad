<?php

class BusquedaController extends Controller {

    public $layout = '//layouts/modalidades';
    private $_indexFiles = 'runtime.search';

//    public function filters() {
//        return array('accessControl',array('CrugeAccessControlFilter'));
//    }


    public function init() {
        Yii::import('application.vendors.*');
        require_once('Zend/Search/Lucene.php');
        require_once('Zend/Search/Lucene/Analysis/TokenFilter/StopWords.php');
        parent::init();
    }

    public function actionBusquedaSimple() {
        $this->render('busquedaSimple');
    }

    public function actionRealizarBusquedaSimple() {
        $terminoBusqueda = "";
        $terminoBusquedaUsuario = "";
        $resultados = array();
        $consulta = array();

        if (($terminoBusquedaUsuario = Yii::app()->getRequest()->getParam('consulta', null)) !== null) {

            $terminoBusquedaUsuario = Util::remplazarCaracteresEspeciales($terminoBusquedaUsuario);
            $terminoBusquedaUsuario = trim($terminoBusquedaUsuario, " ");
            $terminoBusquedaUsuario = trim($terminoBusquedaUsuario, "\t");
            $terminoBusquedaUsuario = trim($terminoBusquedaUsuario, "\n");
            $terminoBusquedaUsuario = trim($terminoBusquedaUsuario, "\r");
            $terminoBusquedaUsuario = trim($terminoBusquedaUsuario, "\0");
            $terminoBusquedaUsuario = trim($terminoBusquedaUsuario, "\x0B");


            Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding('utf-8');
            // Se carga el filtro para las stop words
            $stopWordsFilter = new Zend_Search_Lucene_Analysis_TokenFilter_StopWords();
            $stopWordsFilter->loadFromFile(YiiBase::getPathOfAlias('application.config') . '/stopwords.txt');
            //$index = new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->_indexFiles));
            $index = Zend_Search_Lucene::open(Yii::getPathOfAlias('application.' . $this->_indexFiles));
            $analyzer = new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive();
            $analyzer->addFilter($stopWordsFilter);
            Zend_Search_Lucene_Analysis_Analyzer::setDefault($analyzer);
            // El texto ingresado para la busqueda se convierte a minuscula, para no
            // tener problemas con los stops words (cuando estan en mayusculas no se consideran como
            // stop words)
            //$terminoBusquedaUsuario =  strtolower($terminoBusquedaUsuario);
            $terminosBusqueda = explode(' ', $terminoBusquedaUsuario);

            // Esto es para validar que el usuario ingrese por lo menos 3 terminos (palabras)
            // de busqueda (no se toman en cuenta  palabras que estan nuestra de stopwords)
            $contadorTerminosValidos = 0;
            foreach ($terminosBusqueda as $termino) {
                $token = new Zend_Search_Lucene_Analysis_Token($termino, 0, count($termino));
                $resultToken = $stopWordsFilter->normalize($token);
                if ($resultToken != null)
                    $contadorTerminosValidos++;
            }

            if ($contadorTerminosValidos >= 1) {
                // Esto es para una busqueda exacta (con coincidencia exacta de los terminos)
                $terminoBusqueda = 'titulo:(' . implode('~ ', $terminosBusqueda) . '~ )';

                echo $terminoBusqueda;

                $resultados = $index->find($terminoBusqueda);
                $consulta = Zend_Search_Lucene_Search_QueryParser::parse($terminoBusqueda);
                $this->render('resultadoBusquedaSimple', compact('resultados', 'terminoBusqueda', 'consulta', 'terminoBusquedaUsuario'));
            } else {
                // Se pone un mensaje para mostrar en la pantalla
                Yii::app()->user->setFlash('error', "Debe ingresar por los menos 1 terminos de busqueda");
                $this->redirect('busquedaSimple');
            }
        }
    }

    public function actionBusquedaAvanzada() {
        $this->render('busquedaAvanzada');
    }

    public function actionRealizarBusquedaAvanzada() {
        $terminoBusqueda = "";
        $terminoBusquedaUsuario = "";
        $resultados = array();
        $consulta = array();

        if (($terminoBusquedaUsuario = Yii::app()->getRequest()->getParam('consulta', null)) !== null) {

            $terminoBusquedaUsuario = Util::remplazarCaracteresEspeciales($terminoBusquedaUsuario);

            $terminoBusquedaUsuario = trim($terminoBusquedaUsuario, " ");
            $terminoBusquedaUsuario = trim($terminoBusquedaUsuario, "\t");
            $terminoBusquedaUsuario = trim($terminoBusquedaUsuario, "\n");
            $terminoBusquedaUsuario = trim($terminoBusquedaUsuario, "\r");
            $terminoBusquedaUsuario = trim($terminoBusquedaUsuario, "\0");
            $terminoBusquedaUsuario = trim($terminoBusquedaUsuario, "\x0B");

            Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding('utf-8');
            // Se carga el filtro para las stop words
            $stopWordsFilter = new Zend_Search_Lucene_Analysis_TokenFilter_StopWords();
            $stopWordsFilter->loadFromFile(YiiBase::getPathOfAlias('application.config') . '/stopwords.txt');
            //$index = new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->_indexFiles));
            $index = Zend_Search_Lucene::open(Yii::getPathOfAlias('application.' . $this->_indexFiles));
            $analyzer = new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive();
            $analyzer->addFilter($stopWordsFilter);
            Zend_Search_Lucene_Analysis_Analyzer::setDefault($analyzer);
            // Esto es para agregar el elemento ~ para que realize la busqueda difusa
            $terminosBusqueda = explode(' ', $terminoBusquedaUsuario);
            $terminoBusqueda = 'titulo:(' . implode('~ ', $terminosBusqueda) . '~ ' . ')';

            echo $terminoBusqueda;

            // Se muestra la consulta procesada (cuando se han agregado los elementos para realizar la busqueda difusa)
            //echo $terminoBusqueda;

            $resultados = $index->find($terminoBusqueda);
            $consulta = Zend_Search_Lucene_Search_QueryParser::parse($terminoBusqueda);
        }

        $this->render('resultadoBusquedaAvanzada', compact('resultados', 'terminoBusqueda', 'consulta', 'terminoBusquedaUsuario'));
    }

    public function actionDetalleBusquedaAvanzada($id) {

        $proyecto = Proyecto::model()->findByPk($id);
        $postulante = Postulante::model()->findByPk($proyecto->ID_POS);
        $carrera = Carrera::model()->findByPk($postulante->ID_CARRERA);
        $proyectoTesis = array();
        $proyectoAdscripcion = array();
        $proyectoTdirigido = array();

        if ($proyecto->MODALIDAD == 'Tesis') {
            $proyectoTesis = ProyectoTesis::model()->findByPk($id);
        } else if ($proyecto->MODALIDAD == 'Adscripcion') {
            $proyectoAdscripcion = ProyectoAdscripcion::model()->findByPk($id);
        } else if ($proyecto->MODALIDAD == 'Trabajo Dirigido') {
            $proyectoTdirigido = ProyectoTdirigido::model()->findByPk($id);
        }

        $this->render('detalleBusquedaAvanzada', compact('proyecto', 'postulante', 'carrera', 'proyectoTesis', 'proyectoAdscripcion', 'proyectoTdirigido'));
    }

    public function actionBusquedaPorNombre() {
        $this->render('busquedaPorNombre');
    }

    public function actionRealizarBusquedaPorNombre() {
        // Cometnario de prueba para ver el funcionamiento e GIT

        $terminoBusqueda = "";
        $terminoBusquedaUsuario = "";
        $resultados = array();
        $consulta = array();


        $nombre = Yii::app()->getRequest()->getParam('nombre', null);
        $apellidos = Yii::app()->getRequest()->getParam('apellidos', null);
        $titulo = Yii::app()->getRequest()->getParam('titulo', null);

        if ('Nombre' == $nombre) {
            $nombre = '';
        }
        if ('Apellidos' == $apellidos) {
            $apellidos = '';
        }
        if ('Titulo' == $titulo) {
            $titulo = '';
        }


        $nombre = Util::remplazarCaracteresEspeciales($nombre);
        $apellidos = Util::remplazarCaracteresEspeciales($apellidos);
        $titulo = Util::remplazarCaracteresEspeciales($titulo);
        $nombre = trim($nombre, " ");
        $nombre = trim($nombre, "\t");
        $nombre = trim($nombre, "\n");
        $nombre = trim($nombre, "\r");
        $nombre = trim($nombre, "\0");
        $nombre = trim($nombre, "\x0B");
        $apellidos = trim($apellidos, " ");
        $apellidos = trim($apellidos, "\t");
        $apellidos = trim($apellidos, "\n");
        $apellidos = trim($apellidos, "\r");
        $apellidos = trim($apellidos, "\0");
        $apellidos = trim($apellidos, "\x0B");
        $titulo = trim($titulo, " ");
        $titulo = trim($titulo, "\t");
        $titulo = trim($titulo, "\n");
        $titulo = trim($titulo, "\r");
        $titulo = trim($titulo, "\0");
        $titulo = trim($titulo, "\x0B");



        if ($terminoBusquedaUsuario !== null || $apellidos != null) {
            Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding('utf-8');
            // Se carga el filtro para las stop words
            $stopWordsFilter = new Zend_Search_Lucene_Analysis_TokenFilter_StopWords();
            $stopWordsFilter->loadFromFile(YiiBase::getPathOfAlias('application.config') . '/stopwords.txt');

            $analyzer = new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive();
            $analyzer->addFilter($stopWordsFilter);
            Zend_Search_Lucene_Analysis_Analyzer::setDefault($analyzer);
            $index = Zend_Search_Lucene::open(Yii::getPathOfAlias('application.' . $this->_indexFiles));
            // Esto es para agregar el elemento ~ para que realize la busqueda difusa
            $nombresBusqueda = explode(' ', $nombre);
            $nombreBusqueda = 'nombrePostulante:(' . implode('~ ', $nombresBusqueda) . '~' . ')';

            $titulosBusqueda = explode(' ', $titulo);
            $tituloBusqueda = 'titulo:(' . implode('~ ', $titulosBusqueda) . '~ ' . ')';

            $apellidoPaternoBusqueda = 'apellidoPaternoPostulante:(' . $apellidos . '~)';
            $apellidoMaternoBusqueda = 'apellidoMaternoPostulante:(' . $apellidos . '~)';

            //$terminoBusqueda = $nombreBusqueda;

            $terminoBusqueda = "";

            if (!empty($nombre))
                $terminoBusqueda = $nombreBusqueda;
            if (!empty($apellidos))
                $terminoBusqueda .=$apellidoMaternoBusqueda . ' ' . $apellidoPaternoBusqueda;
            if (!empty($titulo))
                $terminoBusqueda .= ' ' . $tituloBusqueda;


            // Se muestra la consulta procesada (cuando se han agregado los elementos para realizar la busqueda difusa)
            //echo $terminoBusqueda;

            $terminoBusquedaUsuario = $nombre . ' ' . $apellidos . ' ' . $titulo;

            $resultados = $index->find($terminoBusqueda);

            $consulta = Zend_Search_Lucene_Search_QueryParser::parse($terminoBusqueda);
        }




        $this->render('resultadoBusquedaPorNombre', compact('resultados', 'consulta', 'terminoBusquedaUsuario'));
    }

}
