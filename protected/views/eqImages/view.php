<?php
$this->breadcrumbs=array(
	'Eq Images'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List EqImages','url'=>array('index')),
array('label'=>'Create EqImages','url'=>array('create')),
array('label'=>'Update EqImages','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete EqImages','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage EqImages','url'=>array('admin')),
);
?>

<h1>View EqImages #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'image_thume',
		'image_large',
		'is_main',
		'id_equipment',
),
)); ?>
