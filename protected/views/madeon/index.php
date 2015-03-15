<?php
/* @var $this MadeonController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Madeons',
);

$this->menu=array(
	array('label'=>'Create Model', 'url'=>array('create')),
	array('label'=>'Manage Model', 'url'=>array('admin')),
);
?>

<h1>Model</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
