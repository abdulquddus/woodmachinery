<?php
/* @var $this AboutusController */
/* @var $model Aboutus */

$this->breadcrumbs=array(
	'Aboutuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Static Content', 'url'=>array('index')),
	array('label'=>'Manage Static Content', 'url'=>array('admin')),
);
?>

<h1>Create Static Content</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>