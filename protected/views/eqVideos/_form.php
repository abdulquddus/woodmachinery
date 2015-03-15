<script>
function setasmain(id)
{
    
               $.ajax({
  type: "POST",
  url: "<?php echo Yii::app()->createUrl('EqVideos/Setmain'); ?>",
  data: { id: id }
})
  .done(function( msg ) {
      location.reload();
    //alert(  'dine' );
//$('#facility').html(msg)
  });
    
    
}


function deleteimage(idd)
{
    
                 $.ajax({
  type: "POST",
  url: "<?php echo Yii::app()->createUrl('EqVideos/deleteimages'); ?>",
  data: { id: idd }
})
  .done(function( msg ) {
      location.reload();
    //alert(  'dine' );
//$('#facility').html(msg)
  });
}


</script>

<?php 

 $images= EqVideos::model()->findAllByAttributes(array('id_equipment'=>$_GET['eqid']));
 $i=0;
 foreach ($images as $value) { 
    
     if($i==0) { echo '<div class="span12">';
     $i++;
     }
     
     ?>

<div class="span3">
<table><tr>
    <?php if ($value['is_main']==1)
	{
        echo '<td>Main Image</td>';}
		else { echo "<td>&nbsp;</td>"; }
		
		 ?>
         </tr><tr>
    <td>
    <video width="250" height="240" controls>
  <source src="../../upload/videos/<?php echo $value['video'] ?>" type="video/mp4">
  <source src="../../upload/videos/<?php echo $value['video'] ?>" type="video/ogg">
  Your browser does not support the video tag.
</video>

    
    
  

    
   
<input type="button" onclick="setasmain(<?php echo $value['id'] ?>)" value="Set as main" />
<input type="button" onclick="deleteimage(<?php echo $value['id'] ?>)" value="Delete Image" />
</td></tr></table>
</div>

    <?php 
if($i==3){ 
echo '</div> <div style="margin-bottom:50px"></div> '; 
$i=0;
}
    
     }
 
?>

</div>





<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'eq-videos-form',
	'enableAjaxValidation'=>false,
     'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>



<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<label>Upload video </label>
	<?php echo $form->fileField($model,'video',array('class'=>'span5')); ?>
<br/><br/>    <label>Upload Thum Image </label>
    <?php echo $form->fileField($model,'image_thume',array('class'=>'span5')); ?>



	<?php //echo $form->textFieldRow($model,'is_main',array('class'=>'span5')); ?>

	<?php 
        $eqid=$_GET['eqid'];
        echo $form->hiddenField($model,'id_equipment',array('value'=>$eqid, 'class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
