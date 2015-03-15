<?php
$this->breadcrumbs=array(
	'Equipments',
);

$this->menu=array(
array('label'=>'Create Equipment','url'=>array('create')),
array('label'=>'Manage Equipment','url'=>array('admin')),
);
?>

<h1>Equipments</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
