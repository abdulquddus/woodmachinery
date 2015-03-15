<?php
$this->breadcrumbs=array(
	'Related Products'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List RelatedProducts','url'=>array('index')),
array('label'=>'Create RelatedProducts','url'=>array('create')),
array('label'=>'Update RelatedProducts','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete RelatedProducts','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage RelatedProducts','url'=>array('admin')),
);
?>

<h1>View RelatedProducts #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'id_equipment',
		'related_product',
),
)); ?>
