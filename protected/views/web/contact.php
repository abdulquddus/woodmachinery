<div class="topmainheaderwrapper" align="center">
    <?php echo $this->renderPartial('_manufactureslider'); ?>
</div>		
    <div class="container">

        <div class="row">
            <div class="col-md-9">
				
                <h3 class="featuredwrapper2"><strong>Contact</strong></h3>
                 
                <div class="row">
                    <form onsubmit="return chkchapta()" name="contact" action="contact" method="POST">
								<div class="submit-ticket contactform">
								<p><em>All fields are required</em></p>
                                                                <label>Company Name: </label><input name="company" id="company" required type="text" value=""><br>
								<label>Full Name: </label><input name="full_name" id="full_name"type="text" required value=""><br>
								<label>Phone/Mobile: </label><input name="contact" id="contact" type="text" required value=""><br>
                                                                <label>Email: </label><input name="email" id="email" type="email" required value=""><br>
								<label>Equip.Location: </label><input name="equiploc" id="equiploc" type="text" value=""><br><br>
								<span><label>Type your message: </label><br>
								<textarea cols="41" rows="5" name="message" id="message" value="" class="para"></textarea></span><br>
                                            
                                                                        <div>   <lable> Security Text:</lable> <input type="text" required name="captcha" id="captcha-form" onblur="myfun(this.value)" onkeyup="myfun(this.value)"> 
                                                                        <?php //require_once   "captcha.php"; ?><img src="<?php echo Yii::app()->request->baseUrl; ?>/captcha.php" id="captcha" />
                                                                        <a href="javascript:;" onclick=" click_refresh()" id="change-image"><img src="<?php echo Yii::app()->request->baseUrl; ?>/ajax-refresh-icon.png" alt="walkswithme captcha validation" /></a>
                                                                        Validation Status: <div id="status"></div>
                                                                        <input type="hidden" id="chaptchval" name="chaptchval" value="0" /></div>
                                                                        <span>
								<input name="submit" type="submit" value="submit">
								</span>
								</div>
                                    
<!--                                    <table class="table table-striped table-bordered table-condensed table-hover">
<tr>
<td>
Security Text:
</td>
<td><input type="text" name="captcha" id="captcha-form" onblur="myfun(this.value)" onkeyup="myfun(this.value)" /><br/>
</td>
<td>
    <?php //require_once   "captcha.php"; ?>
<img src="<?php //echo Yii::app()->request->baseUrl; ?>/captcha.php" id="captcha" /><br/>
</td>
<td>
<a href="javascript:;" onclick=" click_refresh()" id="change-image"><img src="<?php //echo Yii::app()->request->baseUrl; ?>/ajax-refresh-icon.png" alt="walkswithme captcha validation" /></a>
</td>
</tr>
<tr>
<td colspan="4" align="center">
Validation Status: <div id="status"></div>
</td>

</tr>
</table>
                                    <input type="hidden" id="chaptchval" name="chaptchval" value="0" />-->
							</form>
						
					</div>
					<hr>
					<?php 
                    $news= Aboutus::model()->findAllByAttributes(array('id'=>'3','status'=>'1'));
                    foreach($news as $new) { ?>
					<h3 class="featuredwrapper2" style="margin-top:20px;"><strong><?php echo $new['title']?></strong></h3>
					<?php echo $new['content']?>
					<?php } ?>
            </div>
	
        
<?php echo $this->renderPartial('_siderbar'); ?> 
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