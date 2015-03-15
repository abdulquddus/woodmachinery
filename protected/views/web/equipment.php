<?php //include("head-top.php"); 

//$sql= "select * from equipment where id = 1";

$eqid=$_GET['id'];
$data=Equipment::model()->findByPk($eqid);


//print_r($data)

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
//$cur_time=date("Y-m-d H:i:s");
//$duration='+1 minutes';
//Yii::app()->session['time']= date('Y-m-d H:i:s', strtotime($duration, strtotime($cur_time)));
//echo $ip;
if(!isset(Yii::app()->session['hites']))
{
    
   $sql="UPDATE `equipment` SET `hits` =hits+1 WHERE `id` = $eqid";   
         $command = Yii::app()->db->createCommand($sql)->execute();
    
$cur_time=date("Y-m-d H:i:s");
$duration='+5 minutes';
Yii::app()->session['time']= date('Y-m-d H:i:s', strtotime($duration, strtotime($cur_time)));

Yii::app()->session['hites'] = $ip;
//Yii::app()->session['time'] = $cur_time;
}

if(Yii::app()->session['time']<=  date("Y-m-d H:i:s"))
{
    
    unset(Yii::app()->session['hites'] );
    //unset($_SESSION['views']);
}
?>



<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/design/css/jQueryTab.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/design/css/animation.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/design/css/skin/minimalist.css">
<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/design/css/skin/flowcustom.css">

<!-- Specific jquery for this demo -->
<script src="<?php echo Yii::app()->baseUrl ?>/design/js/jquery.tools.min.js"></script>
<!-- Flowplayer library -->
<script src="<?php echo Yii::app()->baseUrl ?>/design/js/flowplayer.min.js"></script>



<script language="javascript">
    function printDiv(divName) {
       var printContents = document.getElementById(divName).innerHTML;
       var originalContents = document.body.innerHTML;

       document.body.innerHTML = printContents;

       window.print();

       document.body.innerHTML = originalContents;
    }
</script> 

<script>

$(function () {
  var playlist = [],
   base = "<?php echo Yii::app()->baseUrl ?>/upload/videos/",
   //base = "http://stream.flowplayer.org/night",
   
      fn = "",
      videos = $(".scrollable span"),
      scrollable,
      api,
      i;
  /*   fn = "/640x360",
      videos = $(".scrollable span"),
      scrollable,
      api,
      i;*/

  // build playlist from videos named night1 thru night6
  /*
 for (i = 1; i < 7; i = i + 1) {
    playlist.push([
      //{ webm: base + i + fn + ".webm" },
      { mp4:  base + i + fn + ".mp4" }
     // { ogg:  base + i + fn + ".ogv" }
      //{ flash: "mp4:night" + i + fn }
    ]);
  }
 */
 <?php 
                       $sql="SELECT * FROM  `eq_videos` where id_equipment = '".$_GET['id']."' "; 
					  
					     $data2 = Yii::app()->db->createCommand($sql)->queryAll();
						 
						 foreach($data2 as   $video)
						 {
					  ?> 
					  
					  
// for (i = 1; i < 7; i = i + 1) {
    playlist.push([
     
      { mp4:  base + fn + "<?php echo $video['video'] ?>"  }
    ]);
  //
  <?php } ?>


  jQuery(".scrollable").scrollable({
    circular: true
  });

  scrollable = jQuery(".scrollable").data("scrollable");

  jQuery("#player").flowplayer({
    // loop the playlist in a circular scrollable
    loop: true,
    ratio: 9/16,
    rtmp: "rtmp://s3b78u0kbtx79q.cloudfront.net/cfx/st",
    playlist: playlist

  }).bind("ready", function (e, api, video) {
    videos.each(function (i) {
      var active = i == video.index;

      jQuery(this).toggleClass("is-active", active)
             .toggleClass("is-paused", active && api.paused);
    });

  }).bind("pause resume", function (e, api) {
    videos.eq(api.video.index).toggleClass("is-paused", e.type == "pause");

  }).bind("finish", function (e, api) {
    var vindex = api.video.index,
        currentpage = Math.floor(vindex / 2),
        scrollindex = scrollable.getIndex(),
        next;

    // advance scrollable every 2nd playlist item
    if (vindex % 2 != 0 && scrollindex == currentpage) {
      // prefer circular movement when current item is visible
      scrollable.next();

    } else if (scrollindex != currentpage) {
      // scroll to next item if not visible
      next = vindex < playlist.length - 1 ? vindex + 1 : 0;
      scrollable.seekTo(Math.floor(next / 2));
    }
  });

  api = jQuery("#player").data("flowplayer");

  videos.click(function () {
    var vindex = videos.index(this);

    if (api.video.index === vindex) {
      api.toggle();
    } else {
      api.play(vindex);
    }
  });
});
</script>

