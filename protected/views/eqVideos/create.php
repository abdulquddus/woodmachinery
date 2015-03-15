<?php
$this->breadcrumbs=array(
	'Eq Videoses'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List EqVideos','url'=>array('index')),
array('label'=>'Manage EqVideos','url'=>array('admin')),
);
?>

<h1>Create EqVideos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>