<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->ID_USR,
);

$this->menu=array(
	array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Create Usuario', 'url'=>array('create')),
	array('label'=>'Update Usuario', 'url'=>array('update', 'id'=>$model->ID_USR)),
	array('label'=>'Delete Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_USR),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);
?>

<h1>Vista Usuario #<?php echo $model->ID_USR; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_USR',
		'ID_ACCESO',
		'NOMBRE_USR',
		'APEPAT_USR',
		'APEMAT_USR',
		'NICKNAME_USR',
		'PASSWORD_USR',
		'ROL',
		'PERMISO',
		'ESTADO_USR',
	),
)); ?>
