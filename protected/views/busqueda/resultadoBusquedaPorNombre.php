<?php // if (Yii::app()->user->checkAccess('xxx')) {                ?>
<div class="twelve columns">
    <?php $this->widget('OtrosWidget'); ?>

    <?php // }
    ?>
    <div class="clear"></div>

    <h5>Resultados Busqueda Avanzada</h5>


    <?php
    if (!empty($resultados)):
        ?>


        <h4>Resultados para: "<?php echo CHtml::encode($terminoBusquedaUsuario); ?>"</h4>

        <?php
        $file = fopen("datos.txt", "a") or die("Problemas");
        foreach ($resultados as $resultado):
            ?>

            <div class="bloque">
                <?php if ($resultado->score > 0.1): ?>
                    <span class="hr"></span>

                    <?php
                    ?>

                    <?php
                    $proyecto = Proyecto::model()->find('ID_PROYECTO=:proyectoID', array(':proyectoID' => $resultado->idProyecto));
                    $tipo = $proyecto->MODALIDAD;
                    $fecha = null;
                    if ($tipo == 'Tesis') {
                        $fecha = $proyecto->FECHA_INSCRIP_PROY;
                    } else if ($tipo == 'Adscripcion') {
                        $proyads = ProyectoAdscripcion::model()->findByPk($proyecto->ID_PROYECTO);
                        $fecha = $proyads->FECHA_SUBSCRIPCIONCONVENIO_ADS;
                    } else if ($tipo == 'Trabajo Dirigido') {
                        $proyads = ProyectoTdirigido::model()->findByPk($proyecto->ID_PROYECTO);
                        $fecha = $proyads->SUSCRIPCIONCONVENIO;
                    }
                    ?>

                    <?php if (isset($proyecto)): ?>

                        <?php
                        $postulante = Postulante::model()->find('ID_POS=:postulanteID', array(':postulanteID' => $proyecto->ID_POS));
                        //$carrera = Carrera::model()->find('ID_CARRERA=:carreraID', array(':carreraID' => $resultado->carrera));
                        ?>

                        <div class="fila">
                            <label class="cabecera"><strong>Titulo:</strong></label>
                            <label class="contenido"><?php echo $consulta->highlightMatches(CHtml::encode(Util::remplazarCaracteresEspeciales($proyecto->TEMA_PROYECTO))); ?></label>
                        </div>
                        <div class="fila1">
                            <label class="cabecera"> <strong>Nombre Postulante:</strong></label>
                <?php
//Creamos el archivo datos.txt
//ponemos tipo 'a' para añadir lineas sin borrar
                //vamos añadiendo el contenido
                /*         fputs($file, "---------------");
                  fputs($file, "\n");
                  fputs($file, $postulante->NOMBRE_POS );
                  fputs($file, "\n");
                  fputs($file, $postulante->APEPAT_POS);
                  fputs($file, "\n");
                  fputs($file, $postulante->APEMAT_POS);
                  fputs($file, "\n");
                  fputs($file, $proyecto->TEMA_PROYECTO);
                  fputs($file, "\n");
                  fputs($file, $proyecto->NRO_FOLDER);
                  fputs($file, "\n");
                  fputs($file, $postulante->CARRERA->NOMBRE_CARRERA);
                  fputs($file, "----------------------");
                  fputs($file, "\n");

                  echo $proyecto->ID_POS;
                  echo '  -  '.$postulante->ID_POS ;
                  echo '  -  '.$postulante->NOMBRE_POS ;
                  echo '  -  '.$postulante->APEPAT_POS ;
                  echo '  -  '.$postulante->APEMAT_POS.'  ---';

                 */
                ?>
                            <label class="contenido"><?php echo $consulta->highlightMatches(CHtml::encode($postulante->NOMBRE_POS . ' ' . $postulante->APEPAT_POS . ' ' . $postulante->APEMAT_POS)); ?></label>
                        </div>
                        <div class="fila">
                            <label class="cabecera"><strong>Carrera: </strong></label>
                            <label class="contenido"><?php echo $postulante->CARRERA->NOMBRE_CARRERA ?></label>
                        </div>
                        <div class="fila1">
                            <label class="cabecera"><strong>Modalidad:</strong></label>
                            <label class="contenido"> <?php echo $proyecto->MODALIDAD ?></label>
                        </div>
                        <div class="fila">
                            <label class="cabecera"><strong>Fecha Suscripcion:</strong></label>
                            <label class="contenido"> <?php echo $fecha ?></label>
                        </div>

                        <div class="fila1">
                            <label class="cabecera"><strong>Estado: </strong></label>
                            <label class="contenido"><?php echo $proyecto->ESTADO_PROY ?></label>
                        </div>
                <?php
                if (Yii::app()->user->checkAccess('auxiliar') ||
                        Yii::app()->user->checkAccess('encargado')) {
                    ?>
                            <div class="fila">
                                <label class="cabecera"><strong>Nro Folder: </strong></label>
                                <label class="contenido"><?php echo $proyecto->NRO_FOLDER ?></label>
                            </div>
                <?php } ?>


                                                                                                                                                                                            <!--<div>Score: <?php echo $resultado->score ?> </div>-->
                        <!--
                        <div><a href="<?php echo Yii::app()->createUrl('busqueda/detalleBusquedaAvanzada', array('id' => $proyecto->ID_PROYECTO)); ?>">Ver Detalle</a></div>
                        -->
                <?php if ($proyecto->MODALIDAD == 'Trabajo Dirigido'): ?>

                            <?php
                            if (Yii::app()->user->checkAccess('auxiliar') ||
                                    Yii::app()->user->checkAccess('encargado')) {
                                ?>
                                <a href="<?php echo Yii::app()->createUrl('proyecto/modificarTrabajoDirigido', array('id' => $proyecto->ID_PROYECTO)); ?>">Editar</a>
                            <?php } ?>
                        <?php endif ?>

                        <?php
                    endif;

                    if ($proyecto->MODALIDAD == 'Tesis') {
                        if (Yii::app()->user->checkAccess('auxiliar') ||
                                Yii::app()->user->checkAccess('encargado')) {
                            ?>
                            <a href="<?php echo Yii::app()->createUrl('proyecto/modificarTesis', array('id' => $proyecto->ID_PROYECTO)); ?>">Editar</a>
                        <?php } ?>
                        <?php
                    }
                    if ($proyecto->MODALIDAD == 'Adscripcion') {
                        if (Yii::app()->user->checkAccess('auxiliar') ||
                                Yii::app()->user->checkAccess('encargado')) {
                            ?>
                            <a href="<?php echo Yii::app()->createUrl('proyecto/modificarAdscripcion', array('id' => $proyecto->ID_PROYECTO)); ?>">Editar</a>
                        <?php } ?>
                        <?php
                    }

                endif
                ?>


            </div>
        <?php
    endforeach;
    fclose($file);
    ?>

    <?php else: ?>
        <p class="error">No se encontraron resultados para sus términos de búsqueda</p>
    <?php
    endif;
    ?>
</div>
