<?php
 
class file extends CFormModel {
 
    public $imagenes;
    public $titulo;
 
    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            //note you wont need a safe rule here
            array('imagenes', 'file', 'allowEmpty' => true, 'types' => 'jpg, jpeg, gif, png'),
            array('titulo', 'safe')
        );
    }
 
}