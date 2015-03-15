<?php
/* @var $this MadeonController */
/* @var $model Madeon */

$this->breadcrumbs=array(
	'Madeons'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Model', 'url'=>array('index')),
	array('label'=>'Manage Model', 'url'=>array('admin')),
);
?>

<h1>Create Model</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>