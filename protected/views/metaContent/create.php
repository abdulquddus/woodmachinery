<?php
/* @var $this MetaContentController */
/* @var $model MetaContent */

$this->breadcrumbs=array(
	'Meta Contents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MetaContent', 'url'=>array('index')),
	array('label'=>'Manage MetaContent', 'url'=>array('admin')),
);
?>

<h1>Create MetaContent</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>