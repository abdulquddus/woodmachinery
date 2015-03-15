<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>


<form enctype="multipart/form-data"  name="tellafriend" action="tellafriend" method="POST">
<div class="submit-ticket sellingForm">
								<p><em>Send this to your friend</em></p>
								<label>Your Name: </label><input name="sfull_name" required id="sfull_name" type="text" value=""><br><br>
								<label>Your Email: </label><input name="semail" type="semail" required value=""><br><br>
                                                                <label>Friend's Name: </label><input name="rfull_name" required id="rfull_name" type="text" value=""><br><br>
								<label>Friend's Email: </label><input name="remail" type="remail" required value=""><br><br>
								<p class="para">Your Message:</p>
								<textarea cols="41" rows="5" name="details" id="details" value="" class="para"></textarea><br>
								<br>
                                                                
                                                                
                                                                
                                                                
                                                                <div>   <label> Security Text:</label> <input type="text" required name="captcha" id="captcha-form" onblur="myfun(this.value)" onkeyup="myfun(this.value)"> 
                                                                        <?php //require_once   "captcha.php"; ?><img src="<?php echo Yii::app()->request->baseUrl; ?>/captcha.php" id="captcha" />
                                                                        <a href="javascript:;" onclick=" click_refresh()" id="change-image"><img src="<?php echo Yii::app()->request->baseUrl; ?>/ajax-refresh-icon.png" alt="walkswithme captcha validation" /></a>
                                                                        Validation Status: <div id="status"></div>
                                                                        <input type="hidden" id="chaptchval" name="chaptchval" value="0" /></div><br><br>
                                                                
                                                                
                                                                       
                                                                <span>
								<input name="tellafriend" type="submit" value="submit">
								</span>
								</div>
</form>