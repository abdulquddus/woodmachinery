<?php
$this->breadcrumbs=array(
	'Eq Images',
);

$this->menu=array(
array('label'=>'Create EqImages','url'=>array('create')),
array('label'=>'Manage EqImages','url'=>array('admin')),
);
?>

<h1>Eq Images</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
