<?php
/* @var $this BannerController */
/* @var $model Banner */

$this->breadcrumbs=array(
	'Banners'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Banner', 'url'=>array('index')),
	array('label'=>'Create Banner', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#banner-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<style>
#banner-grid table td 
{
	word-break:break-word;
}
</style>

<h1>Manage Banners</h1>

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
	'id'=>'banner-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'image',
		'text',
		'url',
		'order',
		//'status',
		array
(
'name'=>'status',
    'filter'=>CHtml::dropDownList(
        'Banner[status]',
        $model->status,
       array(
    '' => 'All',
    '1' => 'Active',
    '0' => 'De-Active',
),array('width'=>'200px')
    ),
                     'value'=>'$data->getstatus($data->status)',
),
     array(
     'class'=>'CButtonColumn',
     'template'=>'{Status}',
     'buttons'=>array(
               'Status'=>array(
                         'url'=>'$this->grid->controller->createUrl("/banner/changestatus", array("id"=>$data->id))',
                         'click'=>'function(){$("#cru-frame").attr("src",$(this).attr("href")); $("#cru-dialog").dialog("open");  return false;}',
                         ),
                ),
       ),
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>