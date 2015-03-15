<?php
/* @var $this MadeonController */
/* @var $model Madeon */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'madeon-form',
	'enableAjaxValidation'=>false,
     'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		
		<?php 
                $list = CHtml::listData(Manufacturer::model()->findAll(), 'id', 'name');
                echo $form->dropDownListRow($model, 'manufactureid', $list,array('class'=>'span5'));
                 ?>
		<?php echo $form->error($model,'manufactureid'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'model'); ?>
		<?php echo $form->textField($model,'model',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'model'); ?>
	</div>

	<div class="row">
		
		<?php echo $form->dropDownListRow($model,'status',array(1=>'Active',2=>'De-Active')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->