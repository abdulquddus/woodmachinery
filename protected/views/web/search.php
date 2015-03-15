<script>
function gotocate(valu) {
    
    if(valu!=0)
      
      window.location =' <?php echo Yii::app()->baseUrl ?>/index.php/web/category/id/'+valu;
      
    //alert(valu)
}


$(document).ready( function () {
          
          
         
        $("#name").change(function(){
            $('#loadingmessage').show();
            $.ajax({
                
  type: "POST",
  url: "<?php echo Yii::app()->createUrl('Web/ManufactureModel'); ?>",
  data: { id: this.value }
})
  .done(function( msg ) {
      $('#loadingmessage').hide(); 
  //alert(  msg );
$('#model').html(msg)
  });

});
});

</script>
<div class="topmainheaderwrapper" align="center">
    <?php echo $this->renderPartial('_manufactureslider'); ?>
</div>
    <div class="container">

        <div class="row">
            <div class="col-md-9">
				
                <h3 class="featuredwrapper2"><strong>Advance Search</strong></h3>
                 
               <div class="row">
                                 <form action="<?php echo Yii::app()->baseUrl ?>/index.php/web/advanceseach" method="get" >
   
                   						<div class="submit-ticket callnow">	
								<label>Search by Product Name: </label>
<input type="text" name="product" />                   
                                             <?php 
                 //echo $form->dropDownList($model,'client_id[]',CHtml::listData(Client::model()->findAllByAttributes(array('is_enabled'=>'1')),'id','name'),array( 'empty'=>'--Select a Client--','id'=>'clients'),array('id'=>'clients'));
                 //echo CHtml::dropDownList('product','',CHtml::listData(Equipment::model()->findAllByAttributes(array('status'=>'1')),'id','name'),array( 'empty'=>'--Select a Product--','id'=>'name'),array('id'=>'clients'));
                  ?><br>
								<label class="top10">Search by Year: </label> 
                                                                <input type="text" name="year" />
                                                                    <?php 
                               // echo CHtml::dropDownList('id','',CHtml::listData(Equipment::model()->findAllByAttributes(array('status'=>'1')),'id','year'),array( 'empty'=>'--Select a Year--','id'=>'year'),array('id'=>'year'));
                  ?><br>
								<label class="top10">Select Manufacturer: </label>
									<?php 
                                echo CHtml::dropDownList('manufacture','',CHtml::listData(Manufacturer::model()->findAllByAttributes(array('status'=>'1')),'id','name'),array( 'empty'=>'--Select a Manufacturer--','id'=>'name'),array('id'=>'name'));
                  ?><span id='loadingmessage' style='display: none; margin:-1px 0px 8px 10px;'>
   <img src='<?php echo Yii::app()->baseUrl ?>/images/loading.gif'/>
 </span><br><br>
                  
              <label class="control-label" >Model</label>
                            
                <select name="model" id="model" >
                    <option value="" selected="selected">First select manufacturer</option>
                </select>
                <br>								
								<label class=" top10">Select Condition: </label>
									<select name="condition">
										<option value="" selected="">--Select--</option>
										<option value="1" id="new">New Equipment</option>
										<option value="2" id="used">Used Equipment</option>
									</select><br>
								
								<label class="top10">Select Category: </label>
									<?php 
                                echo CHtml::dropDownList('category','',CHtml::listData(Category::model()->findAllByAttributes(array('status'=>'1')),'id','name'),array( 'empty'=>'--Select a Category--','id'=>'name'),array('id'=>'name'));
                  ?><br>
								<span>
								<input name="submit" value="Search" type="submit">
								</span>
								</div>
			</form>			
                 <?php //$this->endWidget(); ?>
	
               </div>
                 
            </div>
	

<?php echo $this->renderPartial('_siderbar'); ?> 

	<?php // include("sidebar.php"); ?>


        </div>

    </div>
    <!-- /.container -->