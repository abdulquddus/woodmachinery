<?php
/* @var $this AboutusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Aboutuses',
);

$this->menu=array(
	array('label'=>'Create Static Content', 'url'=>array('create')),
	array('label'=>'Manage Static Content', 'url'=>array('admin')),
);
?>

<h1>Static Content</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
