<?php
/* @var $this CallnowController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Callnows',
);

$this->menu=array(
	array('label'=>'Create Callnow', 'url'=>array('create')),
	array('label'=>'Manage Callnow', 'url'=>array('admin')),
);
?>

<h1>Callnows</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
