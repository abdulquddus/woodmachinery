<?php
$this->breadcrumbs=array(
	'Service Tickets'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ServiceTicket','url'=>array('index')),
array('label'=>'Manage ServiceTicket','url'=>array('admin')),
);
?>

<h1>Create ServiceTicket</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>