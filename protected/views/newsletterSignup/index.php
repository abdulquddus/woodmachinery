<?php
$this->breadcrumbs=array(
	'Newsletter Signups',
);

$this->menu=array(
array('label'=>'Create NewsletterSignup','url'=>array('create')),
array('label'=>'Manage NewsletterSignup','url'=>array('admin')),
);
?>

<h1>Newsletter Signups</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
