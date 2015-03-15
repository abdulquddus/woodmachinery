<?php
$this->breadcrumbs=array(
	'Eq Images'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List EqImages','url'=>array('index')),
	array('label'=>'Create EqImages','url'=>array('create')),
	array('label'=>'View EqImages','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage EqImages','url'=>array('admin')),
	);
	?>

	<h1>Update EqImages <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>