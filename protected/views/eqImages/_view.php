<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_thume')); ?>:</b>
	<?php echo CHtml::encode($data->image_thume); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_large')); ?>:</b>
	<?php echo CHtml::encode($data->image_large); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_main')); ?>:</b>
	<?php echo CHtml::encode($data->is_main); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_equipment')); ?>:</b>
	<?php echo CHtml::encode($data->id_equipment); ?>
	<br />


</div>