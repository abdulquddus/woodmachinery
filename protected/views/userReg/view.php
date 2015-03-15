<?php
/* @var $this UserRegController */
/* @var $model UserReg */

$this->breadcrumbs=array(
	'User Regs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserReg', 'url'=>array('index')),
	array('label'=>'Create UserReg', 'url'=>array('create')),
	array('label'=>'Update UserReg', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserReg', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserReg', 'url'=>array('admin')),
);
?>

<h1>View UserReg #<?php echo $model->id; ?></h1>

<?php 
$stat=$model->getstatus($model->status);
$lvl=$model->getlevel($model->user_level);
$this->widget('bootstrap.widgets.TbDetailView',array(

'data'=>$model,
	'attributes'=>array(
		'id',
		'full_name',
		'username',
		'password',
		//'user_level',
		'email',
		'contact',
		//'status',
            
            array( 
    'name'=>'user_level',
    'value'=>$lvl,
    ),
            
            array( 
    'name'=>'status',
    'value'=>$stat,
    ),
	),
)); ?>
