<?php
$this->breadcrumbs=array(
	'Blogs'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Blog','url'=>array('index')),
array('label'=>'Create Blog','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('blog-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Blogs</h1>

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

<?php


 $this->widget('bootstrap.widgets.TbGridView',array(
    'itemsCssClass'=>'table-striped table-hover',
'id'=>'blog-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'title',
		//'content',
array('name'=>'content','value'=>'substr(strip_tags($data->content), 0,50)','type'=>'raw'),
                
//		'type',
        array
(
'name'=>'type',
'value'=>'$data->gettype($data->type)',
),
		'image',
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
                         'url'=>'$this->grid->controller->createUrl("/blog/changestatus", array("id"=>$data->id))',
                         'click'=>'function(){$("#cru-frame").attr("src",$(this).attr("href")); $("#cru-dialog").dialog("open");  return false;}',
                         ),
                ),
       ),
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
