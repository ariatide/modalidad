<?php

class LuceneController extends Controller {

    private $_indexFiles = 'runtime.search';

    public function filters() {
        return array(array('CrugeAccessControlFilter'));
    }

    public function init() {
        Yii::import('application.vendors.*');
        require_once('Zend/Search/Lucene.php');
        require_once('Zend/Search/Lucene/Analysis/TokenFilter/StopWords.php');
        parent::init();
    }

    /*
      private function _limpiar_caracteres_especiales($s) {
      $s = ereg_replace("[áàâãª]","a",$s);
      $s = ereg_replace("[ÁÀÂÃ]","A",$s);
      $s = ereg_replace("[éèê]","e",$s);
      $s = ereg_replace("[ÉÈÊ]","E",$s);
      $s = ereg_replace("[íìî]","i",$s);
      $s = ereg_replace("[ÍÌÎ]","I",$s);
      $s = ereg_replace("[óòôõº]","o",$s);
      $s = ereg_replace("[ÓÒÔÕ]","O",$s);
      $s = ereg_replace("[úùû]","u",$s);
      $s = ereg_replace("[ÚÙÛ]","U",$s);
      $s = str_replace(" ","-",$s);
      $s = str_replace("ñ","n",$s);
      $s = str_replace("Ñ","N",$s);
      //para ampliar los caracteres a reemplazar agregar lineas de este tipo:
      //$s = str_replace("caracter-que-queremos-cambiar","caracter-por-el-cual-lo-vamos-a-cambiar",$s);
      return $s;
      }
     * */

    /*
      public function actionIndex()
      {
      $stopWordsFilter = new Zend_Search_Lucene_Analysis_TokenFilter_StopWords();
      $stopWordsFilter->loadFromFile(YiiBase::getPathOfAlias('application.config').'/stopwords.txt');

      Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding('utf-8');
      $analyzer = new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive();
      $analyzer->addFilter($stopWordsFilter);
      Zend_Search_Lucene_Analysis_Analyzer::setDefault($analyzer);

      $title = $_GET['title'];
      //$title = $this->limpiar_caracteres_especiales($title);

      if (!empty($title)) {
      $index = new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->_indexFiles));
      // Se procede a agregar un elemento al indice de busqueda
      $doc = new Zend_Search_Lucene_Document();
      $doc->addField(Zend_Search_Lucene_Field::Text('title', CHtml::encode($title), 'utf-8'));
      $index->addDocument($doc);
      $index->commit();
      echo "Se ha indexado un contenido";
      }

      $this->render('index');
      }

      public function actionSearch()
      {
      if (($term = Yii::app()->getRequest()->getParam('q', null)) !== null) {
      Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding('utf-8');
      // Se carga el filtro para las stop words
      $stopWordsFilter = new Zend_Search_Lucene_Analysis_TokenFilter_StopWords();
      $stopWordsFilter->loadFromFile(YiiBase::getPathOfAlias('application.config').'/stopwords.txt');
      $index = new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->_indexFiles));
      $analyzer = new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive();
      $analyzer->addFilter($stopWordsFilter);
      Zend_Search_Lucene_Analysis_Analyzer::setDefault($analyzer);

      //$term = $this->limpiar_caracteres_especiales($term);
      // Esto es para agregar el elemento ~ para que realize la busqueda difusa
      $terms = explode(' ', $term);
      $term = implode('~ ', $terms).'~';

      $results = $index->find($term);
      $query = Zend_Search_Lucene_Search_QueryParser::parse($term);
      $this->render('search', compact('results', 'term', 'query'));
      }

      } */

    public function actionReindexarProyectos() {
        // Se importar la librerias necesarias de Lucene	
        Yii::import('application.vendors.*');
        require_once('Zend/Search/Lucene.php');
        require_once('Zend/Search/Lucene/Analysis/TokenFilter/StopWords.php');

        // Se iniciliza toda la infraestructura necesaria
        $stopWordsFilter = new Zend_Search_Lucene_Analysis_TokenFilter_StopWords();
        $stopWordsFilter->loadFromFile(YiiBase::getPathOfAlias('application.config') . '/stopwords.txt');

        Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding('utf-8');
        $analyzer = new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive();
        $analyzer->addFilter($stopWordsFilter);
        Zend_Search_Lucene_Analysis_Analyzer::setDefault($analyzer);

        // Se procede a abrir el indice de Lucene pero sobreescribiendo el contenido anterior que tuviera
        $index = Zend_Search_Lucene::create(Yii::getPathOfAlias('application.' . $this->_indexFiles));

        // Se pocede a obtener todos los proyectos para reindexar los mismos
        $proyectos = Proyecto::model()->findAll();

        echo "Se ha comenzado a reindexar todos los proyectos <br />";

        foreach ($proyectos as $proyecto) {
            $titulo = Util::remplazarCaracteresEspeciales($proyecto->TEMA_PROYECTO);
            if (!empty($proyecto->POSTULANTE)) {
                $nombrePostulante = Util::remplazarCaracteresEspeciales($proyecto->POSTULANTE->NOMBRE_POS);
                $apellidoPaternoPostulante = Util::remplazarCaracteresEspeciales($proyecto->POSTULANTE->APEPAT_POS);
                $apellidoMaternoPostulante = Util::remplazarCaracteresEspeciales($proyecto->POSTULANTE->APEMAT_POS);
                $carrera = $proyecto->POSTULANTE->CARRERA->NOMBRE_CARRERA;
            } else {
                $nombrePostulante = '';
                $apellidoPaternoPostulante = '';
                $apellidoMaternoPostulante = '';
                $carrera = '';
            }

            $idProyecto = $proyecto->ID_PROYECTO;
            $modalidad = $proyecto->MODALIDAD;

            Util::agregarIndiceBulk($index, $titulo, $nombrePostulante, $apellidoPaternoPostulante, $apellidoMaternoPostulante, $idProyecto, $modalidad, $carrera);
        }

        // Se guardan todos los cambios realizados en el indice de lucene
        $index->commit();

        echo "Se ha terminado de reindexar todos los proyectos <br />";
    }

}
