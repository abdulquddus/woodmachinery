<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     <?php 
    if(Yii::app()->controller->action->id=='equipment')
     {
         $mate= MetaContent::model()->findByAttributes(array('eq_id'=>$_GET['id']));
       
         if(isset($mate->content))
         {
         ?>
            <meta name="title" content="<?php echo $mate->title ?> ">
            <meta name="keyword" content="<?php echo $mate->keyword ?> ">
            <meta name="description" content="<?php echo $mate->content ?> ">
         
         <?php } }
     else
     {
                    $news= MetaContent::model()->findAll(1);
                    foreach($news as $new)
         {
                        
                   ?>
        <meta name="description" content="<?php echo $new['content']?>">
        <meta name="keywords" content="<?php echo $new['keyword']?>">
        
        
                                                                        <?php } 
                                                                        
     }?>
    <meta name="author" content="">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <title>Akins Machinery</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo Yii::app()->baseUrl ?>/design/css/bootstrap.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="<?php echo Yii::app()->baseUrl ?>/design/css/akins.css" rel="stylesheet">

    
    <script src="<?php echo Yii::app()->baseUrl ?>/design/js/tabcontent.js" type="text/javascript"></script>
    <link href="<?php echo Yii::app()->baseUrl ?>/design/css/tabcontent.css" rel="stylesheet" type="text/css" />
    
    
    
<!-- bxSlider Javascript file -->
<script src="<?php echo Yii::app()->baseUrl ?>/design/js/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="<?php echo Yii::app()->baseUrl ?>/design/css/jquery.bxslider.css" rel="stylesheet" />
<script>
jQuery(function() {
	// Create the dropdown base
	jQuery("<select />").appendTo(".nav2 nav");

	// Create default option "Go to..."
	jQuery("<option />", {
	   "selected": "selected",
	   "value"   : "",
	   "text"    : "Go to..."
	}).appendTo(".nav2 nav select");

	// Populate dropdown with menu items
	jQuery("nav a").each(function() {
	 var el = jQuery(this);
	 jQuery("<option />", {
		 "value"   : el.attr("href"),
		 "text"    : el.text()
	 }).appendTo(".nav2 nav select");
	});
	
	// To make dropdown actually work
	jQuery(".nav2 nav select").change(function() {
	window.location = jQuery(this).find("option:selected").val();
	});
});
</script>

</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                <    <li><a href="<?php echo Yii::app()->baseUrl ?>/">Home</a></li>
		    <li class="top12"><span class="custom-bullet">&bull;</span></li>
                    <li><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/page/id/1">About Akins</a></li>
		   <li class="top12"><span class="custom-bullet">&bull;</span></li>
                    <li><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/news?page=0">News</a></li>
		    <li class="top12"><span class="custom-bullet">&bull;</span></li>
