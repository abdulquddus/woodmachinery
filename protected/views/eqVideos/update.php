<?php
$this->breadcrumbs=array(
	'Eq Videoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List EqVideos','url'=>array('index')),
	array('label'=>'Create EqVideos','url'=>array('create')),
	array('label'=>'View EqVideos','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage EqVideos','url'=>array('admin')),
	);
	?>

	<h1>Update EqVideos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>