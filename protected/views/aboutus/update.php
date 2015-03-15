<?php
/* @var $this AboutusController */
/* @var $model Aboutus */

$this->breadcrumbs=array(
	'Aboutuses'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Static Content', 'url'=>array('index')),
	array('label'=>'Create Static Content', 'url'=>array('create')),
	array('label'=>'View Static Content', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Static Content', 'url'=>array('admin')),
);
?>

<h1>Update Static Content <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>