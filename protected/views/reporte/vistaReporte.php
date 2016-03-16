             
<div class="shadow"></div>
<div class="container">
    <div class="page-title">
        <div class="rg"></div>
        <h1>Reportes</h1>
    </div>
</div>
</div>

<div class="body">
    <div class="body-round"></div>

    <div class="body-wrapper">
        <div class="side-shadows"></div>
        <div class="content">
            <div class="container">

                <div class="form">
                    <?php echo CHtml::beginForm(); ?>

                    <?php echo CHtml::errorSummary($model); ?>

                    <div class="row">
                        <?php echo CHtml::activeLabel($model, 'fechaIni'); ?>
                        <?php echo CHtml::activetextField($model, 'fechaIni', array('class' => 'datepicker', 'style' => '')) ?>
                    </div>

                    <div class="row">
                        <?php echo CHtml::activeLabel($model, 'fechaFin'); ?>
                        <?php echo CHtml::activetextField($model, 'fechaFin', array('class' => 'datepicker')) ?>
                    </div>

                    <div class="row">

                        <?php echo CHtml::activeCheckBox($model, 'check1', array('onclick' => 'if ($(this).is(":checked")) {
        $("#ReporteForm_modalidad").show()
    } else {
        $("#ReporteForm_modalidad").hide();
alert($("#ReporteForm_modalidad").val());        
$("#ReporteForm_modalidad").val("Selecciones una modalidad");
        alert($("#ReporteForm_modalidad").val());
        
    }')); ?>
                        <?php echo CHtml::activeLabel($model, 'modalidad'); ?>
                        <?php echo CHtml::activedropDownList($model, 'modalidad', array('vacio' => 'Selecciones una modalidad', 'tesis' => 'Tesis', 'adscripcion' => 'Adscripcion', 'dirigido' => 'T. Dirigido')) ?>
                    </div>

                    <div class="row">

                        <?php echo CHtml::activeCheckBox($model, 'check2', array('onclick' => 'if ($(this).is(":checked")) {
        $("#ReporteForm_estado").show()
    } else {
        $("#ReporteForm_estado").hide();
alert($("#ReporteForm_estado").val());        
$("#ReporteForm_estado").val("Seleccione un Estado");
        alert($("#ReporteForm_estado").val());
        
    }')); ?>
                        <?php echo CHtml::activeLabel($model, 'estado'); ?>
                        <?php echo CHtml::activedropDownList($model, 'estado', array('vacio' => 'Seleccione un Estado', 'concluido' => 'Concluido', 'desistido' => 'Desistido', 'ejecucion' => 'Ejecucion')) ?>
                    </div>
                    <div class="row">

                        <?php echo CHtml::activeCheckBox($model, 'check3', array('onclick' => 'if ($(this).is(":checked")) {
        $("#ReporteForm_carrera").show()
    } else {
        $("#ReporteForm_carrera").hide();
alert($("#ReporteForm_carrera").val());        
$("#ReporteForm_carrera").val("Seleccione una carrera");
        alert($("#ReporteForm_carrera").val());
        
    }')); ?>
                        <?php echo CHtml::activeLabel($model, 'carrera'); ?>
                        <?php echo CHtml::activedropDownList($model, 'carrera', array('vacio' => 'Seleccione una carrera', '1' => 'C. Juridicas', '2' => 'C. Politicas')) ?>
                    </div>

                    <div class="row">

                        <?php echo CHtml::activeCheckBox($model, 'check4', array('onclick' => 'if ($(this).is(":checked")) {
        $("#ReporteForm_area").show()
    } else {
        $("#ReporteForm_area").hide();
alert($("#ReporteForm_area").val());        
$("#ReporteForm_area").val("Seleccione un Area");
        alert($("#ReporteForm_area").val());
        
    }')); ?>
                        <?php echo CHtml::activeLabel($model, 'area'); ?>
                        <?php echo CHtml::activedropDownList($model, 'area', $areas) ?>
                    </div>
                    <div class="row submit">
                        <?php echo CHtml::submitButton('Generar'); ?>
                    </div>

                    <?php echo CHtml::endForm(); ?>
                </div><!-- form -->

                <table style="width:100%">
                    <thead>
                        <tr>
                            <th> </th>
                            <th style="width:120px">Nombre Completo</th>
                            <th>Tema</th> 
                            <th style="width:50px">Estado</th>
                            <th style="width:70px">Modalidad</th>
                            <th style="width:90px">Carrera</th>
                            <th style="width:90px">Area</th>
                            <th style="width:60px">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $f = TRUE;
                        foreach ($consulta as $fila) {
                            if ($f) { $f=FALSE;
                                ?>
                                <tr>
                                    <?php
                                } else { $f = TRUE;
                                    ?> <tr class="tableFila">        

                                <?php
                                }
                                foreach ($fila as $columna) {
                                    ?>
                                    <td> <?php echo Util::remplazarCaracteresEspecialesReporte($columna) ?> </td>
                            <?php } ?>
                            </tr>
<?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function() {
            // Se agrega un datepicker a los campos que tiene la calse datepicker
            $('.datepicker').datepicker({dateFormat: 'dd/mm/yy'});

        });
    </script>
