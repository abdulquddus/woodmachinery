<?php
/* @var $this ManufacturerController */
/* @var $data Manufacturer */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_main_page')); ?>:</b>
	<?php echo CHtml::encode($data->image_main_page); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_logo')); ?>:</b>
	<?php echo CHtml::encode($data->image_logo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>