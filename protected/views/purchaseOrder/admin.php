<?php
$this->breadcrumbs=array(
	'Purchase Orders'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List PurchaseOrder','url'=>array('index')),
array('label'=>'Create PurchaseOrder','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('purchase-order-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Request for Quote Data</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'itemsCssClass'=>'table-striped table-hover',
'id'=>'purchase-order-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		//'id_equipment',
array(
'name'=>'id_equipment',
'value'=>'$data->idEquipment->name',
),
		'company',
		'full_name',
		'email',
		'contact',
		/*
		'message',
		'option',
		'type',
		'status',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
