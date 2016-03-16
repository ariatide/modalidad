<?php // if (Yii::app()->user->checkAccess('auxiliar')) {        ?>
<div class="twelve columns">
    <div class="clear"></div>


    <div class="twelve columns">
        <p class="link-location">Usted esta en: <a href="<?php echo Yii::app()->createUrl("/administrador") ?>">Reportes</a> / <a href="#">Lista Trabajo Dirigido</a></p>
    </div>


    <div class="two-thirds column alpha">
        <div class="title-wrapper">
            <div class="section-title">
                <h4 class="title">Lista de Titulos de Proyectos</h4>
            </div>
            <span class="divider"></span>
            <div class="clear"></div>
        </div>



        <table>


            <?php
            $f = true;
            $cont=1;
            foreach ($temas as $tema):

                if ($f) {
                    $f = FALSE;
                    ?>
                    <tr>
                        <?php
                    } else {
                        $f = true;
                        ?>
                    <tr class =" tableFila">
                    <?php } ?>
                        <td><?php echo $cont++; ?></td>
                        <td><?php echo Util::remplazarCaracteresEspecialesReporte($tema['TEMA_PROYECTO']); ?></td>

                </tr>
            <?php endforeach ?>
        </table>

    </div>

</div>  