<?php
/* @var $this UserRegController */
/* @var $model UserReg */

$this->breadcrumbs=array(
	'User Regs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserReg', 'url'=>array('index')),
	array('label'=>'Manage UserReg', 'url'=>array('admin')),
);
?>

<h1>Create UserReg</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>