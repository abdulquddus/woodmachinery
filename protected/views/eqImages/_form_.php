<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'eq-images-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'image_thume',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'image_large',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'is_main',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'id_equipment',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
