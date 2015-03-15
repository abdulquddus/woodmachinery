<html>
<head>
<title>Equipment</title>

<!-- Bootstrap core CSS -->
<link href="<?php echo Yii::app()->baseUrl ?>/design/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" >

<!-- Add custom CSS here -->
<link href="<?php echo Yii::app()->baseUrl ?>/design/css/akins.css" rel="stylesheet" type="text/css" media="all" >
<link href="<?php echo Yii::app()->baseUrl ?>/design/css/print.css" rel="stylesheet" type="text/css" media="all" >
</head>
<?php $eqid=$_GET['id'];
$data=Equipment::model()->findByPk($eqid); ?>

<body onLoad="window.print();">
<div class="topmainheaderwrapper" align="center">
  <div class="topmainheading">New England's #1 Woodworking Sales and Service Professionals !</div>
</div>
<div class="container">
    
  <div class="row">
    <div class="col-md-9 spc">
    <div class="equipmentmodelmainwrapper">
	<div class="pull-left">
             <?php $images= EqImages::model()->findAllByAttributes(array('id_equipment'=>$eqid, 'is_main'=>1)); 
						foreach ($images as $image) {
                        ?>
		<img src="../../upload/images/small_<?php echo $image['image_large'] ?>">
            <?php } ?>
        </div>
		<div class="equipmentmodelwrapperleft pull-right">
          <div class="modelheading">Equipment Name/Model</div>
         
        <div class="equipmentmodelwrapperright">
          <?php if($data->price_type!=4) 
      { ?>
          <div class="priceheading">Price: $
              
              <?php echo $data->price ;  if($data->price_start < date('Y-m-d-') &&  $data->price_end > date('Y-m-d-')) {  ?>
              <span>Our Price: $<?php echo $data->our_price ;  ?></span><?php } ?></div>
      <?php }  else { ?>
                      
          <div class="priceheading">Call for Price</div>
                 <?php  } ?>
          <div class="infowrapper">
            <div class="infoleft">Manufacturer</div>
            <div class="inforight"><?php echo Manufacturer::model()->findByPk($data->id_manufacturer)->name ?> </div>
          </div>
          <div class="infowrapper">
            <div class="infoleft">Product Name</div>
            <div class="inforight"><?php echo $data->name ?> </div>
          </div>
           <?php if($data->model!=''){?>
          <div class="infowrapper">
            <div class="infoleft">Model</div>
            <div class="inforight"><?php echo $data->model ?></div>
          </div>
          <?php }?>
          <?php if($data->model!=''){?>
          <div class="infowrapper">
            <div class="infoleft">Serial #</div>
            <div class="inforight"><?php echo $data->serial_number ?></div>
          </div>
          <?php }?>
          <div class="infowrapper">
            <div class="infoleft">Year</div>
            <div class="inforight"><?php echo $data->year_of_manufacturer ?></div>
          </div>
           <div class="infowrapper">
            <div class="infoleft">Status</div>
            <div class="inforight">
                <?php 
               $status= array(1=>'In Stock',2=>'Out of Stock');
                echo $status[$data->status] ?>
            </div>
          </div>
          
         <?php if ($data->showdate) { ?>
          <div class="infowrapper">
            <div class="infoleft">Posted on</div>
            <div class="inforight"><?php echo $data->posted_on ?></div>
          </div>
          <?php } ?>
     	  
        </div>
      </div>
    </div>
	   <div class="tabingwrapper1">
        <h4>Details</h4>
        <p>Copyright eurus supplex undae fulgura congestaque locis. Gravitate ante nabataeaque sua naturae satus ad. <a href="#tab2">Copyright</a> madescit pugnabant effervescere abscidit altae. Parte norant principio vultus reparabat omni rapidisque.</p>
		<p>Copyright flamma erectos tempora sorbentur illas foret ambitae. Sata locavit triones. Terrarum tuti diversa formas diffundi prima quod regio premuntur. Ipsa pluviaque toto valles conversa quinta.</p>
      </div>

  </div>
</div>
</div>
<!-- /.container -->
</body>
</html>