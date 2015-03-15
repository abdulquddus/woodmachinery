<?php
/* @var $this CallnowController */
/* @var $model Callnow */

$this->breadcrumbs=array(
	'Callnows'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Callnow', 'url'=>array('index')),
	array('label'=>'Create Callnow', 'url'=>array('create')),
	array('label'=>'View Callnow', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Callnow', 'url'=>array('admin')),
);
?>

<h1>Update Callnow <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>