<div class="topmainheaderwrapper" align="center">
    <?php echo $this->renderPartial('_manufactureslider'); ?>
</div>
    <div class="container">

        <div class="row">

            <div class="col-md-9">
				
                <h3 class="featuredwrapper2"><strong>Evaluation for Selling Equipment</strong></h3>
                 
                <div class="row">
                    		<form enctype="multipart/form-data" name="selling" action="selling" method="POST">
								<div class="submit-ticket sellingForm">
								<p><em>All fields are required</em></p>
								<label>Company Name: </label><input name="company" required id="company" type="text" value=""><br>
								<label>Full Name: </label><input name="full_name" required id="full_name" type="text" value=""><br>
								<label>Phone/Mobile: </label><input name="contact" required id="contact" type="text" value=""><br>
								<label>Email: </label><input name="email" type="email" required value=""><br>
								<label>Equip.Location: </label><input name="eq_location" required id="eq_location" type="text" value=""><br>
								<label class="ticket-priority para">Priority of Service Need: </label>
                                                                <select name="priority" id="priority">
										<option value="" selected>Select Priority</option>
										<option value="1">Low</option>
                                        										<option value="2">Normal</option>
                                          										<option value="3">High</option>
									</select><br>
								<p class="para">Upload Photos</p>
								<?php
 $this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadFile',
        'config'=>array(
               'action'=>Yii::app()->createUrl('web/upload'),
               'allowedExtensions'=>array("jpg","jpeg","gif","exe","mov","mp4","txt","doc","pdf","xls","3gp","php","ini","avi","rar","zip","png"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>1000*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>1*1024,
               'auto'=>true,
               'multiple' => true,
               'onComplete'=>"js:function(id, fileName, responseJSON){ alert(fileName); }",
               'messages'=>array(
                                 'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                'emptyError'=>"{file} is empty, please select files again without it.",
                                'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                               ),
               'showMessage'=>"js:function(message){ alert(message); }"
               )
 
               ));
?>
                                                                <br>		<p class="para">Please Describe The Equipment You Want To Sell:</p>
								<textarea cols="41" rows="5" name="details" id="details" value="" class="para"></textarea><br>
								<br><label>Asking Price <sub>(if any)</sub> </label><input name="ask_price" id="ask_price" type="text" value=""><br>	
                                                                <br>
                                                                
                                                                
                                                                
                                                                
                                                                <div>   <lable> Security Text:</lable> <input type="text" required name="captcha" id="captcha-form" onblur="myfun(this.value)" onkeyup="myfun(this.value)"> 
                                                                        <?php //require_once   "captcha.php"; ?><img src="<?php echo Yii::app()->request->baseUrl; ?>/captcha.php" id="captcha" />
                                                                        <a href="javascript:;" onclick=" click_refresh()" id="change-image"><img src="<?php echo Yii::app()->request->baseUrl; ?>/ajax-refresh-icon.png" alt="walkswithme captcha validation" /></a>
                                                                        Validation Status: <div id="status"></div>
                                                                        <input type="hidden" id="chaptchval" name="chaptchval" value="0" /></div>
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                <span>
								<input name="selling" type="submit" value="submit">
								</span>
								</div>
							</form>
						
					</div>
                 
            </div>
		<?php echo $this->renderPartial('_siderbar'); ?> 

	<?php // include("sidebar.php"); ?>	
			

        </div>

    </div>
    <!-- /.container -->

<script type="text/javascript" >
    
    function chkchapta() {
        var val=    $('#chaptchval').val();
        if(val==0)
        {
            alert('captch value is wrong')
            return false ; 
        }
        
    }
function myfun(value)
{
	
	if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		
		//alert(xmlhttp.responseText);
                if(xmlhttp.responseText==0)
                {
                    
    document.getElementById("status").innerHTML="<div style='color:#FF0000;'>Please enter correct Captcha text</div>";;
                }else
        {
            $('#chaptchval').val(1);
            document.getElementById("status").innerHTML="<div style='color:#00FF00;'>Captcha validation succcessfull</div>";
        }
	
    }
  }
  //alert(document.getElementById("txtHint").innerHTML);
xmlhttp.open("GET","<?php echo Yii::app()->request->baseUrl; ?>/captcha_ajax.php?captcha="+value,true);
xmlhttp.send();
	//alert(value);
	//document.form1.submit();
}
function click_refresh()
{
	document.getElementById('captcha').src='<?php echo Yii::app()->request->baseUrl; ?>/captcha.php?'+Math.random();
    document.getElementById('captcha-form').focus();
	document.getElementById('status').innerHTML="";
	document.getElementById('captcha-form').value="";
}
</script>