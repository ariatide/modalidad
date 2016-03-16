<div class="twelve columns">
    <div class="standard-form compressed" >
        <?php
        echo $event->sender->menu->run();
        echo '<div>Step ' . $event->sender->currentStep . ' of ' . $event->sender->stepCount;
        echo '<h3>' . $event->sender->getStepLabel($event->step) . '</h3>';

        if ($event->step == 'verificacion') {
            foreach ($data as $step => $dataStep):
                ?>

                <?php
                //  echo "step:" . $step;


                $formName = 'Form' . ucfirst($step);
                $model = new $formName();
                $model->disableBehaviors();
                $model->attributes = $dataStep;
                $formModel = $model->getForm();

                if ($step == 'postulante') {
                    ?>
                    <div class="fila">
                        <label class="cabecera"><strong>Nombre:</strong></label>
                        <label class="contenido"><?php echo $model->nombres ?></label>
                    </div>
                    <?php
                    //echo 'Nombre:' . $model->nombres;
                    ?>
                    <div class="fila1">
                        <label class="cabecera"><strong>Apellido Paterno:</strong></label>
                        <label class="contenido"><?php echo $model->apellidoPaterno ?></label>
                    </div>

                    <div class="fila">
                        <label class="cabecera"><strong>Apellido Materno:</strong></label>
                        <label class="contenido"><?php echo $model->apellidoMaterno ?></label>
                    </div>

                    <div class="fila1">
                        <label class="cabecera"><strong>Telefono:</strong></label>
                        <label class="contenido"><?php echo $model->telefonoFijo ?></label>
                    </div>

                    <div class="fila">
                        <label class="cabecera"><strong>Genero:</strong></label>
                        <label class="contenido"><?php echo $model->genero ?></label>
                    </div>

                    <div class="fila1">
                        <label class="cabecera"><strong>Carnet de Identidad:</strong></label>
                        <label class="contenido"><?php echo $model->ci ?></label>
                    </div>
                    <?php
                    //echo 'Apellido Paterno:' . $model->apellidoPaterno;
                } else if ($step == 'tesis') {
                    ?>
                    <div class="fila1">
                        <label class="cabecera"><strong>Aprobacion Pertinencia:</strong></label>
                        <label class="contenido"><?php echo $model->aprobacionPertinencia ?></label>
                    </div>
                    <?php
                } else if ($step == 'proyectoTesis') {
                    ?>
                    <div class="fila">
                        <label class="cabecera"><strong>Titulo:</strong></label>
                        <label class="contenido"><?php echo $model->titulo ?></label>
                    </div>
                    <div class="fila1">
                        <label class="cabecera"><strong>Area Juridica:</strong></label>
                        <label class="contenido"><?php echo $model->areaJuridica ?></label>
                    </div>
                    <div class="fila">
                        <label class="cabecera"><strong>Nro. de Folder:</strong></label>
                        <label class="contenido"><?php echo $model->numeroConvenio ?></label>
                    </div>
                    <div class="fila1">
                        <label class="cabecera"><strong>Observaciones:</strong></label>
                        <label class="contenido"><?php echo $model->observaciones ?></label>
                    </div>
                    <div class="fila">
                        <label class="cabecera"><strong>Estado:</strong></label>
                        <label class="contenido"><?php echo $model->estado ?></label>
                    </div>

                    <?php
                } else if ($step == 'adscripcion') {
                    ?>
                    <div class="fila1">
                        <label class="cabecera"><strong>Suscripcion Convenio:</strong></label>
                        <label class="contenido"><?php echo $model->subscripcionConvenio ?></label>
                    </div>
                    <div class="fila">
                        <label class="cabecera"><strong>Lista de cotejo de seguinmiento:</strong></label>
                        <label class="contenido"><?php echo $model->primeraListaCotejo ?></label>
                    </div>
                    </div>
                    <div class="fila">
                        <label class="cabecera"><strong>Primer Informe Avance:</strong></label>
                        <label class="contenido"><?php echo $model->primerInformeAvance ?></label>
                    </div>
                    <div class="fila1">
                        <label class="cabecera"><strong>Informe Final:</strong></label>
                        <label class="contenido"><?php echo $model->informeFinal ?></label>
                    </div>
                    <div class="fila">
                        <label class="cabecera"><strong>Informe Final de Forma:</strong></label>
                        <label class="contenido"><?php echo $model->informeFinalForma ?></label>
                    </div>
                    <?php
                } else if ($step == 'proyectoAdscripcion') {
                    ?>  
                    <div class="fila">
                        <label class="cabecera"><strong>Titulo:</strong></label>
                        <label class="contenido"><?php echo $model->titulo ?></label>
                    </div>
                    <div class="fila1">
                        <label class="cabecera"><strong>Area:</strong></label>
                        <label class="contenido"><?php echo $model->areaJuridica ?></label>
                    </div>
                    <div class="fila">
                        <label class="cabecera"><strong>Nro Foder:</strong></label>
                        <label class="contenido"><?php echo $model->numeroConvenio ?></label>
                    </div>
                    <div class="fila1">
                        <label class="cabecera"><strong>Observacion:</strong></label>
                        <label class="contenido"><?php echo $model->observaciones ?></label>
                    </div>
                    <div class="fila">
                        <label class="cabecera"><strong>Estado:</strong></label>
                        <label class="contenido"><?php echo $model->estado ?></label>
                    </div>
                    <?php
                } else if ($step == 'trabajoDirigido') {
                    ?>
                    <div class="fila1">
                        <label class="cabecera"><strong>Suscripcion Convenio:</strong></label>
                        <label class="contenido"><?php echo $model->suscripcionConvenio ?></label>
                    </div>
                    <div class="fila">
                        <label class="cabecera"><strong>Primera lista de Cotejo:</strong></label>
                        <label class="contenido"><?php echo $model->primeraListaCotejo ?></label>
                    </div>
                    <div class="fila1">
                        <label class="cabecera"><strong>Primer Informe Avance:</strong></label>
                        <label class="contenido"><?php echo $model->primerInformeAvance ?></label>
                    </div>
                    <div class="fila">
                        <label class="cabecera"><strong>Informe Final:</strong></label>
                        <label class="contenido"><?php echo $model->informeFinal ?></label>
                    </div>
                    <div class="fila1">
                        <label class="cabecera"><strong>Informe Final de Forma:</strong></label>
                        <label class="contenido"><?php echo $model->informeFinalForma ?></label>
                    </div>
                    <?php
                } else if ($step == 'proyectoTDirigido') {
                    ?>  
                    <div class="fila">
                        <label class="cabecera"><strong>Titulo:</strong></label>
                        <label class="contenido"><?php echo $model->titulo ?></label>
                    </div>
                    <div class="fila1">
                        <label class="cabecera"><strong>Area:</strong></label>
                        <label class="contenido"><?php echo $model->areaJuridica ?></label>
                    </div>
                    <div class="fila">
                        <label class="cabecera"><strong>Nro Foder:</strong></label>
                        <label class="contenido"><?php echo $model->numeroConvenio ?></label>
                    </div>
                    <div class="fila1">
                        <label class="cabecera"><strong>Observacion:</strong></label>
                        <label class="contenido"><?php echo $model->observaciones ?></label>
                    </div>
                    <div class="fila">
                        <label class="cabecera"><strong>Estado:</strong></label>
                        <label class="contenido"><?php echo $model->estado ?></label>
                    </div>
                    <?php
                }


            /*
              echo "<div class='step-resume-form-container' style='width:400px;float:right;'>";
              echo "<div>Datos de ".ucfirst($step)."</div>";
              echo CHtml::tag('div',array('class'=>'form'),$formModel);
              echo "</div>";
             */

            endforeach;
        }


        echo "<div style='clear:both;'></div>";

        echo CHtml::tag('div', array('class' => 'form'), $form);
        ?>

    </div>
