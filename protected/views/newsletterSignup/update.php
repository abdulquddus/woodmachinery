<?php
$this->breadcrumbs=array(
	'Newsletter Signups'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List NewsletterSignup','url'=>array('index')),
	array('label'=>'Create NewsletterSignup','url'=>array('create')),
	array('label'=>'View NewsletterSignup','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage NewsletterSignup','url'=>array('admin')),
	);
	?>

	<h1>Update NewsletterSignup <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>