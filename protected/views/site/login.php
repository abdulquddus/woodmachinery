<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">

    <form method="post" action="" id="login-form">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row error">
		<label class="required" for="LoginForm_username">Username <span class="required">*</span></label>	
                <input type="text" id="LoginForm_username" name="username">		
                <div style="" id="LoginForm_username_em_" class="errorMessage">Username cannot be blank.</div>	</div>
                

	<div class="row">
		<label class="required" for="LoginForm_password">Password <span class="required">*</span></label>	
                <input type="password" id="LoginForm_password" name="password">	
                <div style="display:none" id="LoginForm_password_em_" class="errorMessage"></div>
				<p class="hint"></p>
	</div>

	<div class="row rememberMe">
		<input type="hidden" name="LoginForm[rememberMe]" value="0" id="ytLoginForm_rememberMe"><input type="checkbox" value="1" id="LoginForm_rememberMe" name="LoginForm[rememberMe]">		<label for="LoginForm_rememberMe">Remember me next time</label>		<div style="display:none" id="LoginForm_rememberMe_em_" class="errorMessage"></div>	</div>

	<div class="row buttons">
		<input type="submit" value="Login" name="yt0">	</div>

</form>
    
</div><!-- form -->
