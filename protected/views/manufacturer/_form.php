<?php
/* @var $this ManufacturerController */
/* @var $model Manufacturer */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'manufacturer-form',
	'enableAjaxValidation'=>false,
     'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image_main_page'); ?>
		<?php echo $form->textField($model,'image_main_page',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'image_main_page'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image_logo'); ?>
		<?php echo $form->fileField($model,'image_logo',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'image_logo'); ?>
	</div>

	<div class="row">
		<?php echo $form->dropDownListRow($model,'status',array(1=>'Active',0=>'De-Active')); ?>
	</div>

	<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->