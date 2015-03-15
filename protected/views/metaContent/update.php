<?php
/* @var $this MetaContentController */
/* @var $model MetaContent */

$this->breadcrumbs=array(
	'Meta Contents'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MetaContent', 'url'=>array('index')),
	array('label'=>'Create MetaContent', 'url'=>array('create')),
	array('label'=>'View MetaContent', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MetaContent', 'url'=>array('admin')),
);
?>

<h1>Update MetaContent <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>