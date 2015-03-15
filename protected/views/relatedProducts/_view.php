<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_equipment')); ?>:</b>
	<?php echo CHtml::encode($data->id_equipment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('related_product')); ?>:</b>
	<?php echo CHtml::encode($data->related_product); ?>
	<br />


</div>