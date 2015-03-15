<?php
/* @var $this CallnowController */
/* @var $model Callnow */

$this->breadcrumbs=array(
	'Callnows'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Callnow', 'url'=>array('index')),
	array('label'=>'Create Callnow', 'url'=>array('create')),
	array('label'=>'Update Callnow', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Callnow', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Callnow', 'url'=>array('admin')),
);
?>

<h1>View Callnow #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_equipment',
		'company',
		'full_name',
		'email',
		'contact',
		'message',
		'options',
		'type',
		'status',
	),
)); ?>
