<?php
$this->breadcrumbs=array(
	'Sellings'=>array('index'),
	$model->id,
);

$this->menu=array(
//array('label'=>'List Selling','url'=>array('index')),
//array('label'=>'Create Selling','url'=>array('create')),
//array('label'=>'Update Selling','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete Selling','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Selling','url'=>array('admin')),
);
?>

<h1>View Selling #<?php echo $model->id; ?></h1>
<?php 
$pro=$model->getpriority($model->priority);

 $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'company',
		'full_name',
		'contact',
		'email',
		'eq_location',
	//	'priority',
		array( 
    'name'=>'priority',
    'value'=>$pro,
    ),
		'details',
		'ask_price',
		'date',
		//'status',
),
)); ?>


<table>
<?php   
$sql="SELECT * FROM  sell_images  where id_selling = $model->id";


$data = Yii::app()->db->createCommand($sql)->queryAll();

foreach ($data as $dat)
{?>


<tr>
<td>
<img src="<?php echo Yii::app()->request->baseUrl; ?>/sellimages/<?php echo $dat['image_thume'] ?>" />
</td></tr>
<?php } ?>
</table>
