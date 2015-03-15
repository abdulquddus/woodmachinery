<?php
$this->breadcrumbs=array(
	'Service Tickets',
);

$this->menu=array(
array('label'=>'Create ServiceTicket','url'=>array('create')),
array('label'=>'Manage ServiceTicket','url'=>array('admin')),
);
?>

<h1>Service Tickets</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
