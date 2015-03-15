<div class="topmainheaderwrapper" align="center">
    <?php echo $this->renderPartial('_manufactureslider'); ?>
</div>
    <div class="container">

        <div class="row">
            <div class="col-md-9">
				
                <h3 class="featuredwrapper2"><strong>User Registration</strong></h3>
                 
                <div class="row">
                <h3 style="color:blue;text-align:center"><span style="background-color:#B4009E;color:#ffffff;"><?php if(isset($error)) echo $error ; ?></span></h3>
				<form name="register" action="register" method="POST">
								<div class="submit-ticket registerform">
								<p><em>All fields are required</em></p>
								<label>Full Name: </label><input name="fname" id="fname" required type="text" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>"><br><br>
								<label>User Name: </label><input name="uname" id="uname" required type="username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>"><br><br>
                                                                <label>Password: </label><input name="password" id="password" required type="password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>"><br>
                                                                <br> <label>Email: </label><input name="email" type="email" required value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"><br> <BR>
                                                                <label>Contact #: </label><input name="contact" id="contact" required type="text" value="<?php if(isset($_POST['contact'])) echo $_POST['contact']; ?>"><br><br>
                                                                <label>Address: </label><input name="address" id="address" required type="text" value="<?php if(isset($_POST['address'])) echo $_POST['address']; ?>"><br><br>
								
                                                                
                                                                  <div>   <label> Security Text:</label> <input type="text" required name="captcha" id="captcha-form" onblur="myfun(this.value)" onkeyup="myfun(this.value)"> 
                                                                        <?php //require_once   "captcha.php"; ?><img src="<?php echo Yii::app()->request->baseUrl; ?>/captcha.php" id="captcha" />
                                                                        <a href="javascript:;" onclick=" click_refresh()" id="change-image"><img src="<?php echo Yii::app()->request->baseUrl; ?>/ajax-refresh-icon.png" alt="walkswithme captcha validation" /></a>
                                                                        Validation Status: <div id="status"></div>
                                                                        <input type="hidden" id="chaptchval" name="chaptchval" value="0" /></div>
                                                      
                                                                <span>
								<input name="register" type="submit" value="submit">
								</span>
								</div>
							</form>
							</div>
						
					</div>
                 <?php echo $this->renderPartial('_siderbar'); ?> 
            </div>
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