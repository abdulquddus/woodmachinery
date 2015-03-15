<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'company',array('class'=>'span5','maxlength'=>200)); ?>

		<?php echo $form->textFieldRow($model,'full_name',array('class'=>'span5','maxlength'=>200)); ?>

		<?php echo $form->textFieldRow($model,'contact',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>200)); ?>

		<?php echo $form->textFieldRow($model,'eq_location',array('class'=>'span5','maxlength'=>500)); ?>

		<?php echo $form->textFieldRow($model,'priority',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'details',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'ask_price',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'status',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
