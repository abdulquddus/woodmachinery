<?php
$this->breadcrumbs=array(
	'Blogs'=>array('index'),
	$model->title,
);

$this->menu=array(
array('label'=>'List Blog','url'=>array('index')),
array('label'=>'Create Blog','url'=>array('create')),
array('label'=>'Update Blog','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Blog','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Blog','url'=>array('admin')),
);
?>

<h1>View Blog #<?php echo $model->id; ?></h1>

<?php
$typ=$model->gettype($model->type);
$contents=$model->content;

$this->widget('bootstrap.widgets.TbDetailView',array(

    
'data'=>$model,

'attributes'=>array(

		'id',

                'date',

		'title',

		//'content',
    
    
    array( 
    'name'=>'detail',
    'value'=>strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$contents)),
    ),

		//'type',

		'image',
    array( 
    'name'=>'type',
    'value'=>$typ,
    ),




),

)); ?>

