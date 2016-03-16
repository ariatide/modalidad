<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'imagen-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'NOMBRE_IMAGEN'); ?>
		<?php echo $form->fileField($model,'NOMBRE_IMAGEN',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'NOMBRE_IMAGEN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imagen_nombre_tabla'); ?>
		<?php echo $form->textField($model,'imagen_nombre_tabla',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'imagen_nombre_tabla'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->