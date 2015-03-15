<?php
$this->breadcrumbs=array(
	'Equipments'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Equipment','url'=>array('index')),
	array('label'=>'Create Equipment','url'=>array('create')),
	array('label'=>'View Equipment','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Equipment','url'=>array('admin')),
	);
	?>

	<h1>Update Equipment <?php echo $model->id; ?></h1>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'equipment-form',
	'enableAjaxValidation'=>false,
     'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
)); ?>

<style>
    .displaynone {
        display: none
    }
    
</style>

<script>
function pricetype (type)
{
   
  // alert(type.value)
   
   if(type.value=='3')
   {
       $('.special').show();
       $('.lease').hide();
   }
   
   
   if(type.value=='5')
   {
       $('.lease').show();
       $('.special').hide();
   }
   
   if(type.value=='4')
   {
       $('.lease').hide();
       $('.special').hide();
   }
   
   
   
}

</script>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>200)); ?>
	<?php
    $list = CHtml::listData(Category::model()->findAll(), 'id', 'name');
    echo $form->dropDownListRow($model, 'id_category', $list,array('class'=>'span5'));
    
 //echo $form->textFieldRow($model,'id_category',array('class'=>'span5')); ?>

	<?php 
$list = CHtml::listData(Manufacturer::model()->findAll(), 'id', 'name');
    echo $form->dropDownListRow($model, 'id_manufacturer', $list,array('class'=>'span5'));
    
//echo $form->textFieldRow($model,'id_manufacturer',array('class'=>'span5')); ?>

<div id="dropdownlist">
        <?php echo $form->dropDownListRow($model,'product_type',array(0=>'Equipment',1=>'Accessories'),
                array( 'ajax'=>array(
          'type'=>'POST',
          'url'=>$this->createUrl('Equipment/ToAddNewField'),
          'update'=>'#Hiddenfield',
))); 
?></div>
<script>
  $(document).ready(function(){
  var droplist = $('#dropdownlist');
  droplist.change(function(e){
    $('#mydiv').toggle();
  })
});
    </script>



<?php if($model->product_type==0)
{
    

?>
<div id="mydiv">
	<?php echo $form->textFieldRow($model,'model',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'serial_number',array('class'=>'span5','maxlength'=>200)); ?>
</div>


<?php } ?>
	<?php //echo $form->textFieldRow($model,'year',array('class'=>'span5','maxlength'=>10)); ?>

	<?php  
        $list = array(1=>'New',3=>'Used');//CHtml::listData(Manufacturer::model()->findAll(), 'id', 'name');
        
        //echo $form->dropDownListRow($model, 'sold_status',array('empty'=>'Select a Manufacturer'), $list,array('class'=>'span5'));
    
        //echo $form->textFieldRow($model,'sold_status',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'condition',array(1=>'New',2=>'Used')); ?>

	<?php //echo $form->textFieldRow($model,'hits',array('class'=>'span5')); ?>

	<?php echo $form->dropDownListRow($model,'status',array(1=>'In Stock',2=>'Out of Stock')); ?>

    

<label>Show Posted Date </label>
<?php echo $form->checkBox($model,'showdate',array('id'=>'showdate')); ?>

<?php echo $form->datepickerRow(
        $model,
        'posted_on',
        array('options' => 
            array(
                'autoclose' => true,
                'language' => 'en',
                'format'=>'yyyy-mm-dd',
                                ),),
        array(
            //'hint' => 'Click inside! This is a super cool date field.',
            'prepend' => '<i class="icon-calendar"></i>'
           
        ) 
) ;?>

<script>
$('#showdate').change( function () { 
    if(this.checked)
    $('#Equipment_posted_on').show()
else
    $('#Equipment_posted_on').hide()
});

    $('#Equipment_posted_on').hide()
</script>


	<?php ////echo $form->textFieldRow($model,'posted_on',array('class'=>'span5')); ?>
   <?php echo $form->ckEditorRow(
            $model,
            'feature'

            );
        //); ?>
  <?php echo $form->ckEditorRow(
            $model,
            'detail'

            );
        //); ?>
	<?php //echo $form->textAreaRow($model,'feature',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
<?php echo $form->ckEditorRow(
            $model,
            'note'

            );
        //); ?>
	<?php //echo $form->textAreaRow($model,'note',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->dropDownListRow($model,'is_featured',array(1=>'Yes', 2=>'No')); ?>
<br/>
	<?php //echo $form->fileField($model,'video',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'year_of_manufacturer',array('class'=>'span5','maxlength'=>10)); ?>

        <?php echo $form->textFieldRow($model,'price',array('class'=>'span5','maxlength'=>10)); ?>

        <?php echo $form->textFieldRow($model,'our_price',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->dropDownListRow($model,'price_type',array(1=>'Retail',2=>'Lease',4=>'Call for Price'),array('onchange'=>'pricetype(this)')); ?>

<div class=" special">
	<?php echo $form->textFieldRow($model,'price_start',array('class'=>'span5 ')); ?>
</div>
<div class=" special">
	<?php echo $form->textFieldRow($model,'price_end',array('class'=>'span5')); ?>
    </div>
<div class=" lease">
	<?php echo $form->textFieldRow($model,'lease_time',array('class'=>'span5','maxlength'=>200)); ?>
    </div>
<div class=" lease">
	<?php echo $form->textFieldRow($model,'lease_price',array('class'=>'span5','maxlength'=>10)); ?>
</div>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