<!-- colorbox -->
<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/design/css/colorbox.css" />

<link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/design/css/flexslider.css" type="text/css" media="screen" />

<script src="<?php echo Yii::app()->baseUrl ?>/design/js/jquery.colorbox.js"></script>

<!-- Optional FlexSlider Additions -->
<script defer src="<?php echo Yii::app()->baseUrl ?>/design/js/jquery.flexslider.js"></script>
<script src="<?php echo Yii::app()->baseUrl ?>/design/js/jquery.easing.js"></script>
<script src="<?php echo Yii::app()->baseUrl ?>/design/js/jquery.mousewheel.js"></script>

<!-- jQueryTab.js -->
<script src="<?php echo Yii::app()->baseUrl ?>/design/js/jQueryTab.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function(){
  jQuery(".group4").colorbox({rel:'group4', slideshow:true});
  });
</script>
<?php //include("head-bottom.php"); ?>
<div class="topmainheaderwrapper" align="center">
  <div class="topmainheading">New England's #1 Woodworking Sales and Service Professionals !</div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-9 spc">
      <div class="equipmentmodelmainwrapper"  id="second">
        <div class="equipmentmodelwrapperleft">
          <div class="modelheading">Equipment Name/Model</div>
          <div class="tabingwrapper">
            <div class="tabs-5">
              <ul class="tabs removetabUL new">
                <li class="active"><a class="removetabLiA" href="#tab17">Photos</a></li>
                  <?php 
                       $sql="SELECT * FROM  `eq_videos` where id_equipment = '".$_GET['id']."' "; 
					  
					     $data1 = Yii::app()->db->createCommand($sql)->queryAll();
					   if(count($data1)>=1 ) { ?>
                
                <li><a class="removetabLiA" href="#tab18">Videos</a></li>
                                           <?php } ?>
              </ul>
              <section class="tab_content_wrapper">
                <article class="tab_content slider-thumb sld" id="tab17" style="height:420px;">
                  <div id="slider" class="flexslider">
                   <ul class="slides">
                        
                        <?php $images= EqImages::model()->findAllByAttributes(array('id_equipment'=> $data->id)); 
      foreach ($images as $image) {
                        ?>
       <li><a href="<?php echo Yii::app()->baseUrl ?>/upload/images/<?php echo $image['image_large'] ?>" class="group4" title="Title"> <img src="<?php echo Yii::app()->baseUrl ?>/upload/images/small_<?php echo $image['image_large'] ?>"/></a></li>
 <?php } ?>
     </ul>
                  </div>
                  <div id="carousel" class="flexslider">
                    <ul class="slides">
                                          <?php $images= EqImages::model()->findAllByAttributes(array('id_equipment'=> $data->id)); 
											foreach ($images as $image) {
											?>
                          <li> <img src="<?php echo Yii::app()->baseUrl ?>/upload/images/thum_<?php echo $image['image_large'] ?>" /> </li>
 <?php } ?>
					
						</ul>
                  </div>
                  <script type="text/javascript">
					jQuery(window).load(function(){
					  jQuery('#carousel').flexslider({
						animation: "slide",
						controlNav: false,
						animationLoop: false,
						slideshow: false,
						itemWidth: 70,
						itemMargin: 0,
						asNavFor: '#slider'
					  });

					  jQuery('#slider').flexslider({
						animation: "slide",
						controlNav: false,
						animationLoop: false,
						slideshow: false,
						sync: "#carousel",
						start: function(slider){
						  jQuery('body').removeClass('loading');
						}
					  });
					});
				  </script>
                </article>
                  <?php 
                       $sql="SELECT * FROM  `eq_videos` where id_equipment = '".$_GET['id']."' "; 
					  
					     $data1 = Yii::app()->db->createCommand($sql)->queryAll();
					   if(count($data1)>=1 ) { ?>
                <article class="tab_content" id="tab18" style="height:285px;"> <div id="player" class="color-alt2"></div>
					<div class="scrollable-wrap">
					  <a class="prev">prev</a>  
					  <div class="scrollable">
                      
                      
						<div class="items">
                        <?php 
						$i=0;
						foreach( $data1 as  $ved) { 
						
						$i++;
						?>
                        
                          <?php if($i==0)
						  { ?>
                         <div>
                         <?php } ?>
							<span>
                            <img width="70" height="70" src="<?php echo Yii::app()->baseUrl ?>/upload/videos/<?php echo $ved['image_thume'] ?>" />
           </span> 
                            
                          <?php if($i==3)
						  { ?>
                          </div>
							<?php } $i=0;  } ?>
						  
						</div>  
					  </div>
					  <a class="next">next</a>
					</div>
				</article>
                  
                  <?php } ?>
              </section>
              <script type="text/javascript">
				jQuery('.tabs-5').jQueryTab({
					initialTab: 3,
					tabInTransition: 'slideRightIn',
					tabOutTransition: 'slideRightOut',
					cookieName: 'active-tab-5'
					
				});
				</script>
            </div>
          </div>
        </div>
           <div class="equipmentmodelwrapperright">
