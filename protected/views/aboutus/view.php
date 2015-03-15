<?php
/* @var $this AboutusController */
/* @var $model Aboutus */

$this->breadcrumbs=array(
	'Aboutuses'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Static Content', 'url'=>array('index')),
	array('label'=>'Create Static Content', 'url'=>array('create')),
	array('label'=>'Update Static Content', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Static Content', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Static Content', 'url'=>array('admin')),
);
?>

<h1>View Aboutus #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'content',
	),
)); ?>
