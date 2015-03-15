<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'banner-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); 
        
        if(!$model->isNewRecord)
        {
            
            echo "<img src=design/imgs/banners/$model->image width=200 />";  
        }
        
        ?>
        <input type="hidden" name="postimage" value="<?php echo $model->image ?>" />


	<?php echo $form-fileFieldRow($model,'image',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'text',array('class'=>'span5','maxlength'=>500)); ?>

	<?php echo $form->textFieldRow($model,'url',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'order',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
