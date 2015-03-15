<?php
/* @var $this MetaContentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Meta Contents',
);

$this->menu=array(
	array('label'=>'Create MetaContent', 'url'=>array('create')),
	array('label'=>'Manage MetaContent', 'url'=>array('admin')),
);
?>

<h1>Meta Contents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