</div>
</div>
<script type="text/javascript">
    $(function() {

        var tutorSeleccionado = '';
        var lugarEjecucionSeleccionado = '';
        var unidadPatrocinadoraSeleccionada = '';


        // Se deshabilitan todos los campos del formulario que muestra un resumen de los datos
        $('.step-resume-form-container input, .step-resume-form-container select, .step-resume-form-container textarea').attr('disabled', 'disabled');
        $('.step-resume-form-container input[type="submit"]').remove();
        // Se agrega un datepicker a los campos que tiene la calse datepicker
        $('.datepicker').datepicker({dateFormat: 'dd/mm/yy'});


        // Se agrega el autocompleter para el campo supervisor

        // Autocomplete para nombre de supervisor de Adscripcion
        $("#FormProyectoAdscripcion_nombreSupervisor").autocomplete({
            source: "<?php echo $this->createUrl('site/obtenerSupervisoresAdscripcion'); ?>",
            minLength: 1,
        });

        // Autocomplete para nomvre de supervisor de Trabajo Dirigido
        $("#FormProyectoTDirigido_nombreSupervisor").autocomplete({
            source: "<?php echo $this->createUrl('site/obtenerSupervisoresTDirigido'); ?>",
            minLength: 1,
        });

        // Autocomplete para tutor
        $("#FormProyectoAdscripcion_tutor, #FormProyectoTDirigido_tutor, #FormProyectoTesis_tutor").autocomplete({
            source: "<?php echo $this->createUrl('site/obtenerTutores'); ?>",
            minLength: 1,
            select: function(event, ui) {
                $('#FormProyectoAdscripcion_tutorId').val(ui.item.id);
                $('#FormProyectoTDirigido_tutorId').val(ui.item.id);
                $('#FormProyectoTesis_tutorId').val(ui.item.id);
                tutorSeleccionado = ui.item.value;
            }
        });

        // Funcion para verfiicar si ha ingresado el nombre de un nuevo tutor
        $("#FormProyectoAdscripcion_tutor, #FormProyectoTDirigido_tutor").change(function() {
            if (tutorSeleccionado != '' && $(this).val() != tutorSeleccionado) {
                tutorSeleccionado = '';
                $('#FormProyectoAdscripcion_tutorId').val('');
                $('#FormProyectoTDirigido_tutorId').val('');
                $('#FormProyectoTesis_tutorId').val('');
            }
        });


        // Autocomplete para Lugar Ejecucion
        $("#FormProyectoTDirigido_lugarEjecucion").autocomplete({
            source: "<?php echo $this->createUrl('site/obtenerLugaresEjecucion'); ?>",
            minLength: 1,
            select: function(event, ui) {
                $('#FormProyectoTDirigido_lugarEjecucionId').val(ui.item.id);
                lugarEjecucionSeleccionado = ui.item.value;
            }
        });

        $("#FormProyectoTDirigido_lugarEjecucion").change(function() {
            if (lugarEjecucionSeleccionado != '' && $(this).val() != lugarEjecucionSeleccionado) {
                lugarEjecucionSeleccionado = '';
                $('#FormProyectoTDirigido_lugarEjecucionId').val('');

            }
        });


        // Autocomplete para Unidad Patrocinadora
        $("#FormProyectoAdscripcion_unidadPatrocinadora").autocomplete({
            source: "<?php echo $this->createUrl('site/obtenerUnidadesPatrocinadoras'); ?>",
            minLength: 1,
            select: function(event, ui) {
                $('#FormProyectoAdscripcion_unidadPatrocinadoraId').val(ui.item.id);
                unidadPatrocinadoraSeleccionada = ui.item.value;
            }
        });

        $("#FormProyectoAdscripcion_unidadPatrocinadora").change(function() {
            if (unidadPatrocinadoraSeleccionada != '' && $(this).val() != unidadPatrocinadoraSeleccionada) {
                unidadPatrocinadoraSeleccionada = '';
                $('#FormProyectoAdscripcion_unidadPatrocinadoraId').val('');

            }
        });

    });
</script>
