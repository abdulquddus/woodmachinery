<?php
/* @var $this UserRegController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Regs',
);

$this->menu=array(
	array('label'=>'Create UserReg', 'url'=>array('create')),
	array('label'=>'Manage UserReg', 'url'=>array('admin')),
);
?>

<h1>User Regs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
