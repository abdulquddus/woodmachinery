<?php
$this->breadcrumbs=array(
	'Newsletter Signups'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List NewsletterSignup','url'=>array('index')),
array('label'=>'Manage NewsletterSignup','url'=>array('admin')),
);
?>

<h1>Create NewsletterSignup</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>