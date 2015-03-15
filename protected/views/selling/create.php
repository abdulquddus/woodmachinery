<?php
$this->breadcrumbs=array(
	'Sellings'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Selling','url'=>array('index')),
array('label'=>'Manage Selling','url'=>array('admin')),
);
?>

<h1>Create Selling</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>