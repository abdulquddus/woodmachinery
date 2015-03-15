<?php

$this->breadcrumbs=array(

	'Eq Videoses'=>array('index'),

	$model->id,

);



//$this->menu=array(
//
//array('label'=>'List EqVideos','url'=>array('index')),
//
//array('label'=>'Create EqVideos','url'=>array('create')),
//
//array('label'=>'Update EqVideos','url'=>array('update','id'=>$model->id)),
//
//array('label'=>'Delete EqVideos','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//
//array('label'=>'Manage EqVideos','url'=>array('admin')),
//
//);

?>



<h1>View EqVideos #<?php echo $model->id; ?></h1>



<?php 
$typ=$model->getmain($model->is_main);
$eqp=$model->idEquipment->name;
$this->widget('bootstrap.widgets.TbDetailView',array(

'data'=>$model,

'attributes'=>array(

		'id',

		'video',

		//'is_main',

		//'id_equipment',
    array( 
    'name'=>'id_equipment',
    'value'=>$eqp,
    ),
array( 
    'name'=>'is_main',
    'value'=>$typ,
    ),

),

)); ?>