<?php
$this->breadcrumbs=array(
	'Eq Videoses',
);

$this->menu=array(
array('label'=>'Create EqVideos','url'=>array('create')),
array('label'=>'Manage EqVideos','url'=>array('admin')),
);
?>

<h1>Eq Videoses</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
