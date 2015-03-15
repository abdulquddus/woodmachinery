<?php
/* @var $this AboutusController */
/* @var $model Aboutus */

$this->breadcrumbs=array(
	'Aboutuses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Static Content', 'url'=>array('index')),
	array('label'=>'Create Static Content', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#aboutus-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Static Contents</h1>

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
	'id'=>'aboutus-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		//'content',
            array('name'=>'content','value'=>'substr(strip_tags($data->content), 0,50)','type'=>'raw'),
            array
(
'name'=>'status',
    'filter'=>CHtml::dropDownList(
        'Aboutus[status]',
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
                         'url'=>'$this->grid->controller->createUrl("/aboutus/changestatus", array("id"=>$data->id))',
                         'click'=>'function(){$("#cru-frame").attr("src",$(this).attr("href")); $("#cru-dialog").dialog("open");  return false;}',
                         ),
                ),
       ),
            
            
		array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
	),
)); ?>
