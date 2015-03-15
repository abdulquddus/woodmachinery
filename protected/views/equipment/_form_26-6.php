<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'equipment-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>200)); ?>
	<?php
    $list = CHtml::listData(Category::model()->findAll(), 'id', 'name');
    echo $form->dropDownListRow($model, 'id_category',array('empty'=>'Select a Category'), $list,array('class'=>'span5'));
    
 //echo $form->textFieldRow($model,'id_category',array('class'=>'span5')); ?>

	<?php 
$list = CHtml::listData(Manufacturer::model()->findAll(), 'id', 'name');
    echo $form->dropDownListRow($model, 'id_manufacturer',array('empty'=>'Select a Manufacturer'), $list,array('class'=>'span5'));
    
//echo $form->textFieldRow($model,'id_manufacturer',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'model',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'serial_number',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'year',array('class'=>'span5','maxlength'=>10)); ?>

	<?php 
        
        $list = array(1=>'New',3=>'Used');//CHtml::listData(Manufacturer::model()->findAll(), 'id', 'name');
//    echo $form->dropDownListRow($model, 'sold_status',array('empty'=>'Select a Manufacturer'), $list,array('class'=>'span5'));
    
        //echo $form->textFieldRow($model,'sold_status',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'condition',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'hits',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'posted_on',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'detail',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'feature',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'note',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->dropDownListRow($model,'is_featured',array(1=>'Yes',2=>'No')); ?>

	<?php echo $form->textFieldRow($model,'video',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'year_of_manufacturer',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'price_type',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'price_start',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'price_end',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'lease_time',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'lease_price',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5','maxlength'=>10)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