<!--                    <li><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/article">Article</a></li>
		    <li class="top12"><span class="custom-bullet">&bull;</span></li>
                    <li><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/blog">Blog</a></li>
		    <li class="top12"><span class="custom-bullet">&bull;</span></li>-->
                    <li><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/contact">Contact Akins</a></li>
	<?php if(isset( Yii::app()->session['user'])){?>
                    <li> <a href="<?php echo Yii::app()->createAbsoluteUrl('site/logout'); ?>">Logout</a></li>
                    <?php } ?>
					
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	<div class="container">
		<div class="logo"><a href="<?php echo Yii::app()->baseUrl ?>/"><img src="<?php echo Yii::app()->baseUrl ?>/design/imgs/logo.jpg" alt="Logo" title="Akins Logo"></a></div>
		<div class="nav2">
			<nav>
      				<ul class="nav navbar-nav">
				  <li  <?php if(isset($_GET['condition']) && $_GET['condition']==1) echo 'class="active"' ?> ><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/Listing/condition/1">Buy New</a></li>
				  <li <?php if(isset($_GET['condition']) && $_GET['condition']==2) echo 'class="active"' ?> ><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/Listing/condition/2">Buy Used</a></li>
				  <li  <?php if(Yii::app()->controller->action->id=='accessories') echo 'class="active"' ?>  ><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/accessories">Buy Accessories</a></li>
				  <li <?php if(Yii::app()->controller->action->id=='selling') echo 'class="active"' ?>><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/selling">Sell Equipment</a></li>
				  <li <?php if(Yii::app()->controller->action->id=='servicetickets') echo 'class="active"' ?> ><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/servicetickets">Submit Service Tickets</a></li>
				</ul>
			</nav>
		</div>
	</div>

	<?php   echo $content; ?>

	        <footer>
            <div class="container footer">
				<div class="row">
					<div class="footer-top">
						<div class="footer-left">
							<h5>News</h5>
       
                                                           <div id='loadingmessage1' style='display: none; margin:-1px 0px 8px 210px;'>
   <img src='<?php echo Yii::app()->baseUrl ?>/images/loading.gif'/>
 </div>
							<div class="input-group footer-news">
							  <input type="text" id="newsletter" class="form-control" placeholder="Sign up for Akins News">
							  <span class="input-group-btn">
                                                              <button class="btn btn-default" onclick="submitemail()" type="button">Join</button>
							  </span>
							</div><!-- /input-group -->
							<div class="footer-left-text">
								<?php $datas= Blog::model()->findAllByAttributes(array('type'=>1,'status'=>1),array('order'=>'id DESC','limit'=>3)); 
                                                                 foreach($datas as $data) 
                                                                 { ?> <p><a  href="<?php echo Yii::app()->baseUrl ?>/index.php/web/dblog/id/<?php echo $data['id'] ?>"> <?php echo  substr($data['title'], 0,50) ;  ?> </a> </p><?php }?>
								<p><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/news">More News></a></p>
							</div>
						</div>
						
						<div class="footer-right">
								<ul class="social-icons">
									<li><a href="#"><img src="<?php echo Yii::app()->baseUrl ?>/design/imgs/fb.jpg"></a></li>
									<li><a href="#"><img src="<?php echo Yii::app()->baseUrl ?>/design/imgs/utube.jpg"></a></li>
									<li><a href="#"><img src="<?php echo Yii::app()->baseUrl ?>/design/imgs/linkin.jpg"></a></li>
								</ul>
								<ul>
									<li>Akins Machinery</li>
									<li><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/page/id/1">About Akins</a></li>
									<li><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/contact">Contact Akins</a></li>
									<li><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/news">News Blog</a></li>
									<li><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/page/id/2">Directory</a></li>
									<li><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/page/id/3">Location Map</a></li>
								</ul>								
								<ul>
									<li>What we do</li>
									<li><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/Listing/condition/1">New Equipment</a></li>
									<li><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/Listing/condition/2">Used Equipment</a></li>
									<li><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/accessories">Accessories</a></li>
									<li><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/selling">Sell Equipment</a></li>
									<li><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/servicetickets">Service Tickets</a></li>
								</ul>
								<ul class="address">
									<li>Akins Machinery, Inc.</li>
									<li>9 Delta Drive, Unit F</li>
									<li>Londonderry, NH 03053</li>
									<li><label for="phone">Tel:</label> 603-216-6201</li>
									<li><label for="fax">Fax:</label> 603-216-6202</li>
									<li><label for="phone">Toll Free:</label> (800) 932-4825</li>
									<li><label for="email">eMail:</label> info@akinsmachinery.com</li>	
								</ul>
						</div>
					</div>
					<div class="footer-bottom">
				        <p>Copyright &copy; Akins Machinery | <a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/page/id/5">Terms and Conditions</a> | <a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/page/id/4">Disclaimer</a> </p>
					</div>
				</div>
			</div>
        </footer>
    
    <!-- /.container -->
<script>
function submitemail()
{
    var email= $('#newsletter').val();
       var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (filter.test(email))
    {
           $('#loadingmessage1').show();
  // Yay! valid
   $.ajax({
  type: "POST",
  url: "<?php echo Yii::app()->createUrl('web/newsletter'); ?>",
  data: { email: email }
})
  .done(function( msg ) {
      $('#loadingmessage1').hide();
     // location.reload();
if(msg==1)
    alert(  'Verification email has been sent to you' );
else
    alert(  'Email Already Exist' );
//$('#facility').html(msg)
  });
  return true;
}
else
  {
       alert('Please provide a valid email address');
            return false;
        
        }
  
}
</script>
    <!-- JavaScript -->
    <script src="<?php echo Yii::app()->baseUrl ?>/design/js/bootstrap.js"></script>

</body>
</html>