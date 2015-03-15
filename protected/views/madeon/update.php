<?php
/* @var $this MadeonController */
/* @var $model Madeon */

$this->breadcrumbs=array(
	'Madeons'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Model', 'url'=>array('index')),
	array('label'=>'Create Model', 'url'=>array('create')),
	array('label'=>'View Model', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Model', 'url'=>array('admin')),
);
?>

<h1>Update Model <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>