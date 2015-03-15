<?php
$this->breadcrumbs=array(
	'Service Tickets'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ServiceTicket','url'=>array('index')),
	array('label'=>'Create ServiceTicket','url'=>array('create')),
	array('label'=>'View ServiceTicket','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ServiceTicket','url'=>array('admin')),
	);
	?>

	<h1>Update ServiceTicket <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>