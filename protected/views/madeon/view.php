<?php
/* @var $this MadeonController */
/* @var $model Madeon */

$this->breadcrumbs=array(
	'Madeons'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Model', 'url'=>array('index')),
	array('label'=>'Create Model', 'url'=>array('create')),
	array('label'=>'Update Model', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Model', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Model', 'url'=>array('admin')),
);
?>

<h1>View Model #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'manufactureid',
		'model',
		'status',
	),
)); ?>
