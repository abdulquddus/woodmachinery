<?php
$this->breadcrumbs=array(
	'Related Products'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List RelatedProducts','url'=>array('index')),
	array('label'=>'Create RelatedProducts','url'=>array('create')),
	array('label'=>'View RelatedProducts','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage RelatedProducts','url'=>array('admin')),
	);
	?>

	<h1>Update RelatedProducts <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>