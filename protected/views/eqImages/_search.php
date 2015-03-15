<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'image_thume',array('class'=>'span5','maxlength'=>200)); ?>

		<?php echo $form->textFieldRow($model,'image_large',array('class'=>'span5','maxlength'=>200)); ?>

		<?php echo $form->textFieldRow($model,'is_main',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_equipment',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
