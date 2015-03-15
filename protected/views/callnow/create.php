<?php
/* @var $this CallnowController */
/* @var $model Callnow */

$this->breadcrumbs=array(
	'Callnows'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Callnow', 'url'=>array('index')),
	array('label'=>'Manage Callnow', 'url'=>array('admin')),
);
?>

<h1>Create Callnow</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>