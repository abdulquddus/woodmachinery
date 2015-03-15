<?php
$this->breadcrumbs=array(
	'Eq Images'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List EqImages','url'=>array('index')),
array('label'=>'Manage EqImages','url'=>array('admin')),
);
?>

<h1>Create EqImages</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>