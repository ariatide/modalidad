<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ID_ACCESO'); ?>
		<?php echo $form->textField($model,'ID_ACCESO'); ?>
		<?php echo $form->error($model,'ID_ACCESO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NOMBRE_USR'); ?>
		<?php echo $form->textField($model,'NOMBRE_USR',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'NOMBRE_USR'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'APEPAT_USR'); ?>
		<?php echo $form->textField($model,'APEPAT_USR',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'APEPAT_USR'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'APEMAT_USR'); ?>
		<?php echo $form->textField($model,'APEMAT_USR',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'APEMAT_USR'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NICKNAME_USR'); ?>
		<?php echo $form->textField($model,'NICKNAME_USR',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'NICKNAME_USR'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PASSWORD_USR'); ?>
		<?php echo $form->textField($model,'PASSWORD_USR',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'PASSWORD_USR'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ROL'); ?>
		<?php echo $form->textField($model,'ROL',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'ROL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PERMISO'); ?>
		<?php echo $form->textField($model,'PERMISO',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'PERMISO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ESTADO_USR'); ?>
		<?php echo $form->textField($model,'ESTADO_USR'); ?>
		<?php echo $form->error($model,'ESTADO_USR'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->