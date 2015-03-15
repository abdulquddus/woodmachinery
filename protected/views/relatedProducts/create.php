<?php
$this->breadcrumbs=array(
	'Related Products'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List RelatedProducts','url'=>array('index')),
array('label'=>'Manage RelatedProducts','url'=>array('admin')),
);
?>

<h1>Create RelatedProducts</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>