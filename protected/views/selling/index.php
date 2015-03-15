<?php
$this->breadcrumbs=array(
	'Sellings',
);

$this->menu=array(
array('label'=>'Create Selling','url'=>array('create')),
array('label'=>'Manage Selling','url'=>array('admin')),
);
?>

<h1>Sellings</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
