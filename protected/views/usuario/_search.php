<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_USR'); ?>
		<?php echo $form->textField($model,'ID_USR'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_ACCESO'); ?>
		<?php echo $form->textField($model,'ID_ACCESO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE_USR'); ?>
		<?php echo $form->textField($model,'NOMBRE_USR',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'APEPAT_USR'); ?>
		<?php echo $form->textField($model,'APEPAT_USR',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'APEMAT_USR'); ?>
		<?php echo $form->textField($model,'APEMAT_USR',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NICKNAME_USR'); ?>
		<?php echo $form->textField($model,'NICKNAME_USR',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PASSWORD_USR'); ?>
		<?php echo $form->textField($model,'PASSWORD_USR',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ROL'); ?>
		<?php echo $form->textField($model,'ROL',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PERMISO'); ?>
		<?php echo $form->textField($model,'PERMISO',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ESTADO_USR'); ?>
		<?php echo $form->textField($model,'ESTADO_USR'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->