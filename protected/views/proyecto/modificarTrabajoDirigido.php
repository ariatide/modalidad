<div class="twelve columns">
    <div class="standard-form compressed" >
        <div class="form">

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'docente-form',
                'enableAjaxValidation' => false,
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
            ?>

            <?php echo $form->errorSummary($model); ?>

            <div class="row">
                <?php echo $form->labelEx($model, 'estado'); ?>
                <?php echo CHtml::activedropDownList($model, 'estado', array('Ejecucion' => 'Ejecucion', 'Concluido' => 'Concluido', 'Desistido' => 'Desistido')) ?>
                <?php echo $form->error($model, 'estado'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'primeraListaCotejo'); ?>
                <?php echo $form->textField($model, 'primeraListaCotejo', array('class' => 'datepicker')); ?>
                <?php echo $form->error($model, 'primeraListaCotejo'); ?>
            </div>


            <div class="row">
                <?php echo $form->labelEx($model, 'listaCotejoSeguimiento'); ?>
                <?php echo $form->textField($model, 'listaCotejoSeguimiento', array('class' => 'datepicker')); ?>
                <?php echo $form->error($model, 'listaCotejoSeguimiento'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'listaCotejoInformeFinal'); ?>
                <?php echo $form->textField($model, 'listaCotejoInformeFinal', array('class' => 'datepicker')); ?>
                <?php echo $form->error($model, 'listaCotejoInformeFinal'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'informeFinalForma'); ?>
                <?php echo $form->textField($model, 'informeFinalForma', array('class' => 'datepicker')); ?>
                <?php echo $form->error($model, 'informeFinalForma'); ?>
            </div>


            <div class="row">
                <?php echo $form->labelEx($model, 'prorroga'); ?>
                <?php echo $form->textField($model, 'prorroga', array('class' => 'datepicker')); ?>
                <?php echo $form->error($model, 'prorroga'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'temaAnterior'); ?>
                <?php echo $form->textField($model, 'temaAnterior'); ?>
                <?php echo $form->error($model, 'temaAnterior'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'temaProyecto'); ?>
                <?php echo $form->textField($model, 'temaProyecto'); ?>
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

