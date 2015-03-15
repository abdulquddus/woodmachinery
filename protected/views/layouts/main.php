<!DOCTYPE html>
<html lang="en">
<head>
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
<?php Yii::app()->bootstrap->registerBootstrapCss(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/akins-admin.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/design/imgs/logo.jpg" alt="logo"></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php
 if(isset(Yii::app()->session['adminuser']))
                {

	 $this->widget(    'bootstrap.widgets.TbNavbar',
    array(
    'type' => 'inverse', // null or 'inverse'
    'brand' => '',
    'brandUrl' => '#',
    'collapse' => true, // requires bootstrap-responsive.css
    'fixed' => false,
    'items' => array(
    array(
    'class' => 'bootstrap.widgets.TbMenu',
        'submenuHtmlOptions' => array('class' => 'multi-level'),
			'items'=>array(
				array('label'=>'Banner', 'url'=>array('/Banner/admin')),
                                array('label'=>'News', 'url'=>array('/Blog/admin')),
                                array('label'=>'Category', 'url'=>array('/Category/admin')),
                             //array('label'=>'EqImages', 'url'=>array('/EqImages/admin')),
				array('label'=>'Manufacturer', 'url'=>array('/Manufacturer/admin')),
                               // array('label'=>'Model', 'url'=>array('/Madeon/admin')),
                                array('label'=>'Equipment', 'url'=>array('/Equipment/admin')),
                            
                            
                            //array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Manage Users', 'url'=>array('/userReg/admin')),
                                array('label'=>'Static Content', 'url'=>array('/Aboutus/admin')),
                                array('label'=>'Meta Content', 'url'=>array('/metaContent/admin')),
                                array('label'=>'Contact Us Data', 'url'=>array('/contactUs/admin')),
                                array('label'=>'Selling Data', 'url'=>array('/selling/admin')),
                                array('label'=>'RfQ Data', 'url'=>array('/purchaseOrder/admin')),
                                array('label'=>'I Want This Data', 'url'=>array('/callnow/admin')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
		//array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ', 'url'=>array('/site/logout'))
			),
		 ),

    ),
    )
    );

}
              

?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> Akins Machinery.<br/>
		All Rights Reserved.<br/>
		
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
