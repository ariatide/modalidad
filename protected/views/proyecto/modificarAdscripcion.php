<div class="twelve columns">
    <div class="standard-form compressed" >
        <div class="form">

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'enableAjaxValidation' => false,
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
            ?>

            <?php echo $form->errorSummary($model); ?>



            <div class="row">
                <?php echo $form->labelEx($model, 'fechaInforme1'); ?>
                <?php echo $form->textField($model, 'fechaInforme1', array('class' => 'datepicker')); ?>
                <?php echo $form->error($model, 'fechaInforme1'); ?>
            </div>    


            <div class="row">
                <?php echo $form->labelEx($model, 'fechaInforme2'); ?>
                <?php echo $form->textField($model, 'fechaInforme2', array('class' => 'datepicker')); ?>
                <?php echo $form->error($model, 'fechaInforme2'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'fechaInformeFin'); ?>
                <?php echo $form->textField($model, 'fechaInformeFin', array('class' => 'datepicker')); ?>
                <?php echo $form->error($model, 'fechaInformeFin'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'fechaInformeFinForma'); ?>
                <?php echo $form->textField($model, 'fechaInformeFinForma', array('class' => 'datepicker')); ?>
                <?php echo $form->error($model, 'fechaInformeFinForma'); ?>
            </div>


            <div class="row">
                <?php echo $form->labelEx($model, 'prorroga'); ?>
                <?php echo $form->textField($model, 'prorroga', array('class' => 'datepicker')); ?>
                <?php echo $form->error($model, 'prorroga'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'estado'); ?>
                <?php echo CHtml::activedropDownList($model, 'estado', array('Ejecucion' => 'Ejecucion', 'Concluido' => 'Concluido', 'Desistido' => 'Desistido')) ?>
                <?php echo $form->error($model, 'estado'); ?>
            </div>


            <div class="row">
                <?php echo $form->labelEx($model, 'temaNuevoProyecto'); ?>
                <?php echo $form->textArea($model, 'temaNuevoProyecto'); ?>
                <?php echo $form->error($model, 'temaNuevoProyecto'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'Objetivo General'); ?>
                <?php echo $form->textArea($model, 'objgral'); ?>
                <?php echo $form->error($model, 'objgral'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'Objetivo Especifico'); ?>
                <?php echo $form->textArea($model, 'objesp'); ?>
                <?php echo $form->error($model, 'objesp'); ?>
            </div>




            <div class="row">
                <?php echo $form->labelEx($model, 'documento'); ?>
                <?php echo $form->fileField($model, 'documento'); ?>
                <?php echo $form->error($model, 'documento'); ?>

                <?php if (!empty($model->documento)): ?>
                    <a target="_blank" href="<?php echo Yii::app()->baseUrl . '/upload/proyecto/' . $id . '/' . $model->documento ?>">(<?php echo $model->documento ?>)</a>
                <?php endif ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'tutor'); ?>
                <?php echo CHtml::activedropDownList($model, 'tutor', $docentes); ?>
                <?php echo $form->error($model, 'tutor'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model, 'supervisor'); ?>
                <?php echo $form->textField($model, 'supervisor'); ?>
                <?php echo $form->error($model, 'supervisor'); ?>
            </div>

            <div class="row buttons">
                <?php echo CHtml::submitButton('Actualizar'); ?>
            </div>

            <?php $this->endWidget(); ?>

        </div><!-- form -->
    </div>
</div>
<script type="text/javascript">
    $(function() {
        // Se agrega un datepicker a los campos que tiene la calse datepicker
        $('.datepicker').datepicker({dateFormat: 'dd/mm/yy'});

    });
</script>

