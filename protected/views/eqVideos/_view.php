<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('video')); ?>:</b>
	<?php echo CHtml::encode($data->video); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_main')); ?>:</b>

	<?php echo $data->getmain($data->is_main);?>

	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_equipment')); ?>:</b>

	<?php echo CHtml::encode($data->idEquipment->name); ?>

	<br />



</div>