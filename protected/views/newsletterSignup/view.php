<?php
$this->breadcrumbs=array(
	'Newsletter Signups'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List NewsletterSignup','url'=>array('index')),
array('label'=>'Create NewsletterSignup','url'=>array('create')),
array('label'=>'Update NewsletterSignup','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete NewsletterSignup','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage NewsletterSignup','url'=>array('admin')),
);
?>

<h1>View NewsletterSignup #<?php echo $model->id; ?></h1>

<h1>View NewsletterSignup #<?php echo $model->id; ?></h1>


<?php 
$stat=$model->getstatus($model->status);
$this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'email',
		array( 
    'name'=>'status',
    'value'=>$stat,
    ),

),
)); ?>
