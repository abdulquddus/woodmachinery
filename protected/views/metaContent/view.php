<?php
/* @var $this MetaContentController */
/* @var $model MetaContent */

$this->breadcrumbs=array(
	'Meta Contents'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List MetaContent', 'url'=>array('index')),
	array('label'=>'Create MetaContent', 'url'=>array('create')),
	array('label'=>'Update MetaContent', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MetaContent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MetaContent', 'url'=>array('admin')),
);
?>

<h1>View MetaContent #<?php echo $model->id; ?></h1>

<?php 
$statu=$model->getstatus($model->status);

$this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'keyword',
		'content',
                 'eq_id',
		array( 
    'name'=>'status',
    'value'=>$statu,
    ),
	),
)); ?>
