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
                <?php echo $form->labelEx($model, 'fechaInformeFinTutor'); ?>
                <?php echo $form->textField($model, 'fechaInformeFinTutor', array('class' => 'datepicker')); ?>
                <?php echo $form->error($model, 'fechaInformeFinTutor'); ?>
            </div>    

            <div class="row">
                <?php echo $form->labelEx($model, 'fechaInformeFinal'); ?>
                <?php echo $form->textField($model, 'fechaInformeFinal', array('class' => 'datepicker')); ?>
                <?php echo $form->error($model, 'fechaInformeFinal'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'resumenTesis'); ?>
                <?php echo $form->textArea($model, 'resumenTesis'); ?>
                <?php echo $form->error($model, 'resumenTesis'); ?>
            </div>


            <div class="row">
                <?php echo $form->labelEx($model, 'estado'); ?>
                <?php echo CHtml::activedropDownList($model, 'estado', array('Ejecucion' => 'Ejecucion', 'Concluido' => 'Concluido', 'Desistido' => 'Desistido')) ?>
                <?php echo $form->error($model, 'estado'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'temaProyecto'); ?>
                <?php echo $form->textArea($model, 'temaProyecto'); ?>
                <?php echo $form->error($model, 'temaProyecto'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'documento'); ?>
                <?php echo $form->fileField($model, 'documento'); ?>
                <?php echo $form->error($model, 'documento'); ?>

                <?php if (!empty($model->documento)): ?>
                    <a target="_blank" href="<?php echo Yii::app()->baseUrl . '/upload/proyecto/' . $id . '/' . $model->documento ?>">(<?php echo $model->documento ?>)</a>
                <?php endif ?>
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

