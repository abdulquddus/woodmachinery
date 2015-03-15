<?php
$this->breadcrumbs=array(
	'Related Products',
);

$this->menu=array(
array('label'=>'Create RelatedProducts','url'=>array('create')),
array('label'=>'Manage RelatedProducts','url'=>array('admin')),
);
?>

<h1>Related Products</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
