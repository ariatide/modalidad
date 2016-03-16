<?php
 
return array(
 
    'attributes' => array(
        'enctype' => 'multipart/form-data',
    ),
 
    'elements' => array(
        'imagenes' => array(
            'type' => 'file',
         ),
        'titulo' => array(
            'type' => 'text',
         ),
       
     ),

    'buttons' => array(
        'reset' => array(
            'type' => 'reset',
            'label' => 'Reset',
        ),
        'submit' => array(
            'type' => 'submit',
            'label' => 'Subir',
        ),
    ),
);