<?php
/* @var $this UserRegController */
/* @var $model UserReg */

$this->breadcrumbs=array(
	'User Regs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserReg', 'url'=>array('index')),
	array('label'=>'Create UserReg', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-reg-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User Regs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'itemsCssClass'=>'table-striped table-hover',
	'id'=>'user-reg-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'full_name',
		'username',
		'password',
		//'user_level',
		'email',
		/*
		'contact',
		'status',
		*/
 array
(
'name'=>'user_level',
'value'=>'$data->getlevel($data->user_level)',
),
array
(
'name'=>'status',
'value'=>'$data->getstatus($data->status)',
),
     array(
     'class'=>'CButtonColumn',
     'template'=>'{Status}',
     'buttons'=>array(
               'Status'=>array(
                         'url'=>'$this->grid->controller->createUrl("/userReg/changestatus", array("id"=>$data->id))',
                         'click'=>'function(){$("#cru-frame").attr("src",$(this).attr("href")); $("#cru-dialog").dialog("open");  return false;}',
                         ),
                ),
       ),
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