<!--          <div class="priceheading">
          <?php // if($data->price_type!=4)
		  //{ 
          
          //echo 'Price $'.$data->price ; } if($data->price_type==2) { echo '<span> Our Price $'.$data->price .' </span>' ;} ?></div>-->
      <?php if($data->price_type!=4) { ?>
          <div class="priceheading">
              <?php 
			  if($data->price_start < date('Y-m-d-') &&  $data->price_end > date('Y-m-d-')) {  ?>
			  <span style="color:black!important;text-decoration:line-through;">Price: $<?php echo $data->price ;  ?></span>
              <span>Our Price: $<?php echo $data->our_price ;  ?></span>
			  <?php } else{ ?>
			   <span style="color:black!important;text-decoration:line-through;">Price: $<?php echo $data->price ;  ?></span>
			  <?php }?>
			  </div>
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
            <div class="infoleft">Condition</div>
            <div class="inforight"><?php 
           $cond= array(1=>'New',2=>'Used');
            
            echo $cond[$data->condition] ?></div>
          </div>
          <div class="infowrapper">
            <div class="infoleft">Hits</div>
            <div class="inforight"><?php echo $data->hits ?></div>
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
         <?php if($data->product_type==1)
         {?>
           <div class="infowrapper">
            <div class="infoleft">Disclaimer</div>
            <div class="inforight"><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/disclaimer">Click Here</a></div>
         </div><?php } ?>
         <div class="btn1wrapper">
             <div class="btn1"><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/callnow?id=<?php echo $data->id ?>">I Want This Now</a></div>
          </div>
          <div class="btnwrapper">
            <div class="btnleft">
               <div class="btn2"><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/selling">Contact Sales</a></div>
            </div>
            <div class="btnright">
             <div class="btn3"><a  href="<?php echo Yii::app()->baseUrl ?>/index.php/web/Requestqoute?id=<?php echo $data->id ?>">Submit RFQ</a></div>
            </div>
          </div>
          
          
          <script  type="text/javascript">
	function popup(){
		window.open('../../tellafriend', 'tellafriend_script','scrollbars=1,statusbar=1,resizable=1,width=400,height=510');
	}
            </script>
          
          
          <div class="btnwrapper">
            <div class="btnleft">
               <div class="btn2"><a href="javascript:popup()">Send to Friend</a></div>
            </div>
            <div class="btnright">
            <div class="btn3"><a href="<?php echo Yii::app()->baseUrl ?>/index.php/web/equipprint?id=<?php echo $data->id ?>">Print Page</a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="tabingwrapper1">
        <div class="tabs-5">
          <ul class="tabs removetabUL new">
            <li class="active"><a class="removetabLiA" href="#tab17">Detail</a></li>
            <?php if($data->feature!='') {  ?>
            <li><a class="removetabLiA" href="#tab18">Unique Features</a></li>
            <?php } ?>
            <?php if($data->note!='') { ?>
            <li><a class="removetabLiA" href="#tab19">Note</a></li>
            <?php } ?>
          </ul>
          <section class="tab_content_wrapper">
            <article class="tab_content" id="tab17">
           
                <?php echo $data->detail ?>
            
            </article>
            <article class="tab_content" id="tab18">
              <?php echo $data->feature ?>
            </article>
            <article class="tab_content" id="tab19">
              <?php echo $data->note ?>
            </article>

          </section>
          <script type="text/javascript">
			jQuery('.tabs-5').jQueryTab({
				initialTab: 3,
				tabInTransition: 'slideRightIn',
				tabOutTransition: 'slideRightOut',
				cookieName: 'active-tab-5'
				
			});
			</script>
        </div>
      </div>
      <div class="row1">
        <div class="newequip">
          <div class="featuredmainwrapper">
            <div class="featuredwrapper">Related Equipment</div>
          </div>
       <?php 
	   
	   $sql="SELECT * FROM  `equipment` e , eq_images img where  e.id=img.id_equipment and img.is_main=1 and e.id_category = ( select id_category from equipment where id ='".$_GET['id']."' ) and e.status=1 and e.product_type= 0  order by e.id  DESC limit 4 ";
	   //echo $sql; exit; 
	       $neweq = Yii::app()->db->createCommand($sql)->queryAll();
		   
       foreach ($neweq as $newe) {  ?>
                    <div class="col-sm-4 newcol1-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo Yii::app()->baseUrl ?>/upload/images/thum_<?php echo $newe['image_large'] ?>" alt="">
							<div class="caption">
								<h6><strong><?php echo $newe['name'] ?></strong></h6>
								<p><a target="_blank" href="web/equipment?id=<?php echo $newe['id_equipment'] ?>">Details ></a></p>
							</div>
						</div>
                    </div>
					
 <?php } ?>
 
 
          <div class="col-sm-3"> <a target="_blank" href="<?php echo Yii::app()->baseUrl ?>/index.php/web/Listing/sold">View more Related Equipment></a>
            </p>
          </div>
        </div>
        <div class="soldequip">
          <div class="featuredmainwrapper">
            <div class="featuredwrapper">Related Accessories</div>
          </div>
   
   
   <?php 
	   $sql="SELECT * FROM  `equipment` e , eq_images img where  e.id=img.id_equipment and img.is_main=1 and e.id_category = ( select id_category from equipment where id ='".$_GET['id']."' ) and e.status=1 and e.product_type= 1  order by e.id  DESC limit 3 ";
//	   echo $sql; exit; 
	       $neweq = Yii::app()->db->createCommand($sql)->queryAll();
		   
               
               if (count($neweq) >0)
                        {
       foreach ($neweq as $newe) {  ?>
                    <div class="col-sm-4 newcol1-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo Yii::app()->baseUrl ?>/upload/images/thum_<?php echo $newe['image_large'] ?>" alt="">
							<div class="caption">
								<h6><strong><?php echo $newe['name'] ?></strong></h6>
								<p><a target="_blank" href="<?php echo Yii::app()->baseUrl ?>/index.php/web/equipment?id=<?php echo $newe['id_equipment'] ?>">Details ></a></p>
							</div>
						</div>
                    </div>
					
 <?php } ?>
            <div class="col-sm-3"> <a target="_blank" href="<?php echo Yii::app()->baseUrl ?>/index.php/web/accessories">View more Related Accessories</a>
            </p>
          </div>
 
 
                        <?php } else { Echo '<h5 align=center >No item found </h5>' ; } ?>
                  
 
          
        </div>
      </div>
    </div>
    <div class="well1">
      <div class="dollarwrapper">
<div class="dollarwrapper-col1"><img src="<?php echo Yii::app()->baseUrl ?>/design/imgs/newarrival/dollar.png" /></div>        
   <?php if($data->model!=0){?>
                <div class="dollarwrapper-col2">Lease this Equip. <?php echo $data->lease_time ;  ?>:<br />
          (approx.)<span>$<?php echo $data->lease_price ;  ?></span>per/month</div>
      <?php }
 else { ?>
     <div class="dollarwrapper-col2">CALL FOR PRICE.<br /></div>
     
 <?php }
     ?>      
      </div>
    </div>
      
   <?php echo $this->renderPartial('_siderbar'); ?> 

	<?php // include("sidebar.php"); ?>
  </div>
</div>
<!-- /.container -->
<?php //include("footer.php"); ?>