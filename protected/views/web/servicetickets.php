<div class="topmainheaderwrapper" align="center">
    <?php //echo $this->renderPartial('_manufactureslider'); ?>
</div>
    <div class="container">

        <div class="row">
            <div class="col-md-9">
				
                <h3 class="featuredwrapper2">Submit A Service Ticket</h3>
                 
                <div class="row">

                    <div class="serivce-team para">
                        <img src="<?php echo Yii::app()->baseUrl ?>/design/imgs/team.jpg" alt="">
						<p>Create an account or log in to submit a request to schedule a service visit for your equipment.</p>
						<p>An Akin's representative will respond within 24 hours of the request. Thank you!'</p>
						<div class="new-account">
							<span class="pull-left">
							<p><strong>Create a new account - <a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/register">click here</a></strong></p>
							</span>
							<form name="servicetickets" action="servicetickets" method="POST">
								<div class="login-account pull-right">
								<p><strong>Have an account? Log in here!</strong></p>
								<label>Username: </label><input name="user" type="text" value=""><br>
								<label>Password: </label><input name="pass" type="password" value=""><br>
								<span>
								<input name="servicetickets" type="submit" value="submit">
								<p><a href="#" onclick="showdiv()">forgot password?</a></p>
								</span>
								</div>
							</form>
							<div id="forgotpas" style="display: none">
								<form name="forgotpassword" action="forgotpassword" method="POST">
								<div class="login-account pull-left">
								<p><strong>Please provide your Email for recovering </strong></p>
								<label>Email: </label><input name="email" type="email" value=""><br>
								<span><input name="forgotpassword" type="submit" value="submit"></span>
								</div>
								</form>						
							</div>
						</div>
					</div>
                </div>
                 
            </div>
			
<?php // echo $this->renderPartial('_siderbar'); ?> 
        </div>

    </div>

<script>
function showdiv()
{
    $('#forgotpas').show();
}
</script>
    <!-- /.container -->
	