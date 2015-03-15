<?php
$this->breadcrumbs=array(
	'Service Tickets'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List ServiceTicket','url'=>array('index')),
array('label'=>'Create ServiceTicket','url'=>array('create')),
array('label'=>'Update ServiceTicket','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete ServiceTicket','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ServiceTicket','url'=>array('admin')),
);
?>

<h1>View ServiceTicket #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'service_no',
		'service_detail',
		'company',
		'full_name',
		'contact',
		'email',
		'eq_location',
		'priority',
		'date',
		'status',
),
)); ?>
