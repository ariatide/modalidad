<?php

class Util {

    private static $_indexFiles = 'runtime.search';

    public static function agregarIndiceLucene($titulo, $nombrePostulante, $apellidoPaternoPostulante, $apellidoMaternoPostulante, $idProyecto, $modalidad, $carrera) {

        // Se importar la librerias necesarias de Lucene	
        Yii::import('application.vendors.*');
        require_once('Zend/Search/Lucene.php');
        require_once('Zend/Search/Lucene/Analysis/TokenFilter/StopWords.php');

        $stopWordsFilter = new Zend_Search_Lucene_Analysis_TokenFilter_StopWords();
        $stopWordsFilter->loadFromFile(YiiBase::getPathOfAlias('application.config') . '/stopwords.txt');

        Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding('utf-8');
        $analyzer = new Zend_Search_Lucene_Analysis_Analyzer_Common_Utf8_CaseInsensitive();
        $analyzer->addFilter($stopWordsFilter);
        Zend_Search_Lucene_Analysis_Analyzer::setDefault($analyzer);

        if (!empty($titulo)) {
            // Esto solo se va ha ejecutar la primera vez
            //$index = Zend_Search_Lucene::create(Yii::getPathOfAlias('application.' . $this->_indexFiles));
            $index = Zend_Search_Lucene::open(Yii::getPathOfAlias('application.' . Util::$_indexFiles));

            /*
              // Se procede a agregar un elemento al indice de busqueda
              $doc = new Zend_Search_Lucene_Document();
              $doc->addField(Zend_Search_Lucene_Field::Text('titulo', CHtml::encode(strtolower($titulo)), 'utf-8'));
              $doc->addField(Zend_Search_Lucene_Field::Text('nombrePostulante', CHtml::encode(strtolower($nombrePostulante)), 'utf-8'));
              $doc->addField(Zend_Search_Lucene_Field::Text('apellidoPaternoPostulante', CHtml::encode(strtolower($apellidoPaternoPostulante)), 'utf-8'));
              $doc->addField(Zend_Search_Lucene_Field::Text('apellidoMaternoPostulante', CHtml::encode(strtolower($apellidoMaternoPostulante)), 'utf-8'));

              $doc->addField(Zend_Search_Lucene_Field::UnIndexed('idProyecto', CHtml::encode($idProyecto), 'utf-8'));
              $doc->addField(Zend_Search_Lucene_Field::UnIndexed('modalidad', CHtml::encode($modalidad), 'utf-8'));
              $doc->addField(Zend_Search_Lucene_Field::UnIndexed('carrera', CHtml::encode($carrera), 'utf-8'));
              $index->addDocument($doc);
             */

            Util::agregarIndiceBulk($index, $titulo, $nombrePostulante, $apellidoPaternoPostulante, $apellidoMaternoPostulante, $idProyecto, $modalidad, $carrera);

            $index->commit();
        }
    }

    public static function agregarIndiceBulk($index, $titulo, $nombrePostulante, $apellidoPaternoPostulante, $apellidoMaternoPostulante, $idProyecto, $modalidad, $carrera) {

        // Se procede a agregar un elemento al indice de busqueda
        $doc = new Zend_Search_Lucene_Document();
        $doc->addField(Zend_Search_Lucene_Field::Text('titulo', CHtml::encode(strtolower($titulo)), 'utf-8'));
        $doc->addField(Zend_Search_Lucene_Field::Text('nombrePostulante', CHtml::encode(strtolower($nombrePostulante)), 'utf-8'));
        $doc->addField(Zend_Search_Lucene_Field::Text('apellidoPaternoPostulante', CHtml::encode(strtolower($apellidoPaternoPostulante)), 'utf-8'));
        $doc->addField(Zend_Search_Lucene_Field::Text('apellidoMaternoPostulante', CHtml::encode(strtolower($apellidoMaternoPostulante)), 'utf-8'));

        $doc->addField(Zend_Search_Lucene_Field::UnIndexed('idProyecto', CHtml::encode($idProyecto), 'utf-8'));
        $doc->addField(Zend_Search_Lucene_Field::UnIndexed('modalidad', CHtml::encode($modalidad), 'utf-8'));
        $doc->addField(Zend_Search_Lucene_Field::UnIndexed('carrera', CHtml::encode($carrera), 'utf-8'));
        $index->addDocument($doc);
    }

    public static function actualizarIndiceBulk($titulo, $nombrePostulante, $apellidoPaternoPostulante, $apellidoMaternoPostulante, $idProyecto, $modalidad, $carrera) {
        Yii::import('application.vendors.*');
        require_once('Zend/Search/Lucene.php');
        require_once('Zend/Search/Lucene/Analysis/TokenFilter/StopWords.php');

        // Open existing index
        $index = Zend_Search_Lucene::open(Yii::getPathOfAlias('application.' . Util::$_indexFiles));

        $doc = new Zend_Search_Lucene_Document();
// Store document URL to identify it in search result.
        $doc->addField(Zend_Search_Lucene_Field::Text('titulo', CHtml::encode(strtolower($titulo)), 'utf-8'));
        $doc->addField(Zend_Search_Lucene_Field::Text('nombrePostulante', CHtml::encode(strtolower($nombrePostulante)), 'utf-8'));
        $doc->addField(Zend_Search_Lucene_Field::Text('apellidoPaternoPostulante', CHtml::encode(strtolower($apellidoPaternoPostulante)), 'utf-8'));
        $doc->addField(Zend_Search_Lucene_Field::Text('apellidoMaternoPostulante', CHtml::encode(strtolower($apellidoMaternoPostulante)), 'utf-8'));

        $doc->addField(Zend_Search_Lucene_Field::UnIndexed('idProyecto', CHtml::encode($idProyecto), 'utf-8'));
        $doc->addField(Zend_Search_Lucene_Field::UnIndexed('modalidad', CHtml::encode($modalidad), 'utf-8'));
        $doc->addField(Zend_Search_Lucene_Field::UnIndexed('carrera', CHtml::encode($carrera), 'utf-8'));
// Add document to the index.
        $index->addDocument($doc);
    }

    public static function remplazarCaracteresEspeciales($cadena) {
        /*
          return strtr($string,'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ',
          'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
         */

        $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ()';
        $modificadas ='AAAAAAACEEEEIIIIDNOOOOOOUUUUYBsaaaaaaaceeeeiiiidnoooooouuuyybyRr  ';
        $cadena = utf8_decode($cadena);
        $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
        //$cadena = strtolower($cadena);
        return utf8_encode($cadena);
    }
    public static function remplazarCaracteresEspecialesReporte($cadena) {
  
        $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ()';
        $modificadas ='AAAAAAACEEEEIIIIDNOOOOOOUUUUYBsaaaaaaaceeeeiiiidnoooooouuuyybyRr  ';
        $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
        //$cadena = strtolower($cadena);
        return utf8_encode($cadena);
    }

    public static function convertirFecha($fecha) {
        $fechaConvertida = '';
        $valuesFecha = explode('/', $fecha);
        if (!empty($fecha)) {
            $fechaConvertida = $valuesFecha[2] . '/' . $valuesFecha[1] . '/' . $valuesFecha[0];
        }
        return $fechaConvertida;
    }

    public static function convertirFechaMostrarInterfaz($fecha) {
        $fechaConvertida = '';
        $valuesFecha = explode('-', $fecha);
        if (!empty($fecha)) {
            $fechaConvertida = $valuesFecha[2] . '/' . $valuesFecha[1] . '/' . $valuesFecha[0];
        }
        return $fechaConvertida;
    }

}
