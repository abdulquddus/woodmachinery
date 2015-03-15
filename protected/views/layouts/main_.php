<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <title>Akins Machinery</title>

    <!-- Bootstrap core CSS -->
    <link href="design/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="design/css/akins.css" rel="stylesheet">

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
                    <li><a href="#">Home</a></li>
                    <li><span class="menu-separator">#</span></li>
                    <li><a href="#">About Akins</a></li>
					<li><span class="menu-separator">#</span></li>
                    <li><a href="#">News</a></li>
					<li><span class="menu-separator">#</span></li>
					<li><a href="#">Contact Akins</a></li>
					
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	<div class="container">
		<div class="logo"><a href="#"><img src="design/imgs/logo.jpg" alt="Logo" title="Akins Logo"></a></div>
		<div class="nav2">
			<nav>
				<ul class="nav nav-pills">
				  <li class="active"><a href="#">Buy New</a></li>
				  <li><a href="#">Buy Used</a></li>
				  <li><a href="#">Buy Accessories</a></li>
				  <li><a href="#">Sell Equipment</a></li>
				  <li><a href="#">Submit Service Tickets</a></li>
				</ul>
			</nav>
		</div>
	</div>
    <?php echo $content; ?>
	<footer>
            <div class="container footer">
				<div class="row">
					<div class="footer-top">
						<div class="footer-left">
							<h5>News</h5>
							<div class="input-group footer-news">
							  <input type="text" class="form-control" placeholder="Sign up for Akins News">
							  <span class="input-group-btn">
								<button class="btn btn-default" type="button">Join</button>
							  </span>
							</div><!-- /input-group -->
							<div class="footer-left-text">
								<p>Akins Machinery announces new equipment...</p>
								<p>New Table Saw with safety blade by SCM...</p>
								<p>Akins announces new website launce...</p>
								<p><a href="#">More News></a></p>
							</div>
						</div>
						
						<div class="footer-right">
								<ul class="social-icons">
									<li><a href="#"><img src="design/imgs/fb.jpg"></a></li>
									<li><a href="#"><img src="design/imgs/utube.jpg"></a></li>
									<li><a href="#"><img src="design/imgs/linkin.jpg"></a></li>
								</ul>
								<ul>
									<li>Akins Machinery</li>
									<li><a href="#">About Akins</a></li>
									<li><a href="#">Contact Akins</a></li>
									<li><a href="#">News Blog</a></li>
									<li><a href="#">Directory</a></li>
									<li><a href="#">Location Map</a></li>
								</ul>								
								<ul>
									<li>What we do</li>
									<li><a href="#">New Equipment</a></li>
									<li><a href="#">Used Equipment</a></li>
									<li><a href="#">Accessories</a></li>
									<li><a href="#">Sell Equipment</a></li>
									<li><a href="#">Service Tickets</a></li>
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
						<p>Copyright Â© Akins Machinery | <a href="#">Terms and Conditions</a> | <a href="#">Disclaimer</a>
						</p>
					</div>
				</div>
			</div>
        </footer>
    
    <!-- /.container -->

    <!-- JavaScript -->
    <script src="design/js/jquery-1.10.2.js"></script>
    <script src="design/js/bootstrap.js"></script>

</body>
</html>
