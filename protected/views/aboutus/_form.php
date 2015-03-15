<?php
/* @var $this AboutusController */
/* @var $model Aboutus */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(

	'id'=>'blog-form',

	'enableAjaxValidation'=>false,'htmlOptions' => array(

        'enctype' => 'multipart/form-data',

    ),

)); ?>


	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'title'); ?>
        <?php echo $form->dropDownListRow($model,'status',array(1=>'Active',0=>'De-Active')); ?>
	
	</div>

	<div class="row">

<?php echo $form->ckEditorRow(

            $model,

            'content'

//            array(

//                'options' => array(

//                    'fullpage' => 'js:true',

//                    'width' => '640',

//                    'resize_maxWidth' => '640',

//                    'resize_minWidth' => '320'

//                )

            );

//); ?> </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->