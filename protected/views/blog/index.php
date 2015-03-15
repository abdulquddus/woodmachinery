<?php
$this->breadcrumbs=array(
	'Blogs',
);

$this->menu=array(
array('label'=>'Create Blog','url'=>array('create')),
array('label'=>'Manage Blog','url'=>array('admin')),
);
?>

<h1>Blogs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
