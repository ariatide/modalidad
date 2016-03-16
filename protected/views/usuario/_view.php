<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_USR')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_USR), array('view', 'id'=>$data->ID_USR)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_ACCESO')); ?>:</b>
	<?php echo CHtml::encode($data->ID_ACCESO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_USR')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE_USR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('APEPAT_USR')); ?>:</b>
	<?php echo CHtml::encode($data->APEPAT_USR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('APEMAT_USR')); ?>:</b>
	<?php echo CHtml::encode($data->APEMAT_USR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NICKNAME_USR')); ?>:</b>
	<?php echo CHtml::encode($data->NICKNAME_USR); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PASSWORD_USR')); ?>:</b>
	<?php echo CHtml::encode($data->PASSWORD_USR); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ROL')); ?>:</b>
	<?php echo CHtml::encode($data->ROL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PERMISO')); ?>:</b>
	<?php echo CHtml::encode($data->PERMISO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ESTADO_USR')); ?>:</b>
	<?php echo CHtml::encode($data->ESTADO_USR); ?>
	<br />

	*/ ?>

</div>