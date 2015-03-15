<?php

$this->breadcrumbs=array(

	'Equipments'=>array('index'),

	$model->name,

);



$this->menu=array(

array('label'=>'List Equipment','url'=>array('index')),

array('label'=>'Create Equipment','url'=>array('create')),

array('label'=>'Update Equipment','url'=>array('update','id'=>$model->id)),

array('label'=>'Delete Equipment','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),

array('label'=>'Manage Equipment','url'=>array('admin')),

);

?>



<h1>View Equipment #<?php echo $model->id; ?></h1>



<?php 

$cat=$model->idCategory->name;
$manu=$model->idManufacturer->name;
$stat=$model->soldstatus($model->sold_status);
$con=$model->condition($model->condition);
$statu=$model->getstatus($model->status);
$details=$model->detail;
$features=$model->feature;
$notes=$model->note;

$this->widget('bootstrap.widgets.TbDetailView',array(

'data'=>$model,

'attributes'=>array(

		'id',

		'name',

		//'id_category',

		//'id_manufacturer',
    
    array( 
    'name'=>'id_category',
    'value'=>$cat,
    ),
    array( 
    'name'=>'id_manufacturer',
    'value'=>$manu,
    ),
		//'id_manufacturer',

		'model',

		'serial_number',

		'year',

		//'sold_status',
    array( 
    'name'=>'sold_status',
    'value'=>$stat,
    ),

		//'condition',
     array( 
    'name'=>'condition',
    'value'=>$con,
    ),

		'hits',

		//'status',
     array( 
    'name'=>'status',
    'value'=>$statu,
    ),

		'posted_on',

	//'detail',

    array( 
    'name'=>'detail',
    'value'=>strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$details)),
    ),
    
     array( 
    'name'=>'feature',
    'value'=>strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$features)),
    ),
		//'feature',

                //'note',
    array( 
    'name'=>'note',
    'value'=>strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$notes)),
    ),

		'is_featured',

		'video',

		'year_of_manufacturer',

		'price_type',

		'price_start',

		'price_end',

		'lease_time',

		'lease_price',

		'price',
                
                'our_price',

),

)); ?>

