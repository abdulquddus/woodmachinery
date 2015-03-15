<script>
function setasmain(id)
{
    
               $.ajax({
  type: "POST",
  url: "<?php echo Yii::app()->createUrl('EqImages/Setmain'); ?>",
  data: { id: id }
})
  .done(function( msg ) {
      location.reload();
    //alert(  'dine' );
//$('#facility').html(msg)
  });
    
    
}

</script>






<?php 

 $images= EqImages::model()->findAllByAttributes(array('id_equipment'=>$_GET['eqid']));
 $i=0;
 foreach ($images as $value) { 
    
     if($i%2==0) { echo '<div class="span12">';
     $k=0;
     
     }
     ?>

<div class="span3">
    <?php if ($value['is_main']==1)
        echo 'Main Image '; ?>
    <img width="200"  src="../../upload/images/sam_<?php echo $value['image_large'] ?> " />
<input type="button" onclick="setasmain(<?php echo $value['id'] ?>)" value="Set as main" />
</div>

    <?php 
if($k==1) { echo '</div> <div style="margin-bottom:50px"></div> '; }
    
$k++;
     $i++;
     }
 
?>



<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'eq-images-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

<hr/>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'image_thume',array('class'=>'span5','maxlength'=>200)); ?>
<lable>Add New Image </lable><br/>
	<?php echo $form->fileField($model,'image_large',array('class'=>'span5','maxlength'=>200)); ?>

	<?php //echo $form->textFieldRow($model,'is_main',array('class'=>'span5')); ?>

	<?php 
        $eqid=$_GET["eqid"];
        echo $form->hiddenField($model,'id_equipment',array('value'=>$eqid, 'class'=>'span5')); ?>




<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
