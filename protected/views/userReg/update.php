<?php
/* @var $this UserRegController */
/* @var $model UserReg */

$this->breadcrumbs=array(
	'User Regs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserReg', 'url'=>array('index')),
	array('label'=>'Create UserReg', 'url'=>array('create')),
	array('label'=>'View UserReg', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserReg', 'url'=>array('admin')),
);
?>

<h1>Update UserReg <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>