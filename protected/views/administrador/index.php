<div class="twelve columns">
    <div class="content">

        <p><a href="<?php echo Yii::app()->user->ui->userManagementAdminUrl; ?>">Administrar Usuarios</a></p>
        <p><a href="<?php echo Yii::app()->createUrl('reporte');  ?>">Reportes</a></p>
        <p><a href="<?php echo Yii::app()->createUrl('modalidades/tesis');  ?>">Lista Titulos Tesis</a></p>
        <p><a href="<?php echo Yii::app()->createUrl('modalidades/dirigido');  ?>">Lista Titulos Trabajo Dirigido</a></p>
        <p><a href="<?php echo Yii::app()->createUrl('modalidades/adscripcion');  ?>">Lista Titulos Adscripción</a></p>
        <p><a href="<?php echo Yii::app()->createUrl('generarLista/generar');  ?>">Exportar Listas</a></p>
    </div><!-- content -->
</div>
