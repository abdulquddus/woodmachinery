<?php
$this->breadcrumbs=array(
	'Sellings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Selling','url'=>array('index')),
	array('label'=>'Create Selling','url'=>array('create')),
	array('label'=>'View Selling','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Selling','url'=>array('admin')),
	);
	?>

	<h1>Update Selling <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>