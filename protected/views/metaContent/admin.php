<?php
/* @var $this MetaContentController */
/* @var $model MetaContent */

$this->breadcrumbs=array(
	'Meta Contents'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MetaContent', 'url'=>array('index')),
	array('label'=>'Create MetaContent', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#meta-content-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Meta Contents</h1>

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

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'itemsCssClass'=>'table-striped table-hover',
	'id'=>'meta-content-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'keyword',
		'content',
               		 'eq_id',
		//'status',
             array
                    (
'name'=>'status',
                    'value'=>'$data->getstatus($data->status)',
                        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
