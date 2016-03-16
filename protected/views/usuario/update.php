<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->ID_USR=>array('view','id'=>$model->ID_USR),
	'Update',
);

$this->menu=array(
	array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Create Usuario', 'url'=>array('create')),
	array('label'=>'View Usuario', 'url'=>array('view', 'id'=>$model->ID_USR)),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);
?>

<h1>Actualizar Usuario <?php echo $model->ID_USR; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>